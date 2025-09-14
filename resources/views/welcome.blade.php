@extends('layouts.app')

@section('titulo', 'Leah Tech - Inicio')

@section('contenido')
@if(session('success'))
    <div class="alert alert-success mb-4 text-center">
        {{ session('success') }}
    </div>
@endif

<div class="hero min-h-screen" 
     style="background-image: url('{{ asset('images/wayuu.jpg') }}'); 
            background-size: cover; 
            background-position: center;">
    <div class="hero-content flex-col text-center text-black bg-black bg-opacity-60 p-10 w-full max-w-4xl mx-auto rounded-xl">

        {{-- Logo grande centrado --}}
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo Leah Tech" class="w-40 mx-auto mb-6 rounded-xl shadow-lg" />

        {{-- Título principal --}}
        <h1 class="text-5xl font-extrabold mb-4">
            Bienvenido a <span class="text-black">Leah Tech</span>
        </h1>

        {{-- Descripción --}}
        <p class="py-4 text-lg max-w-xl mx-auto">
            Sistema de información diseñado para apoyar a 
            <span class="font-semibold text-black">Artesanos</span> y 
            <span class="font-semibold text-black">Emprendedores</span> 
            en la gestión de sus negocios, facilitando su crecimiento y digitalización.
        </p>

        {{-- Botón para abrir el modal --}}
        <div class="flex gap-4 justify-center mt-6">
            <button id="openModal" class="btn btn-primary btn-lg shadow-md">
                Contáctanos
            </button>
        </div>
    </div>
</div>

{{-- Modal de contacto --}}
<div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
        {{-- Botón de cierre --}}
        <button onclick="document.getElementById('contactModal').classList.add('hidden')" 
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl font-bold">
            &times;
        </button>

        {{-- Título --}}
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Contáctanos</h2>

        {{-- Información de contacto --}}
        <ul class="space-y-4 text-lg text-gray-700">
            <li>📞 <strong>Teléfono:</strong> +57 300 123 4567</li>
            <li>📧 <strong>Correo:</strong> contacto@leahtech.com</li>
            <li>🌐 <strong>Sitio web:</strong> <a href="https://leahtech.com" class="text-blue-600 underline">www.leahtech.com</a></li>
            <li>📱 <strong>Instagram:</strong> <a href="https://instagram.com/leahtech" class="text-blue-600 underline">@leahtech</a></li>
        </ul>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('contactModal').classList.remove('hidden');
        });
    });
</script>
@endpush





