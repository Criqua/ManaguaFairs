@extends('layouts.app')

@section('content')
<section id="heroSection"
    class="min-h-screen overflow-hidden flex flex-col items-center justify-center text-center px-4 py-8 md:px-6 md:py-0 bg-gray-100 dark:bg-gray-900 text-white">

    <!-- Logo (ícono) representativo del sitio web -->
    <div class="mb-2 sm:mb-4">
        <div class="inline-flex items-center justify-center bg-gradient-to-tr from-slate-800 to-slate-700 p-4 rounded-full">
            <i class="fa-solid fa-store text-4xl text-gray-200"></i>
        </div>
    </div>

    <!-- Banner introductorio del sitio -->
    <h1 class="text-4xl sm:text-5xl font-semibold font-lora">ManaguaFairs</h1>

    <p class="mt-4 max-w-2xl text-base sm:text-lg leading-relaxed">
        ¡Bienvenido! Acá podés registrar y consultar ferias comunitarias de emprendimiento en todos los barrios de
        Managua y apoyar todos a los emprendedores locales
    </p>

    <!-- Botones de gestión de ferias y emprendedores -->
    <div class="mt-6 flex flex-col sm:flex-row gap-4 justify-center">
        <a href="#" class="w-48 px-6 py-3 bg-[#115e59] rounded-lg hover:bg-opacity-70 text-white font-medium transition duration-200">
            Ver Ferias
        </a>

        <a href="#" class="w-48 px-6 py-3 bg-[#3730a3] rounded-lg hover:bg-opacity-70 text-white font-medium transition duration-200">
            Ver Emprendedores
        </a>
    </div>

    <!-- Galería de Imágenes -->
    <div class="mt-8 flex justify-center items-end space-x-11">
        <div class="w-1/3 h-[170px] sm:h-48">
            <img src="{{ asset('img/fair1.webp') }}" alt="Feria ej. 1" class="w-full h-full object-cover object-center
                    rounded-lg shadow-lg
                    transform -rotate-3 transition duration-300 hover:rotate-0 hover:scale-105"/>
        </div>

        <div class="w-1/3 h-[170px] sm:h-48">
            <img src="{{ asset('img/fair2.webp') }}" alt="Feria ej. 2" class="w-full h-full object-cover object-center
                    rounded-lg shadow-lg
                    transform rotate-0 transition duration-300 hover:rotate-0 hover:scale-105"/>
        </div>

        <div class="w-1/3 h-[170px] sm:h-48">
            <img src="{{ asset('img/fair3.webp') }}" alt="Feria ej. 3" class="w-full h-full object-cover object-center
                    rounded-lg shadow-lg
                    transform rotate-3 transition duration-300 hover:rotate-0 hover:scale-105"/>
        </div>
    </div>
</section>