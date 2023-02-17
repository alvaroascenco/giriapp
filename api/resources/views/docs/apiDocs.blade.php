@extends('layouts.facade')

@section('content')
<section class="flex justify-center">
    <div class="w-3/4">
        <div class="my-5">
            <span class="text-5xl font-bold text-blue-600">Pesquisar gírias por termo</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/giriasSearch/{termo: string}
                </code>
            </div>
            <p>
               Retornará os dados completos de resultados que começam com
                <code class="bg-gray-200">termo</code> bem como seus dados
            </p>
        </div>
        <div class="my-5">
            <span class="text-5xl font-bold text-blue-600">Resultados por paginação</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/girias/{pagina: int}
                </code>
            </div>
            <p>
               Retornará os dados completos de resultados paginados em múltiplos de 18
               (ou seja, os resultados serão 18, começando do registro 18*<code>pagina</code>)
            </p>
        </div>
        <div class="my-5">
            <span class="text-5xl font-bold text-blue-600">Gíria por ID</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/giria/{id: int}
                </code>
            </div>
            <p>
               Retornará os dados completos da gíria identificada por <code>id</code>
               no banco de dados
            </p>
        </div>
        <div class="my-5">
            <span class="text-5xl font-bold text-blue-600" style="color: #55E67C">Expressões em inglês paginadas</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/idiom/{page: int}
                </code>
            </div>
            <p>
               Retornará os dados completos de resultados paginados em múltiplos de 18
               (ou seja, os resultados serão 18, começando do registro 18*<code>pagina</code>)
            </p>
        </div>
        <div class="my-5">
            <span class="text-5xl font-bold text-blue-600" style="color: #55E67C">Pesquisar expressões em inglês por termo</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/idiomSearch/{termo: string}
                </code>
            </div>
            <p>
               Retornará os dados completos de resultados que começam com
                <code class="bg-gray-200">termo</code> bem como seus dados
            </p>
        </div>
    </div>
</section>
@endsection
