@extends('app')

@section('content')



<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">To-DO</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

      <form class="space-y-6" action="{{route('store.categorias')}}" method="POST">
        @method('post')
        @csrf
        @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <div>
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nombre de Categoria</label>
          <div class="mt-2">
            <input id="categoria" name="name" type="text" value="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

          </div>
        </div>
        <div>
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Color</label>
          <div class="mt-2">
            <input id="color" name="color" type="color" value="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

          </div>
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registra la tarea</button>
        </div>
      </form>


  <br><br>

    </div>

    <div class="max-w-6xl overflow-x-auto mx-auto">
        <div class="flex flex-col justify-center items-center min-h-screen">
            <table class="text-sm text-left w-96 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $categoria)
                    <tr class="bg-white dark:bg-gray-800">
                        <!-- Columna Categoria -->
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$categoria->name}}
                        </td>
                        <!-- Columna Color -->
                        <td class="px-6 py-4">
                            <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{$categoria->color}};"></span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('categoria.edit', $categoria) }}">Actualizar</a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{route('categoria.destroy' ,$categoria)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>

@endsection
