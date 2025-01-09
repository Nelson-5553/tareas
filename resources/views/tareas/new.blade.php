@extends('app')

@section('content')

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">To-DO</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

      <form class="space-y-6" action="{{route('tarea.store')}}" method="POST">
        @method('post')
        @csrf
        @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <div>
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nombre de tarea</label>
          <div class="mt-2">
            <input id="name" name="name" type="text" value="{{old('name')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('name')
              {{$message}}
            @enderror
          </div>
        </div>
          <div>
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nombre de Categoria</label>
          <div class="mt-2">
          <select id="id_category" name="id_category" class="flex justify-end w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @foreach($category as $categoria)
                  <option value="{{$categoria->id}}">
                      {{$categoria->name}}
                  </option>

              @endforeach
          </select>
            @error('categoria')
              {{$message}}
            @enderror
          </div>
        </div>
        <div>
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Descripcion</label>
          <div class="mt-2">
            <input id="name" name="descripcion" type="text-area" value="{{old('descripcion')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('descripcion')
              {{$message}}
            @enderror
          </div>
        </div>



        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registra la tarea</button>
        </div>
      </form>

    </div>
  </div>
<h2 class="text-center mb-4"></h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto mt-8 w-1/2">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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

            <th scope="col" class="px-4 py-4">
                Categoria
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tareas as $tarea)
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                    {{$tarea->id}}
                </td>

                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                    {{$tarea->name}}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                    {{$tarea->descripcion}}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                    {{ $tarea->Category->name ?? 'Sin categoría' }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                    <form action="{{route('tarea.destroy', $tarea)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>

                    </form>



                </td>

                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                    <a href="{{route('tareas.edit', $tarea)}}">edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection
