@extends('layouts.facade')

@section('content')
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<section class="flex justify-center">
    <div class="w-3/4">
        <div class="my-5">
            <span class="lg:text-5xl font-bold text-blue-600 text-3xl">Pesquisar gírias por termo</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/giriasSearch/{termo: string}
                </code>
            </div>
            <p>
               Retornará os dados completos de resultados que começam com
                <code class="bg-gray-200">termo</code> bem como seus dados
            </p>
            <div>
                <div class="my-5 font-bold text-lg">Corpo da resposta:</div>
                <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                    <pre class="prettyprint">
    <xmp class="whitespace-pre-wrap" style="font-size: 1rem; overflow: auto;">
    {
        "girias": [
            {
                "id": 1,

                "criadoPor": 1,

                "nome": "Quisquam explicabo suscipit minus aliquam et earum totam.",

                "local": [
                    "autem",
                    "nam"
                ],

                "significados": [
                    "Fugit odio omnis sapiente assumenda tempore.;",
                    "Et in error consequatur.;",
                    "Qui veniam possimus quasi aliquid.;",
                    "Voluptatem blanditiis reprehenderit eius fugiat nobis aspernatur.;",
                    "Earum consequuntur veritatis iusto sed ullam et.;"
                ],

                "etimologia": "Dormouse shook its head impatiently, and walked two and two, as the soldiers did.
                 After these came the royal children; there were TWO little shrieks, and more sounds of
                 broken glass. 'What a funny.",

                "imagem": "https:\/\/upload.wikimedia.org\/wikipedia\/commons\/thumb\/1\/14\/Landscape_Arnisee-region.
                JPG\/1200px-Landscape_Arnisee-region.JPG",

                "videoId": "ikNsOFE8AP4",

                "created_at": "2023-02-02T07:58:37.000000Z",

                "updated_at": "2023-02-02T07:58:37.000000Z"
            },
            ...
        ],

        "isFinishedGirias": true
    }
    </xmp>
                    </pre>
                </div>
            </div>

        </div>
        <div class="my-5">
            <span class="lg:text-5xl font-bold text-blue-600 text-3xl">Resultados por paginação</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/girias/{pagina: int}
                </code>
            </div>
            <p>
               Retornará os dados completos de resultados paginados em múltiplos de 18
               (ou seja, os resultados serão 18, começando do registro 18*<code>pagina</code>)
            </p>
            <div>
                <div class="my-5 font-bold text-lg">Corpo da resposta:</div>
                <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                    <pre class="prettyprint">
    <xmp class="whitespace-pre-wrap" style="font-size: 1rem; overflow: auto;">
    {
        "girias": [
            {
                "id": 1,

                "criadoPor": 1,

                "nome": "Quisquam explicabo suscipit minus aliquam et earum totam.",

                "local": [
                    "autem",
                    "nam"
                ],

                "significados": [
                    "Fugit odio omnis sapiente assumenda tempore.;",
                    "Et in error consequatur.;",
                    "Qui veniam possimus quasi aliquid.;",
                    "Voluptatem blanditiis reprehenderit eius fugiat nobis aspernatur.;",
                    "Earum consequuntur veritatis iusto sed ullam et.;"
                ],

                "etimologia": "Dormouse shook its head impatiently, and walked two and two, as the soldiers did.
                 After these came the royal children; there were TWO little shrieks, and more sounds of
                 broken glass. 'What a funny.",

                "imagem": "https:\/\/upload.wikimedia.org\/wikipedia\/commons\/thumb\/1\/14\/Landscape_Arnisee-region.
                JPG\/1200px-Landscape_Arnisee-region.JPG",

                "videoId": "ikNsOFE8AP4",

                "created_at": "2023-02-02T07:58:37.000000Z",

                "updated_at": "2023-02-02T07:58:37.000000Z"
            },
            ...
        ],

        "isFinishedGirias": true
    }
</xmp>
                    </pre>
                </div>
            </div>
        </div>
        <div class="my-5">
            <span class="lg:text-5xl font-bold text-blue-600 text-3xl">Gíria por ID</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/giria/{id: int}
                </code>
            </div>
            <p>
               Retornará os dados completos da gíria identificada por <code>id</code>
               no banco de dados
            </p>
            <div>
                <div class="my-5 font-bold text-lg">Corpo da resposta:</div>
                <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                    <pre class="prettyprint">
    <xmp class="whitespace-pre-wrap" style="font-size: 1rem; overflow: auto;">
    {
        "id": 1,

        "criadoPor": 1,

        "nome": "Quisquam explicabo suscipit minus aliquam et earum totam.",

        "local": [
            "autem",
            "nam"
        ],

        "significados": [
            "Fugit odio omnis sapiente assumenda tempore.;",
            "Et in error consequatur.;",
            "Qui veniam possimus quasi aliquid.;",
            "Voluptatem blanditiis reprehenderit eius fugiat nobis aspernatur.;",
            "Earum consequuntur veritatis iusto sed ullam et.;"
        ],

        "etimologia": "Dormouse shook its head impatiently, and walked two and two, as the soldiers did.
         After these came the royal children; there were TWO little shrieks, and more sounds of
         broken glass. 'What a funny.",

        "imagem": "https:\/\/upload.wikimedia.org\/wikipedia\/commons\/thumb\/1\/14\/Landscape_Arnisee-region.
        JPG\/1200px-Landscape_Arnisee-region.JPG",

        "videoId": "ikNsOFE8AP4",

        "created_at": "2023-02-02T07:58:37.000000Z",

        "updated_at": "2023-02-02T07:58:37.000000Z"
    }
    </xmp>
                    </pre>
                </div>
            </div>
        </div>
        <div class="my-5">
            <span class="lg:text-5xl font-bold text-blue-600 text-3xl" style="color: #55E67C">Expressões em inglês paginadas</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/idiom/{page: int}
                </code>
            </div>
            <p>
               Retornará os dados completos de resultados paginados em múltiplos de 18
               (ou seja, os resultados serão 18, começando do registro 18*<code>pagina</code>)
            </p>
            <div>
                <div class="my-5 font-bold text-lg">Corpo da resposta:</div>
                <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                    <pre class="prettyprint">
    <xmp class="whitespace-pre-wrap" style="font-size: 1rem; overflow: auto;">
    {
        "idioms": [
            {
                "expressao_pt": "Fuga doloremque voluptatum eum in. Asperiores ex qui dolores.",
                "expressao_en": "Blanditiis voluptas est quaerat a. Iste ab sit qui optio."
            },
            ...
        ],
        isFinishedIdioms: false
    }
    </xmp>
                    </pre>
                </div>
            </div>
        </div>
        <div class="my-5">
            <span class="lg:text-5xl font-bold text-blue-600 text-3xl" style="color: #55E67C">Pesquisar expressões em inglês por termo</span>
            <div class="my-5 bg-gray-200 py-5 px-3 w-full">
                <code class=" w-full">
                    /api/idiomSearch/{termo: string}
                </code>
            </div>
            <p>
               Retornará os dados completos de resultados que começam com
                <code class="bg-gray-200">termo</code> bem como seus dados
            </p>
            <div>
                <div class="my-5 font-bold text-lg">Corpo da resposta:</div>
                <div class="my-5 bg-gray-200 py-5 px-3 w-full pt-2 whitespace-pre-wrap">
                    <pre class="prettyprint truncate whitespace-pre-wrap" style="whitespace: pre-wrap !important;">
    <xmp class="whitespace-pre-wrap" style="font-size: 1rem; overflow: auto;">
    {
        "idioms": [
            {
                "expressao_pt": "Fuga doloremque voluptatum eum in. Asperiores ex qui dolores.",
                "expressao_en": "Blanditiis voluptas est quaerat a. Iste ab sit qui optio."
            },
            ...
        ],
        isFinishedIdioms: false
    }
    </xmp>
                    </pre>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
