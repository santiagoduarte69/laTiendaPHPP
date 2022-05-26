@extends('layouts.menu')
@section('contenido')
@if(session('mensajito'))
<div class="row">
    <span>{{session('mensajito')}}</span>
</div>
@endif
<div class="row">
  <h1 class="orange-text text-darken-2" style="text-transform: uppercase;">Registrar Producto</h1>
</div>
<div class="row">
    <form class="col s8" method="POST" action="{{ route('producto.store')  }}">
    @csrf
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">person_add</i>
                <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}">
                <label for="nombre">Nombre producto</label>
                <span>{{ $errors->first('nombre') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">description</i>
                <textarea name="desc" id="desc" cols="30" class="materialize-textarea"> {{ old('desc') }}</textarea>
                <label for="desc">Descripcpion</label>
                <span>{{ $errors->first('desc') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">attach_money</i>
                <input id="precio" type="text" name="precio" value="{{ old('precio') }}">
                <label for="precio">Precio</label>
                <span>{{ $errors->first('precio') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    <option value="">elija marca</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="marca">
                    Elija la Marca
                </label>
                <span>{{ $errors->first('marca') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="categoria">
                    Elija la categoria
                </label>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-filed col s8">
                <div class="btn">
                    <span><i class="material-icons prefix">file_upload</i></span>
                    <input type="file" multiple class="orange darken-4">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Imagenes del producto">
                </div>
            </div>
        </div>
        <button class="btn orange darken-4" type="submit" name="action">Registrar
        </button>
    </form>
</div>
@endsection
