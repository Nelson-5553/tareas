@extends('app')

@section('content')

    <div class="flex justify-center p-4">
        <div class="flex items-center max-w-4xl h-screen">
            <div class="w-screen h-2/3 bg-white rounded-lg border-2 border-black shadow-lg p-5 flex flex-col justify-between">
                <!-- Header -->
                <div class="flex items-center space-x-2">
                    <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{ $categoria->color ?? '#ccc' }};"></span>
                    <h1 class="font-bold text-lg">{{ $categoria->name }}</h1>
                </div>

                <!-- Description -->
                <p class="font-semibold text-gray-700">Tareas Relacionadas</p>
                <ul class="list-disc pl-6 text-gray-600">
                    @forelse($categoria->tareas as $tarea)
                        <li class="mb-1">{{ $tarea->name }}</li>
                    @empty
                        <li class="text-red-500 italic">No hay tareas relacionadas con esta categoría.</li>
                    @endforelse
                </ul>

                <!-- Footer (Buttons) -->
                <div class="flex justify-end space-x-4 mt-4">
                    <a href="{{ route('categoria.edit', $categoria) }}" class="text-blue-600 hover:underline">
                        <x-update-button/>
                    </a>
                    <form action="{{ route('categoria.destroy', $categoria) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">
                           <x-delete-buttom/>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
