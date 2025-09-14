<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    // Mostrar carrito
    public function index()
    {
        $carrito = session()->get('carrito', []); // si no existe, array vacío
        $total = 0;

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('carrito.index', compact('carrito', 'total' ));
    }

    // Añadir producto al carrito
    public function add($id)
    {
        $producto = Producto::findOrFail($id);

        // Obtener carrito actual
        $carrito = session()->get('carrito', []);

        // Si el producto ya está en el carrito, aumentar cantidad
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            // Si no está, agregarlo
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "precio" => $producto->precio,
                "cantidad" => 1,
            ];
        }

        // Guardar carrito en sesión
        session()->put('carrito', $carrito);

        return redirect()->route('carrito')->with('success', 'Producto añadido al carrito.');
    }

    // Quitar producto del carrito
    public function remove($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]); // eliminar producto del array
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito.');
    }

    public function update(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $cantidad = max(1, (int) $request->input('cantidad')); // mínimo 1
            $carrito[$id]['cantidad'] = $cantidad;
            session()->put('carrito', $carrito);
        }

         return redirect()->route('carrito')->with('success', 'Cantidad actualizada.');
    }
    
    
    // Simular compra (checkout)
    public function checkout()
    {
        // Aquí podrías guardar la orden en la BD más adelante
        session()->forget('carrito'); // vaciar carrito
        return redirect()->route('tienda')->with('success', 'Compra realizada con éxito 🎉');
    }
}

