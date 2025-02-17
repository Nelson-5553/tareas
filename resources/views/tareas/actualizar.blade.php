@extends('app')

@section('content')

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

    <div class="flex justify-center text-blue-500">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-36">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
      </svg>
    </div>
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Actualizar la tarea</h2>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

      <form class="space-y-6" action="{{route('tarea.update', $tarea)}}" method="POST">
        @csrf
        @method('put')
        <div>
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nombre de la tarea</label>
          <div class="mt-2">
            <input id="name" name="name" type="text" value="{{old('name',$tarea->name)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('name')
            {{$message}}
          @enderror
        </div>
            <div>
                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nombre de Categoria</label>
                <div class="mt-2">
                    <select id="id_category" name="id_category" class="flex justify-end w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @foreach($category as $categoria)
                            <option value="{{ $categoria->id }}" {{ $categoria->id == $tarea->id_category ? 'selected' : '' }}>
                                {{ $categoria->name }}
                            </option>

                        @endforeach
                    </select>
                    @error('id_category')
                    {{$message}}
                    @enderror
                </div>
        </div>
        <div>
            <label for="" class="block text-sm font-medium leading-6 text-gray-900">Descripcion</label>
            <div class="mt-2">
              <input id="name" name="descripcion" type="text" value="{{old('descripcion',$tarea->descripcion)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('descripcion')
                {{$message}}
              @enderror
            </div>
          </div>
          <br>
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Actualizar tarea</button>
        </div>
      </form>

    </div>
  </div>


@endsection
