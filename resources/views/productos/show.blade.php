@extends('layouts.menu')
@section('contenido')
<div class="row">
    <h1 class="h1-show">{{ $producto->nombre }}</h1>
</div>
<div class="row">
    <div class="col s8">

    <img src="{{ asset('img/'.$producto ->imagen) }}" width="715" height="300">

    <ul class="collection">

    <li class="collection-item avatar">
      <i class="material-icons circle red">assignment</i>
      <span class="title">Descripcion</span>
      <p>{{ $producto->desc }}<br>
      </p>
      <a href="#" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>


    <li class="collection-item avatar">
      <i class="material-icons circle green">attach_money</i>
      <span class="title">Precio</span>
      <p>${{ $producto->precio }}<br>
      </p>
      <a href="#" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>


    <li class="collection-item avatar">
      <i class="material-icons circle green">bookmark</i>
      <span class="title">Categoria</span>
      <p>{{ $producto->categoria->nombre }}<br>
      </p>
      <a href="#" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>

    <li class="collection-item avatar">
      <i class="material-icons circle red">bookmark</i>
      <span class="title">Marca</span>
      <p>{{ $producto->marca->nombre }}<br>
      </p>
      <a href="#" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
  </ul>

    </div>

    <div class="col s4">
            <div class="row">
                <h5><center>Agregar al carrito</center></h5>
                <form class="col s12" method="POST" action="{{ route('carrito.store') }}">
                @csrf
                <div class="row">

                    <div class="input-field col s12">
                    <select name="cantidad" id="cantidad">
                        <option value="" disabled selected>Cantidad</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    </div>

                    <div class="input-field col s12">
                        <center><button class="btn waves-effect waves-light" type="submit">Añadir</button></center>
                    </div>

                    <div class="input-field col s12">
                        <input type="hidden" name="prod_id" value="{{ $producto->id  }}">
                    </div>


                    <div class="input-field col s12">
                        <input type="hidden" name="prod_name" value="{{ $producto->nombre  }}">
                    </div>

                 </div>
                </form>
            </div>

        </form>
    </div>
@endsection
