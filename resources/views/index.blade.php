<x-guest-layout>


    <div class="min-h-screen flex flex-col bg-gradient-to-br from-gray-50 via-indigo-50 to-gray-100">

        <!-- Hero con imagen + texto -->
        <section class="flex flex-col md:flex-row items-center max-w-6xl mx-auto px-6 py-28 gap-16 flex-grow">

            <!-- Imagen -->
            <div class="w-full md:w-1/2 flex justify-center">
                <img 
                    src="/images/home.jpg" 
                    alt="Gestión de productos" 
                    class="w-92 h-92 object-cover rounded-xl shadow-lg border border-gray-200"
                >
            </div>

            <!-- Texto -->
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                    Gestiona tus productos con eficiencia
                </h1>

                <p class="mt-6 text-lg text-gray-600">
                    Una plataforma diseñada para ayudarte a organizar tu inventario, optimizar tu negocio
                    y tomar decisiones con información clara y accesible.
                </p>

                <div class="mt-10 flex justify-center md:justify-start gap-4">
                    <a href="{{ route('login') }}"
                        class="px-8 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition">
                        Iniciar sesión
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-8 py-3 bg-green-200 text-gray-800 font-medium rounded-lg hover:bg-green-300 transition">
                        Crear cuenta
                    </a>
                </div>
            </div>

        </section>

        <!-- Footer -->


    </div>
</x-guest-layout>
