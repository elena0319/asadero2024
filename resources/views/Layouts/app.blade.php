<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo','LeahTech')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <header>
      {{-- Navbar --}}
      @include('layouts.navbar')
    </header>

    <main>
      <div class="bg-green-100 my-4 text-center">
        <h1 class="text-lg font-semibold m-4 uppercase">@yield('cabecera')</h1>
      </div>

        @if(session('success'))
          <div class="alert alert-success text-center bg-green-200 text-green-800 py-2 px-4 rounded-lg mx-auto w-3/4 mb-4">
          {{ session('success') }}
          </div>
        @endif


      @yield('contenido')
    </main>

    <footer class="footer items-center p-4 bg-neutral text-neutral-content">
      @include('layouts.footer')
    </footer>

    <!-- Modal Servicios -->
    <div id="servicesModal" class="hidden fixed inset-0 z-50">
      <!-- Fondo (clic para cerrar) -->
      <div class="absolute inset-0 bg-black/50" onclick="closeServicesModal()" aria-hidden="true"></div>

      <!-- Contenido -->
      <div class="relative z-10 mx-auto mt-24 w-11/12 md:w-1/2 bg-white rounded-2xl shadow-lg p-6">
        <!-- Botón X -->
        <button type="button"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl leading-none"
                aria-label="Cerrar"
                onclick="closeServicesModal()">×</button>

        <h2 class="text-2xl font-bold text-center mb-4">Nuestros Servicios</h2>
        <p class="text-gray-700 mb-4">
          Leah Tech ofrece un sistema de información para artesanos y emprendedores:
          catálogo digital, gestión de inventario, ventas en línea y soporte de digitalización.
        </p>

        <div class="mt-6 text-center">
          <button onclick="closeServicesModal()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            Cerrar
          </button>
        </div>
      </div>
    </div>

    <!-- Modal Acerca de Nosotros -->
    <div id="aboutModal" class="hidden fixed inset-0 z-50">
      <!-- Fondo (clic para cerrar) -->
      <div class="absolute inset-0 bg-black/50" onclick="closeAboutModal()" aria-hidden="true"></div>

      <!-- Contenido -->
      <div class="relative z-10 mx-auto mt-24 w-11/12 md:w-1/2 bg-white rounded-2xl shadow-lg p-6">
        <!-- Botón X -->
        <button type="button"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl leading-none"
                aria-label="Cerrar"
                onclick="closeAboutModal()">×</button>

        <h2 class="text-2xl font-bold text-center mb-4">Acerca de Leah Tech</h2>

        <div class="space-y-4 text-gray-700">
          <div>
            <h3 class="font-semibold text-lg">Historia</h3>
            <p>Leah Tech surgió como parte de un proceso lectivo realizado en el Servicio Nacional de Aprendizaje (SENA), durante la formación en Análisis y Desarrollo de Software, donde se incentivaba a los aprendices a desarrollar ideas de negocio con impacto social y crecimiento. Durante el proceso formativo se identificó una clara oportunidad en el mercado local y nacional, la creciente demanda por productos artesanales, originales y que reflejan la riqueza y tradición de la cultura indígena wayuu. Esta necesidad y el deseo de crecer tanto profesional como personalmente, se decidió emprender un proyecto que fusiona la tradición cultural con la tecnología, a través de una plataforma digital que permite la venta y distribución de mochilas Wayuu y otros accesorios artesanales, promoviendo el talento de las comunidades indígenas.</p>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Misión</h3>
            <p>Leah Tech es una empresa dedicada al desarrollo de sistemas de información innovadores y funcionales, cuyo propósito es ofrecer soluciones tecnológicas accesibles, seguras y personalizadas para empresas y emprendedores. </p>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Visión</h3>
            <p>Leah Tech en el 2030 será la empresa líder en el mercado regional y nacional en el desarrollo de soluciones tecnológicas innovadoras, reconocida por su compromiso con la transformación digital y el desarrollo social.</p>
          </div>
        </div>

        <div class="mt-6 text-center">
          <button onclick="closeAboutModal()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            Cerrar
          </button>
        </div>
      </div>
    </div>

    <!-- Scripts abrir/cerrar + ESC -->
    <script>
      function openServicesModal() {
        document.getElementById('servicesModal').classList.remove('hidden');
      }
      function closeServicesModal() {
        document.getElementById('servicesModal').classList.add('hidden');
      }
      function openAboutModal() {
        document.getElementById('aboutModal').classList.remove('hidden');
      }
      function closeAboutModal() {
        document.getElementById('aboutModal').classList.add('hidden');
      }

      // Cerrar con ESC
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
          closeServicesModal();
          closeAboutModal();
        }
      });
    </script>
     @stack('scripts')
  </body>
</html>
