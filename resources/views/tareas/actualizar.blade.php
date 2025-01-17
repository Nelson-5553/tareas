@extends('app')

@section('content')

<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">To-DO</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

      <form class="space-y-6" action="{{route('tarea.update', $tarea)}}" method="POST">
        @csrf
        @method('put')
        <div>
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">actualizar tarea la tarea</label>
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
              <input id="name" name="descripcion" type="text-area" value="{{old('descripcion',$tarea->descripcion)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('descripcion')
                {{$message}}
              @enderror
            </div>
          </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Actualizar tarea</button>
        </div>
      </form>

    </div>
  </div>


@endsection
