@extends('app')

@section('content')

<div class="flex justify-center p-4">
<div class="flex items-center max-w-4xl h-screen ">
        <div class="w-screen h-2/3 bg-white rounded-lg border-2 border-black shadow-lg p-5 flex flex-col justify-between">
            <!-- Header -->
            <div class="flex items-center space-x-2">
                <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{ $tarea->Category->color ?? '#ccc' }};"></span>
                <h1 class="font-bold text-lg">{{$tarea->name}}</h1>
            </div>

            <!-- Description -->
                <p class="flex-1 mt-4 overflow-y-auto text-sm text-gray-700 break-words">
                    {{$tarea->descripcion}}
                    </p>

            <!-- Footer (Buttons) -->
            <div class="flex justify-end space-x-4 mt-2">
                <a href="{{route('tareas.edit', $tarea)}}"><x-update-button/></a>
                <form action="{{route('tarea.destroy', $tarea)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-delete-modal id="popup-modal-{{ $tarea->id }}" description="¿Estas seguro de querer borrar esta tarea?"/>
                </form>
            </div>
        </div>
</div>


@endsection
