@extends('layouts.facade')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full flex justify-center">
      <section class="mb-10 w-full  lg:w-3/4 flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold text-center bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                @if(isset($giriaToEdit)) Editar expressão em inglês
                @else Cadastrar nova expressão em inglês
                @endif
            </header>

            <div class="w-full p-2 md:p-6">
                <form name="formIdiom" action="{{ old('formIdiom', isset($idiomToEdit) ? '/update/idiom/'.$idiomToEdit->id : '/create/idiom/register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="p-2 md:p-10">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
                            Expressão em português
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('expressao_pt', isset($idiomToEdit) ? $idiomToEdit->expressao_pt : '') }}" type="text" rows="4" cols="50" name="expressao_pt" class="rounded-lg text-center leading-6" placeholder="Expressão em português">
                        <label class="block text-gray-700 text-sm font-bold my-2" for="nome">
                            Expressão em inglês
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('expressao_en', isset($idiomToEdit) ? $idiomToEdit->expressao_en : '') }}" type="text" rows="4" cols="50" name="expressao_en" class="rounded-lg text-center leading-6" placeholder="Expressão em inglês">
                    </div>
                    <div class="flex justify-around">
                            <input type="submit" style="background-color: #00d37f; cursor: pointer;" value="Enviar" class="text-white font-bold py-2 px-4 mt-3 rounded" />
                            @if (isset($idiomToEdit))
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 mt-3 rounded focus:outline-none focus:shadow-outline" type="button">
                                    <a href="{{'/delete/idiom/'.$idiomToEdit->id}}">
                                        Excluir
                                    </a>
                                </button>
                            @endif
                    </div>
                    @if ($errors->any())
                        <div class="bg-red-500 text-white text-center mt-3 py-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="my-3">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </section>
    </div>
</main>
@endsection
