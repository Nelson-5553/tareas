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
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button">
                                <x-delete-buttom/>
                            </button>

                            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Se borraran <strong>todas las tareas</strong> relacionadas a esta categoria: {{$categoria->name}}</h3>
                                            <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Eliminar
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
