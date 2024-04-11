@extends('layouts.app')

@section('titulo')
    Registrarse
@endsection

@section('contenido')
    <h2 class="text-center font-black text-3xl mt-24">Crear cuenta</h2>

    <div class="md:flex md:justify-center md:gap-4 md:items-center mb-10">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/fondo.jpg') }}" alt="Imagen registro">
        </div>

        <div class="md:w-4/12 bg-gray-200 p-5 shadow-xl rounded-lg">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-black font-bold">
                        Nombre
                    </label>
                    <input 
                        id="name" 
                        name="name"
                        type="text" 
                        class="border p-3 w-full rounded-xl 
                        @error('name')
                            border-red-500    
                        @enderror" 
                        value="{{ old('name') }}"
                        placeholder="Tu nombre"
                    > 
                    
                        @error('name')
                            <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                                {{$message}}
                            </p>
                        @enderror
                </div>


                <div class="mb-5">
                    <label for="user" class="mb-2 block uppercase text-black font-bold">
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
                    <label for="email" class="mb-2 block uppercase text-black font-bold">
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email" 
                        type="email" 
                        class="border p-3 w-full rounded-xl
                        @error('email')
                            border-red-500    
                        @enderror"
                        placeholder="Tu usuario"
                        value="{{ old('email') }}"
                        >
                        
                        @error('email')
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
                    <label for="password_confirmation" class="mb-2 block uppercase text-black font-bold">
                        Repetir Password
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation" 
                        type="password" 
                        class="border p-3 w-full rounded-xl
                        @error('password')
                            border-red-500    
                        @enderror"
                        placeholder="Repite tu password"> 
                </div>

                <input type="submit"
                class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase w-full p-2 rounded-lg text-white font-bold"
                value="Crear cuenta">

                
            </form>
            <button id="user_list" class="bg-green-400 my-3 hover:bg-green-800 transition-colors cursor-pointer uppercase w-full p-2 rounded-lg text-white font-bold">
                Listar
            </button>
            

            <div class="fixed z-10 inset-0 overflow-y-auto" style="display: none;" id="modal-example">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="bg-white p-8 rounded-lg">

                        <div class="flex justify-between items-center">
                            <h1 class="text-xl font-bold">Usuarios</h1>
                            <button id="close-modal" class="text-gray-500 text-lg hover:text-gray-700 hover:font-extrabold">&times;</button>
                        

                        </div>
                        <div class="mt-4">
                            <ul>
                                
                                @if (count($users) == 0)
                                    <h3 class="text-lg">No hay usuarios registrados</h3>
                                @endif
                                @foreach($users as $user)
                                    <li>{{ $user->user }} - {{ $user->password }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="fixed inset-0 bg-black opacity-25" style="display: none;" id="modal-overlay"></div>
        

            
        </div>
    </div>
    <script src="/js/userList.js"></script>


  
@endsection