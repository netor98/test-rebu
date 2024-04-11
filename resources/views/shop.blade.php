@extends('layouts.app')

@section('titulo')
    Tienda
@endsection

@section('contenido')


    <div class="my-14 container p-16 mx-auto">
        @if(session('success'))
            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
                    
                </div>
                
            </div>  
        @endif

        @if(session('checkout'))
        <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('checkout') }}
                
            </div>
            
        </div>  
    @endif
        <h3 class="text-center text-2xl uppercase font-bold mb-5">Bienvenido, {{auth()->user()->username}} 😊</h3>
        
        <!--Categorias-->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
           

            <div class="border border-gray-200  hover:border-gray-300 hover:scale-105 transition-transform rounded-lg"> 

                <div class="flex justify-between items-center p-2">
                    <div class="space-y-4">
                        <h3 class="font-medium text-xl">Frutas</h3>
                        <p class="text-gray-500">10 productos</p>
                    </div>

                    <div class="rounded-full bg-gray-200">
                        <img class="w-[60px] h-[60px]" src="{{ asset('img/postres.png') }}">
                    </div>
                </div>

               
            </div>

            <div class="border border-gray-200  hover:border-gray-300 hover:scale-105 transition-transform rounded-lg"> 

                <div class="flex justify-between items-center p-2">
                    <div class="space-y-4">
                        <h3 class="font-medium text-xl">Frutas</h3>
                        <p class="text-gray-500">10 productos</p>
                    </div>
                    <div class="rounded-full bg-gray-200">
                        <img class="w-[60px] h-[60px]" src="{{ asset('img/postres.png') }}">
                    </div>
                </div>
            </div>
                

            <div class="border border-gray-200  hover:border-gray-300 hover:scale-105 transition-transform rounded-lg"> 
                <div class="flex justify-between items-center p-2">
                    <div class="space-y-4">
                        <h3 class="font-medium text-xl">Frutas</h3>
                        <p class="text-gray-500">10 productos</p>
                    </div>
                    <div class="rounded-full bg-gray-200">
                        <img class="w-[60px] h-[60px]" src="{{ asset('img/postres.png') }}">
                    </div>
                </div>
            </div>

            <div class="border border-gray-200  hover:border-gray-300 hover:scale-105 transition-transform rounded-lg"> 
                <div class="flex justify-between items-center p-2">
                    <div class="space-y-4">
                        <h3 class="font-medium text-xl">Frutas</h3>
                        <p class="text-gray-500">10 productos</p>
                        
                    </div>
                    <div class="rounded-full bg-gray-200">
                        <img class="w-[60px] h-[60px]" src="{{ asset('img/postres.png') }}">
                    </div>

                    
                </div>
            </div>
        </div>

        <!--Productos-->
        <div class="container pt-16">
            <div class="lg:flex justify-between items-center">
                <div>
                    <h3 class="font-medium text-2xl">Postres y snakcs</h3>
                    <p class="text-gray-600 mt-2">Compra postres y snakcs de distintas tiendas online a los mejores precios</p>
                </div>
                
                <div class="space-x-4 mt-8 lg:mt-0">
                    <button class="text-white px-4 py-1 rounded-full"
                        style="background-color: #B67352">Postres</button>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 pt-8 gap-2">
                @foreach($products as $product)
                    @if ($product->active == 1)
                        
                        <div class="border border-gray-200 hover:border-gray-300 hover:scale-105 transition-transform rounded-lg relative p-3">
                        
                            <img src="{{ asset('/storage/uploads/' . $product->image) }}" alt="{{ $product->name }}" class="h-36 my-4">
                        
                            <h3 class="font-medium name">{{$product->name}}</h3>
        
                            <h3 class="text-2xl font-medium text-red-600">${{$product->price}}</h3>
        
        
                            <a href="{{ route('add.to.cart', $product->id) }}" class="absolute bottom-3 right-2 text-white rounded-full grid place-items-center cursor-pointer text-[28px] w-[40px] h-[40px]"
                            style="background-color: #B67352">
                                <svg class="text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <script src="/js/searcher.js"></script>
@endsection