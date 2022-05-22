<template>
  <Header></Header>
  <div class="container d-flex justify-content-center">
    <router-view />
  </div>
</template>

<script>
import Header from "@/components/Header.vue";

export default {
  data() {
    return {
      publicPath: process.env.BASE_URL,
    };
  },
  components: {
    Header,
  },

  computed: {
    colorScheme() {
      switch (this.$route.name) {
        case "Idioms":
          return "bg-aquaGreen";
      }
      return "bg-primary";
    },
  },
};
</script>

<style>
#app {
  font-family: Roboto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.bg-aquaGreen {
  background-color: #00d37f;
}
.container{
  max-width: 2500px;
}
</style>
