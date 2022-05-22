<template>
  <div class="about">
    <div class="card about--card">
      <div class="card-body">
        <h5 class="card-title">
          <b> SOBRE O PROJETO </b>
        </h5>
        <hr />
        <p>
          O GiriApp é o seu dicionário digital de provérbios populares regionais
          de plataforma intuitiva e simples, que cataloga e significa as
          expressões mais usadas em cada estado do Brasil.
        </p>
        <p>
          <b>Novidade:</b> O GiriApp agora também é bilíngue! Explore nossa nova 
          aba de traduções de expressões idiomáticas em inglês, que traz de forma
          simples e objetiva as equivalências em português de expressões comuns
          da lingua inglesa.
        </p>
      </div>
    </div>
    <div class="card about--card">
      <div class="card-body">
        <h5 class="card-title">
          <b> COMO ENVIAR CONTEÚDO?</b>
        </h5>
        <hr />
        <p>
          Para enviar conteúdo para o GiriApp é muito fácil. Basta acessar
          a nossa <a href="http://localhost:8000">GiriApi</a> e se cadastrar.
          Depois disso, o painel para enviar novas expressões, alterar as que já estão 
          feitas ou excluí-las se tornará acessível para você.
        </p>
      </div>
    </div>
  </div>
</template>
<style scoped>
.about{
  display: flex;
  justify-content: space-around;
}
.about--card{
  width: 45%;
}

@media screen and (max-width: 768px){
  .about{
    display: block;
  }
  .about--card{
    width: 100%;
    margin-bottom: 5%;
  }
}
</style>