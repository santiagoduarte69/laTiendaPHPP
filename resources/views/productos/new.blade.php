@extends('layouts.menu')
@section('contenido')
@if(session('mensajito'))
<div class="row">
    <center><span  class="red-text text-darken-2" style="text-transform: uppercase;">{{session('mensajito')}}</span></center>
</div>
@endif
<div class="row">
  <h1 class="orange-text text-darken-2" style="text-transform: uppercase;">Registrar Producto</h1>
</div>
<div class="row">
    <form class="col s8" method="POST" action="{{ route('producto.store')  }}" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">person_add</i>
                <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}">
                <label for="nombre">Nombre producto</label>
                <center><span class="red-text text-darken-2" style="text-transform: uppercase;">{{ $errors->first('nombre') }}</span></center>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">description</i>
                <textarea name="desc" id="desc" cols="30" class="materialize-textarea"> {{ old('desc') }}</textarea>
                <label for="desc">Descripcpion</label>
                <center><span  class="red-text text-darken-2" style="text-transform: uppercase;">{{ $errors->first('desc') }}</span></center>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">attach_money</i>
                <input id="precio" type="text" name="precio" value="{{ old('precio') }}">
                <label for="precio">Precio</label>
                <center><span  class="red-text text-darken-2" style="text-transform: uppercase;">{{ $errors->first('precio') }}</span></center>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
            <i class="material-icons prefix">shopping_cart</i>
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
                <center><span  class="red-text text-darken-2" style="text-transform: uppercase;">{{ $errors->first('marca') }}</span></center>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
            <i class="material-icons prefix">shopping_cart</i>
                <select name="categoria" id="categoria">
                <option value="">elija categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="categoria">
                    Elija la categoria
                </label>
                <center><span  class="red-text text-darken-2" style="text-transform: uppercase;">{{ $errors->first('categoria') }}</span></center>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-filed col s8">
                <div class="btn">
                    <span><i class="material-icons prefix">file_upload</i></span>
                    <input type="file" multiple class="orange darken-4" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Imagenes del producto">
                </div>
                <center><span  class="red-text text-darken-2" style="text-transform: uppercase;">{{ $errors->first('imagen') }}</span></center>
            </div>
        </div>

        <button class="btn orange darken-4" type="submit" name="action">Registrar
        </button>
    </form>
</div>
@endsection
