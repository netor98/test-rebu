@extends('layouts.app')

@section('titulo')
    Crear Producto
@endsection

@section('contenido')
    <div class="my-14 container p-16 mx-auto max-w-lg">
        <h3 class="font-medium text-2xl my-4">@if (isset($edit->id)) {{ 'Edición de producto' }} @else {{'Creación de producto'}}@endif</h3>


        <form action="@if (isset($edit->id)) {{ route('product.update', ['id' => $edit->id]) }}@else{{ route('create.product') }} @endif" method="POST" class="bg-gray-200 p-5 shadow-xl rounded-lg" novalidate enctype="multipart/form-data">
            @csrf

            @if(session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                    {{session('mensaje')}}
                </p>
            @endif

        
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
                    placeholder="Producto"
                    value="@if (isset($edit->id)) {{ $edit->name }}@endif">
                    
                    
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                            {{$message}}
                        </p>
                    @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-black font-bold">
                    Cantidad
                </label>
                <input 
                    id="cuantity"
                    name="cuantity" 
                    type="text" 
                    class="border p-3 w-full rounded-xl
                    @error('cuantity')
                        border-red-500    
                    @enderror"
                    placeholder="Ej: 5"
                    value="@if (isset($edit->id)) {{ $edit->cuantity }}@endif">

                    @error('cuantity')
                        <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                            {{$message}}
                        </p>
                    @enderror

            </div>

            <div class="mb-5">
                <label for="price" class="mb-2 block uppercase text-black font-bold">
                    Precio
                </label>
                <input 
                    id="price"
                    name="price" 
                    type="text" 
                    class="border p-3 w-full rounded-xl
                    @error('price')
                        border-red-500    
                    @enderror"
                    placeholder="Ej: 5"
                    value="@if (isset($edit->id)) {{ $edit->price }}@endif"> 

                    @error('price')
                        <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                            {{$message}}
                        </p>
                    @enderror
            </div>


            <div class="mb-5">
                <label for="price" class="mb-2 block uppercase text-black font-bold">
                    Estado
                </label>
                <input 
                    id="active"
                    name="active" 
                    type="text" 
                    class="border p-3 w-full rounded-xl
                    @error('price')
                        border-red-500    
                    @enderror"
                    placeholder="1: Activo, 0:Desactivo"
                    value="@if (isset($edit->id)) {{ $edit->active }}@endif"> 

                    @error('price')
                        <p class="bg-red-500 text-white my-2 rounded-md text-center text-sm p-2">
                            {{$message}}
                        </p>
                    @enderror
            </div>

            <div class="mb-5">
                <label for="">Foto</label>
                <div class="avatar-upload">
                    <div>
                        <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg"
                        value="@if (isset($edit->id)) {{ $edit->image }}@endif" />
                        <label for="imageUpload">@if (isset($edit->id)) {{ $edit->image }}@endif</label>
                    </div>
                    
                </div>
            </div>

            <input type="submit"
            class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase w-full p-2 rounded-lg text-white font-bold"
            value="Crear producto">
        </form>
  
    </div>
@endsection