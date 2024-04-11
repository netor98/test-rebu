@extends('layouts.app')

@section('titulo')
    Admin
@endsection

@section('contenido')
    
<div class="my-14 container p-16 mx-auto">
    <h3 class="font-medium text-2xl">Productos</h3>

    <a href="{{ route('product.create') }}" type="button" class="text-white absolute right-0 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">+ Agregar producto</a>

    <div class="overflow-x-auto my-16 shadow-md sm:rounded-lg">
        <table class="w-full  text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre del producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="bg-white border-b" id="{{$product->id}}">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap name">
                            {{$product->name}}
                        </th>
                        <td class="px-3 py-4">
                            <div class="showPhoto">
                                <div id="imagePreview" style="@if ($product->image != '') background-image: url('{{ asset('/storage/uploads') }}/{{ $product->image }}')@else background-image: url('{{ url('/img/fondo.jpg') }}') @endif;">
                                </div>
                            </div>

                        </td>
                        <td class="px-6 py-4">
                            {{$product->cuantity}}
                            
                        </td>
                        <td class="px-6 py-4">
                            ${{$product->price}}
                            
                        </td>

                        <td class="px-6 py-4">
                            {{$product->active}}
                            
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="mx-2 font-bold text-blue-500 hover:underline">Editar</a>
                            <a href="" class="mx-2 font-bold text-red-500 hover:underline delete-product">Eliminar</a>
                            
                        </td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
        
</div>
<style>
    .showPhoto {
        width: 80%;
        height: 60px;
    }
 
    .showPhoto>div {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<script type="text/javascript">
    $(".delete-product").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Quieres eliminar el producto?")) {
            $.ajax({
                url: '{{route('product.delete')}}',
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("id")
                },
                success: function (response) {
                    window.location.reload();
                }
            })
        }
    })

    const d = document;
    const $searcher = d.getElementById("searcher");
    const $products = d.querySelectorAll(".name");

    d.addEventListener("DOMContentLoaded", (e) => {
        // Actualizar la cantidad de productos al cargar la página

        $searcher.addEventListener("input", (e) => {
            const searchText = e.target.value.toLowerCase(); // Convertir el texto ingresado a minúsculas

            $products.forEach((product) => {
                const productName = product.textContent.toLowerCase(); // Obtener el texto del elemento en minúsculas
                if (productName.includes(searchText)) {
                    product.parentElement.classList.remove('hidden') // Ocultar el producto si no coincide con la búsqueda
                    // Mostrar el producto si coincide con la búsqueda
                } else {
                    product.parentElement.classList.add('hidden') // Ocultar el producto si no coincide con la búsqueda
                    // Ocultar el producto si no coincide con la búsqueda
                }
            });
        });
    });

</script>


@endsection