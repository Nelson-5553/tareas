@extends('app')

@section('content')



    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">To-DO</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <form class="space-y-6" action="{{route('categoria.update', $categoria)}}" method="POST">
                @method('put')
                @csrf
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div>
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nombre de Categoria</label>
                    <div class="mt-2">
                        <input id="categoria" name="name" type="text" value="{{old('name',$categoria->name)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('name')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Color</label>
                    <div class="mt-2">
                        <input id="color" name="color" type="color" value="{{old('color',$categoria->color)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('color')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Actualizar la categoria</button>
                </div>
            </form>


            <br><br>

        </div>

    </div>

@endsection
