@extends('layouts.facade')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            @if (session('status'))
                <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Opções do usuário
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="/alter-user">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Name') }}:
                        </label>

                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                            name="name" value="{{ $userData->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ $userData->email }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap justify-around">
                        <button type="submit"
                            class="lg:w-1/4 w-full lg:mb-0 mb-5 select-none font-bold p-1 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                            Atualizar informações
                        </button>

                        <button type="button" onclick="document.getElementById('accountRemovalConfimationButton').style.display = 'block'"
                            class="lg:w-1/4 w-full select-none font-bold p-1 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-500 hover:bg-red-700">
                            Remover conta
                        </button>

                        <a href="/password/reset-from-user-options" class="w-full text-xs text-center my-6 sm:text-sm sm:my-8 text-blue-500 hover:text-blue-700 hover:underline">
                            Redefinir senha
                        </a>
                    </div>
                    <a href="/remover-conta"
                    style="display: none; margin-bottom: 5%;"
                    id="accountRemovalConfimationButton"
                    class="w-full font-bold text-center py-3 mb-5 p-1 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-500 hover:bg-red-700">
                        Além da conta, todos os seus registros serão excluidos. Clique aqui para continuar.
                    </a>
                </form>

                
            </section>
        </div>
    </div>
</main>
@endsection
