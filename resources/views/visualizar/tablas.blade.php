@extends('app')

@section('content')

<h2 class="text-center mb-4"></h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto mt-8 w-1/2">
    @if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        {{ session('success') }}
    </div>
@endif
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-4">
                    Id
                </th>
                <th scope="col" class="px-4 py-4">
                    Nombre de tareas
                </th>
                <th scope="col" class="px-4 py-4">
                    Descripcion
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$tarea->id}}
                </td>
          
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$tarea->name}}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$tarea->descripcion}}
                </td>

                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <form action="{{route('tarea.destroy', $tarea)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                        
                    </form>
                    
                    
                    
                </td>
                
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <a href="{{route('tareas.edit', $tarea)}}">edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection
