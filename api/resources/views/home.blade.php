@extends('layouts.facade')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold text-center bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Seja bem-vindo {{ Auth::user()->name }}!
            </header>

            <div class="w-full p-6">
                @if(isset($giriasDesseUsuario) && count($giriasDesseUsuario) > 0)
                    <div class="grid grid-cols-3 gap-2">
                            @foreach ($giriasDesseUsuario as $giriaDesseUsuario)
                                <div class="flex flex-col">
                                    <x-giria-card :giria="$giriaDesseUsuario" />
                                </div>
                            @endforeach
                    </div>
                @elseif(isset($idiomsDesseUsuario) && count($idiomsDesseUsuario) > 0)
                    <div class="grid grid-cols-3 gap-2">
                            @foreach ($idiomsDesseUsuario as $idiom)
                                <div class="flex flex-col">
                                    {{$idiom->id}}
                                </div>
                            @endforeach
                    </div>
                @else
                    <div class='text-center'>
                        Você ainda não cadastrou nenhuma gíria!
                    </div>
                @endif
            </div>
        </section>
    </div>
</main>
@endsection
