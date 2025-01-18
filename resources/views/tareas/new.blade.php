@extends('app')

@section('content')
<div class="flex justify-center mt-8">
    <div class="w-2/3 backdrop-blur-sm p-4 shadow-md rounded-lg fixed z-20">
        <form action="{{route('tarea.store')}}" method="POST" class="flex flex-wrap items-center justify-between space-x-4 max-w-6xl mx-auto">
            @csrf
            <div class="flex-1">
                <label for="name" class="block text-sm font-medium text-gray-900">Nombre de tarea</label>
                <input id="name" name="name" type="text" value="{{old('name')}}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('name')
                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="flex-1">
                <label for="id_category" class="block text-sm font-medium text-gray-900">Nombre de Categoria</label>
                <select id="id_category" name="id_category"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @if(count($category) === 0)
                        <option value="" disabled selected hidden>No hay categorias disponibles</option>
                    @else
                        <option value="" disabled selected hidden>Selecciona una categoría</option>
                        @foreach($category as $categoria)
                            <option value="{{$categoria->id}}">
                                {{$categoria->name}}
                            </option>
                        @endforeach
                    @endif
                </select>

                @error('id_category')
                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="flex-1">
                <label for="descripcion" class="block text-sm font-medium text-gray-900">Descripción</label>
                <input id="descripcion" name="descripcion" type="text" value="{{old('descripcion')}}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('descripcion')
                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-500 focus:ring-indigo-500">
                    Registra la tarea
                </button>
            </div>
        </form>
    </div>

    <div class="w-2/3 mt-24 px-6 py-12">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto sm:rounded-lg mx-auto mt-8 w-full">

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @if( count($tareas)=== 0)
                    No hay tareas disponible
                @else
                @foreach ($tareas as $tarea)
                <div class="w-64 h-64 bg-white rounded-lg border-2 border-black shadow-lg p-4 flex flex-col justify-between">
                    <!-- Header -->
                    <div class="flex items-center space-x-2">
                        <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{ $tarea->Category->color ?? '#ccc' }};"></span>
                        <h1 class="font-bold text-lg">{{$tarea->name}}</h1>
                    </div>

                    <!-- Description -->

                    <p class="flex-1 mt-2 overflow-y-auto text-sm text-gray-700 break-words">
                        {{$tarea->descripcion}}
                    </p>

                    <!-- Footer (Buttons) -->
                    <div class="flex justify-end space-x-4 mt-2">
                        <a href="{{route("tareas.show", $tarea)}}" ><x-show-button/></a>
                        <a href="{{route('tareas.edit', $tarea)}}"><x-update-button/></a>
                        <form action="{{route('tarea.destroy', $tarea)}}" method="post">
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
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguro de querer borrar esta tarea?</h3>
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
            <br>
        </div>
    </div>
</div>

@endsection
