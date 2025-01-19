@extends('app')

@section('content')

    <div class="flex justify-center mt-8" xmlns="http://www.w3.org/1999/html">

        <div class="w-2/3 backdrop-blur-sm p-4 shadow-md rounded-lg z-20">
            <form class="space-y-6 flex flex-wrap items-center justify-between space-x-4 max-w-6xl mx-auto" action="{{route('store.categorias')}}" method="POST">
                @method('post')
                @csrf

                <div class="flex-1">
                    <label for="categoria" class="block text-sm font-medium text-gray-900">Nombre de Categoria</label>
                    <input id="categoria" name="name" type="text" value=""
                           class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('categoria')
                    <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="flex-1">
                    <label for="color" class="block text-sm font-medium text-gray-900">Color</label>
                    <input id="color" name="color" type="color" value=""
                           class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus:ring-indigo-500">
                        Registra la Categoria
                    </button>
                </div>
            </form>
        </div>

    </div>
   <div class="flex justify-center">
    <div class="w-2/3 mt-24 px-6 py-12">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif
    <div class="relative overflow-x-auto sm:rounded-lg mx-auto mt-8 w-full">
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @if( count($category)=== 0)
            No hay categorias disponible
        @else
            @foreach ($category as $categoria)
                <div class="w-64 h-auto bg-white rounded-lg border-2 border-black shadow-lg p-4 flex flex-col justify-between">
                    <!-- Header -->
                    <div class="flex justify-center items-center space-x-2">
                        <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{ $categoria->color ?? '#ccc' }};"></span>
                        <h1 class="font-bold text-lg">{{$categoria->name}}</h1>
                    </div>

                    <!-- Footer (Buttons) -->
                    <div class="flex justify-center space-x-4 mt-2">
                      <a href="{{route('categoria.show', $categoria)}}" ><x-show-button/></a>
                        <a href="{{route('categoria.edit', $categoria)}}"><x-update-button/> </a>
                        <form action="{{route('categoria.destroy' ,$categoria)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-delete-modal id="popup-modal-{{ $categoria->id }}" description="¿Estas seguro de querer borrar la categoria: {{$categoria->name}} las tareas relacionadas esta categoria tambien seran eliminadas?"/>

                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
    </div>
   </div>


@endsection
