@extends('layouts.app')

@section('contenido')
<div class="container">
    <h1 class="mb-4">Nuestros Productos</h1>

    <div class="row">
        
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    {{-- Mostrar imagen si existe en la BD --}}
                    @if($producto->imagen)
                        <img
                           src="{{ asset('storage/' . $producto->imagen) }}"
                           alt="{{ $producto->nombre }}"
                           class="mx-auto w-48 h-36 object-cover rounded-lg shadow-sm"
                        />
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p><strong>${{ number_format($producto->precio, 0) }}</strong></p>

                        {{-- Botón para añadir al carrito --}}
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
