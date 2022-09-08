@extends('layouts.facade')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Opções do usuário
                </header>
                 {{$userData}}

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
                            class="w-1/4 select-none font-bold p-1 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                            Atualizar informações
                        </button>

                        <button onclick="document.querySelector('#accountRemovalConfimationButton').css.display = 'block'"
                            class="w-1/4 select-none font-bold p-1 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-500 hover:bg-red-700">
                            Remover conta
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            Redefinir senha
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </p>
                    </div>
                    <a href="/remover-conta"
                    style="display: none;"
                    class="w-full select-none font-bold p-1 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-500 hover:bg-red-700">
                        Confirmar remoção de conta
                    </a>
                </form>

                
            </section>
        </div>
    </div>
</main>
@endsection
