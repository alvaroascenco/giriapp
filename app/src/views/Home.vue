<template>
  <div class="home w-100">
    <div class="row d-flex justify-content-center" ref="scrollComponent">
      <div
        class="col-lg-4 col-md-6"
        v-for="(giria, index) in $store.state.girias"
        :key="index"
      >
        <CardGiria :giria="giria" />
      </div>
    </div>
  </div>
</template>

<script>
import CardGiria from "@/components/CardGiria.vue"

export default {
  name: "Home",

  components: {
    CardGiria,
  },

  data(){
    return {
      page: 0
    }
  },

  created() {
    this.verMais()
    console.log(this.$store.state)
  },

  mounted(){
    window.addEventListener('scroll', this.handleScroll)
  },

  unmounted(){
    window.addEventListener('scroll', this.handleScroll)
  },

  methods: {
    verMais() {
      this.$store.dispatch("fetchAllGirias", {page: this.page, overwrite: false});
      this.page++
      this.girias = this.$store.state.girias
    },
    async handleScroll(){
      if(this.$refs.scrollComponent.getBoundingClientRect().bottom < window.innerHeight*1.01){
        await this.verMais()
      }
    }
  },
};
</script>
