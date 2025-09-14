@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido a la Tienda Leah Tech</h1>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $producto->nombre }}</h5>
                        <p>${{ number_format($producto->precio, 0) }}</p>
                        <form action="{{ route('carrito.add', $producto->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
