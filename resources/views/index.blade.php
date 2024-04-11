@extends('layouts.app')

@section('titulo')
    Pagina principal
@endsection

@section('contenido')
    <div class="relative mt-16">
        <img src="{{ asset('img/index-hero.png') }}" alt="Hero Image" class="bg-cover">
    
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-xl md:text-4xl font-bold mb-4">
                    Tu comida favorita,
                    a solo un toque de distancia.
                </h1>
        
                @auth
                    <a href="{{ route('shop') }}" class="text-base md:text-lg text-white bg-green-700 hover:bg-green-800 font-bold py-2 px-4 mt-4 focus:ring-blue-300 rounded-lg  text-center inline-flex items-center me-2 ">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        ORDENA YA!
                    </a>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-base md:text-lg text-white bg-green-700 hover:bg-green-800 font-bold py-2 px-4 mt-4 focus:ring-blue-300 rounded-lg  text-center inline-flex items-center me-2 ">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        ORDENA YA!
                    </a>
                @endguest
            </div>
        </div>
    </div>

    <div class="mx-auto container mt-10">
        <h2 class="text-2xl font-bold mb-5">¿Dónde estamos?</h2>
        <div class="flex justify-center">
            <img class="w-80 mx-auto md:w-5/6 md:m-0" src="{{ asset('img/location.png') }}">
        </div>

        <h4 class="text-base font-semibold my-10">UAS CU</h4>
    </div>
@endsection