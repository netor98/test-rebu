@extends('layouts.app')

@section('titulo')
    Iniciar sesión
@endsection

@section('contenido')
    <h2 class="text-center font-black text-3xl mt-24">Iniciar sesión</h2>

    <div class="md:flex md:justify-center md:gap-4 md:items-center mb-10">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/fondo-login.jpg')}}" alt="Imagen registro">
        </div>

        <div class="md:w-4/12 bg-gray-200 p-5 shadow-xl rounded-lg">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                        {{session('mensaje')}}
                    </p>
                @endif

            
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-black font-bold">
                        Usuario
                    </label>
                    <input 
                        id="username"
                        name="username" 
                        type="text" 
                        class="border p-3 w-full rounded-xl
                        @error('username')
                            border-red-500    
                        @enderror"
                        placeholder="Tu usuario"
                        value="{{ old('username') }}"
                        >
                        
                        @error('username')
                            <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                                {{$message}}
                            </p>
                        @enderror

                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-black font-bold">
                        Password
                    </label>
                    <input 
                        id="password"
                        name="password" 
                        type="password" 
                        class="border p-3 w-full rounded-xl
                        @error('password')
                            border-red-500    
                        @enderror"
                        placeholder="Tu password"> 

                        @error('password')
                            <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                                {{$message}}
                            </p>
                        @enderror

                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="checkbox">
                    <label class="text-black text-base" for="checkbox">
                        Mantener mi sesión abierta
                    </label>
                </div>

                <input type="submit"
                class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase w-full p-2 rounded-lg text-white font-bold"
                value="Iniciar sesión">
            </form>
        </div>
    </div>
@endsection