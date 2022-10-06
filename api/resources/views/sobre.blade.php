@extends('layouts.facade')

@section('content')
<section class="flex justify-center">
         <div class='w-3/4'>
            <span class='text-center'>
               <h1 class='text-6xl font-bold text-blue-500 mb-10'>Sobre o projeto</h1>
            </span>
            <div class="flex flex-col md:flex-row">
               <div class='mr-5 w-full md:w-1/2 mb-3 md:m-0'>
                  <h3 class='text-xl mb-5'>
                     Contribuidores
                  </h3>
                  <ul class='leading-6 list-disc mb-5'>
                    <li> Alvaro Coslovsky (<a href='https://github.com/discollizard' target='_blank' rel='noopener norefferer' class='text-blue-500 hover:underline'>discollizard</a>) - Idealização, desenvolvimento fullstack e gerência do projeto</li>
                    <li> <a href='https://github.com/gabriel-baltazar' rel='noopener norefferer' target='_blank' class='text-blue-500 hover:underline'>Gabriel Baltazar</a> - Desenvovimento back-end </li>
                    <li> Mickelly Coslovsky - Design de elementos visuais</li>
                  </ul>
                  <span class="text-blue-500 hover:underline"><a target='_blank' rel='noopener norefferer' href="https://github.com/discollizard/giriapp">Gostaria de contribuir?</a></span>
               </div>
               <div class="border-t-2 md:border-l-2 md:h-56 h-0 w-56 md:w-0 border-slate-500"></div>
               <div class='mr-5 w-full md:w-1/2 mt-3 md:mt-0 md:pl-5'>
                  <h3 class='text-xl mb-5'>
                     Contato
                  </h3>
                  <span>giriapi@tutanota.com</span>
               </div>
            </div>
         </div>
</section>
@endsection
