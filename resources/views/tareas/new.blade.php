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
                        <a href="{{route("tareas.show", $tarea)}}" class="text-green-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11.5 18c4 0 7.46-2.22 9.24-5.5C18.96 9.22 15.5 7 11.5 7s-7.46 2.22-9.24 5.5C4.04 15.78 7.5 18 11.5 18m0-12c4.56 0 8.5 2.65 10.36 6.5C20 16.35 16.06 19 11.5 19S3 16.35 1.14 12.5C3 8.65 6.94 6 11.5 6m0 2C14 8 16 10 16 12.5S14 17 11.5 17S7 15 7 12.5S9 8 11.5 8m0 1A3.5 3.5 0 0 0 8 12.5a3.5 3.5 0 0 0 3.5 3.5a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 11.5 9"/></svg></a>
                        <a href="{{route('tareas.edit', $tarea)}}" class="text-blue-600 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></g></svg></a>
                        <form action="{{route('tarea.destroy', $tarea)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" class="stroke-1 hover:stroke-2">
                                    <path fill="currentColor" d="M8.5 4h3a1.5 1.5 0 0 0-3 0m-1 0a2.5 2.5 0 0 1 5 0h5a.5.5 0 0 1 0 1h-1.054l-1.194 10.344A3 3 0 0 1 12.272 18H7.728a3 3 0 0 1-2.98-2.656L3.554 5H2.5a.5.5 0 0 1 0-1zM5.741 15.23A2 2 0 0 0 7.728 17h4.544a2 2 0 0 0 1.987-1.77L15.439 5H4.561zM8.5 7.5A.5.5 0 0 1 9 8v6a.5.5 0 0 1-1 0V8a.5.5 0 0 1 .5-.5M12 8a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                </svg>
                            </button>
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
