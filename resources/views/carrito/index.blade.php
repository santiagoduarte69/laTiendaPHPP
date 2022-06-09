@extends('layouts.menu')
@section('contenido')

@if(!session('cart'))
<div class="row">
    <p>variable no existente</p>
</div>

@else

<div class="row">
    {{ session('cart')[0]["name"] }}
    <br>
    {{ session('cart')[0]["cantidad"] }}
</div>

<form method="POST"
      action="{{ route('carrito.destroy' , 1) }}">
@csrf
@method('DELETE')

    <button class="btn waves-effect waves-light" type="submit">Eliminar carrito
    </button>

</form>

@endif

@endsection

