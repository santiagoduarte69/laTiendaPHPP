@extends('layouts.menu')
@section('contenido')

    <div class="row">
    <h1>Catalogo de productos</h1>
    </div>

    @foreach($productos as $producto)

        <div class="card row">

            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator"
                @if($producto->imagen === null)

                    src="{{ asset('img/no_disponible.jpg') }}" width="200" height="200"

                @else

                    src="{{ asset('img/'.$producto ->imagen) }}" width="500" height="300"

                @endif>
            </div>

            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{ $producto->nombre }}<i class="material-icons right">more_vert</i></span>
                <p><a href="#">Ver detalles</a></p>
            </div>

            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{ $producto->nombre }}<i class="material-icons right">close</i></span>
                <ul>
                    <li><span>Descripcion: </span>{{ $producto->desc }}</li>
                    <li><span>Precio: </span>{{ $producto->precio }}</li>
                </ul>
            </div>

        </div>

    @endforeach

@endsection

