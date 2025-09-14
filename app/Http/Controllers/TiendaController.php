<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importamos el modelo Producto

class TiendaController extends Controller
{
    public function index()
    {
        // Traer todos los productos de la base de datos
        $productos = Producto::all();

        // Pasar productos a la vista
        return view('tienda.index', compact('productos'));
    }
}

