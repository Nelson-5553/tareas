@extends('app')

@section('content')

    <div class="flex justify-center mt-8" xmlns="http://www.w3.org/1999/html">
        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="fixed inset-0 bg-black bg-opacity-20 backdrop-blur-sm"></div>
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg border border-black shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-black">
                            Crea una tarea
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{route('store.categorias')}}" method="POST" class="p-4 md:p-5">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-black">Nombre de tarea</label>
                                <input id="categoria" name="name" type="text" value=""
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-2">
                                <label for="category" class="block mb-2 text-sm font-medium text-black">Nombre de categoria</label>
                                <input id="color" name="color" type="color" value=""
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Añade una categoria
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-2/3 backdrop-blur-sm p-4 shadow-md rounded-lg z-20">
                <div>
                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Registra la Categoria
                    </button>
                </div>
            </form>
        </div>

    </div>
   <div class="flex justify-center">
    <div class="w-2/3 mt-12 px-6 py-12">
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
