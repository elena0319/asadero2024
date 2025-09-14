@extends('layouts.app')

@section('contenido')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">🛒 Tu carrito</h2>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    @if(count($carrito) > 0)
        <table class="table-auto w-full mb-4">
            <thead>
                <tr>
                    <th class="text-left">Producto</th>
                    <th class="text-left">Precio</th>
                    <th class="text-left">Cantidad</th>
                    <th class="text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $id => $item)
                    <tr>
                       <td>{{ $item['nombre'] }}</td>
                       <td>${{ number_format($item['precio'], 0) }}</td>
                       <td>
                            <form action="{{ route('carrito.update', $id) }}" method="POST" class="inline-flex items-center space-x-2">
                                @csrf
                                @method('PUT')
                                <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" class="w-16 px-2 py-1 border rounded">
                                <button type="submit" class="btn btn-sm btn-info">Actualizar</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('carrito.remove', $id) }}" class="btn btn-sm btn-error">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right mb-4">
            <p class="text-xl font-semibold">Total: ${{ number_format($total, 0) }}</p>
        </div>

        <form action="{{ route('carrito.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Finalizar compra</button>
        </form>
    @else
        <p class="text-gray-600">Tu carrito está vacío.</p>
    @endif
</div>
@endsection