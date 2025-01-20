@extends('app')

@section('content')
    <div class="flex justify-center mt-8">
        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="fixed inset-0 bg-black bg-opacity-20 backdrop-blur-sm"></div>
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg border border-black shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-black">
                            Crea una tarea
                        </h3>
                        <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{route('tarea.store')}}" method="POST" class="p-4 md:p-5">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-black">Nombre de
                                    tarea</label>
                                <input id="name" name="name" type="text" value="{{old('name')}}"
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-2">
                                <label for="category" class="block mb-2 text-sm font-medium text-black">Nombre de
                                    categoria</label>
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
                            </div>
                            <div class="col-span-2">
                                <label for="description"
                                       class="block mb-2 text-sm font-medium text-black">Descripcion</label>
                                <textarea id="descripcion" name="descripcion" type="text" value="{{old('descripcion')}}"
                                          rows="4"
                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="Write product description here"></textarea>
                            </div>
                        </div>
                        <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            Añade una tarea
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-start space-x-4 w-2/3 backdrop-blur-sm p-4 shadow-md rounded-lg fixed z-20">

            <div>
                <!-- Modal toggle -->
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                    Registra la tarea
                </button>
            </div>
            <div>
                <a href=""
                   class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                   type="button">
                    Ver tareas terminadas
                </a>
            </div>
        </div>

        <div class="w-2/3 mt-24 px-6 py-12">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{--Tareas no terminadas--}}
            <div class="relative overflow-x-auto sm:rounded-lg mx-auto mt-8 w-full">
                <div><h1 class="text-2xl underline">Tareas Pendientes</h1></div>
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                    @if( count($tareas)=== 0)
                        No hay tareas disponible
                    @else
                        @foreach ($tareas as $tarea)
                            @if($tarea->finished == false)
                                <div
                                    class="w-64 h-64 bg-white rounded-lg border-2 border-black shadow-lg p-4 flex flex-col justify-between">
                                    <!-- Header -->

                                    <div class="flex flex-row justify-start items-center space-x-2">
                                        <span class="inline-block w-6 h-6 rounded-full"
                                              style="background-color: {{ $tarea->Category->color ?? '#ccc' }};"></span>
                                        <h1 class="font-bold text-lg">{{$tarea->name}}</h1>
                                    </div>

                                    <!-- Description -->

                                    <p class="flex-1 mt-2 overflow-y-auto text-sm text-gray-700 break-words">
                                        {{$tarea->descripcion}}
                                    </p>

                                    <!-- Footer (Buttons) -->
                                    <div class="flex justify-between space-x-4 mt-2">
                                        <div>
                                            <form method="POST" action="{{ route('tarea.completed', $tarea->id) }}">
                                                @csrf
                                                @method('PATCH')

                                                <!-- Campo oculto para enviar el valor false (0) -->
                                                <input type="hidden" name="finished" value="0">

                                                <!-- Checkbox -->
                                                <label>
                                                    <input name="finished" type="checkbox"
                                                           value="1" {{ $tarea->finished ? 'checked' : '' }}>
                                                </label>
                                                <button type="submit">Terminar</button>
                                            </form>


                                        </div>
                                        <form action="{{route('tarea.destroy', $tarea)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex flex-row space-x-2">
                                                <a href="{{route("tareas.show", $tarea)}}">
                                                    <x-show-button/>
                                                </a>
                                                <a href="{{route('tareas.edit', $tarea)}}">
                                                    <x-update-button/>
                                                </a>
                                                <x-delete-modal id="popup-modal-{{ $tarea->id }}"
                                                                description="¿Estas seguro de querer borrar esta tarea?"/>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <br>
            </div>
            {{--            Tareas Terminadas--}}
            <div class="relative overflow-x-auto sm:rounded-lg mx-auto mt-8 w-full">
    <div><h1 class="text-2xl underline">Tareas Terminadas</h1></div>
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                    @if( count($tareas)=== 0)
                        No hay tareas Termindas
                    @else
                        @foreach ($tareas as $tarea)
                            @if($tarea->finished == true)
                                <div
                                    class="w-64 h-64 bg-white rounded-lg border-2 border-black shadow-lg p-4 flex flex-col justify-between">
                                    <!-- Header -->

                                    <div class="flex flex-row justify-start items-center space-x-2">
                                        <span class="inline-block w-6 h-6 rounded-full"
                                              style="background-color: {{ $tarea->Category->color ?? '#ccc' }};"></span>
                                        <h1 class="font-bold text-lg">{{$tarea->name}}</h1>
                                    </div>

                                    <!-- Description -->

                                    <p class="flex-1 mt-2 overflow-y-auto text-sm text-gray-700 break-words">
                                        {{$tarea->descripcion}}
                                    </p>

                                    <!-- Footer (Buttons) -->
                                    <div class="flex justify-between space-x-4 mt-2">
                                        <div>
                                            <form method="POST" action="{{ route('tarea.completed', $tarea->id) }}">
                                                @csrf
                                                @method('PATCH')

                                                <!-- Campo oculto para enviar el valor false (0) -->
                                                <input type="hidden" name="finished" value="0">

                                                <!-- Checkbox -->
                                                <label>
                                                    <input name="finished" type="checkbox"
                                                           value="1" {{ $tarea->finished ? 'checked' : '' }}>
                                                </label>
                                                <button type="submit">Activar</button>
                                            </form>


                                        </div>
                                        <form action="{{route('tarea.destroy', $tarea)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex flex-row space-x-2">
                                                <a href="{{route("tareas.show", $tarea)}}">
                                                    <x-show-button/>
                                                </a>
                                                <x-delete-modal id="popup-modal-{{ $tarea->id }}"
                                                                description="¿Estas seguro de querer borrar esta tarea?"/>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <br>
            </div>
        </div>
    </div>

@endsection
