@extends('app')

@section('content')

    <div class="w-full backdrop-blur-sm p-4 fixed shadow-md">
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
                    @foreach($category as $categoria)
                        <option value="{{$categoria->id}}">
                            {{$categoria->name}}
                        </option>
                    @endforeach
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

    <div class="mt-24 px-6 py-12">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto mt-8 w-1/2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-4 py-4">Color</th>
                    <th scope="col" class="px-4 py-4">Nombre de tareas</th>
                    <th scope="col" class="px-4 py-4">Descripción</th>
                    <th scope="col" class="px-4 py-4">Categoría</th>
                    <th scope="col" class="px-4 py-4">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tareas as $tarea)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">
            <span class="inline-block w-6 h-6 rounded-full"
                  style="background-color: {{ $tarea->Category->color ?? '#ccc' }};"></span>
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{$tarea->name}}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{$tarea->descripcion}}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{$tarea->Category->name ?? 'Sin categoría'}}</td>
                        <td class="px-4 py-3 font-medium text-gray-900 flex space-x-2">
                            <form action="{{route('tarea.destroy', $tarea)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Eliminar</button>
                            </form>
                            <a href="{{route('tareas.edit', $tarea)}}" class="text-blue-600">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
