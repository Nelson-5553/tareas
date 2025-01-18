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
                <a href="{{route('tareas.edit', $tarea)}}" class="text-blue-600 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></g></svg></a>
                <form action="{{route('tarea.destroy', $tarea)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">  <x-delete-buttom/></button>
                </form>
            </div>
        </div>
</div>


@endsection
