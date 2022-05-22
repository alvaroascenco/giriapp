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
import infScroll from "@/helpers/infScroll.js"

export default {
  name: "Home",

  components: {
    CardGiria,
  },

  data(){
    return {
      page: 0,
      defaultDispatchFunction: "fetchAllGirias",
      objectType: 'girias'
    }
  },

  created() {
    infScroll.verMais(this)
    console.log(this.$store.state)
  },

  mounted(){
    window.addEventListener('scroll', () => infScroll.handleScroll(this))
  },

  unmounted(){
    window.addEventListener('scroll', () => infScroll.handleScroll(this))
  },

  // methods: {
    // verMais() {
      // this.$store.dispatch("fetchAllGirias", {page: this.page, overwrite: false});
      // this.page++
      // this.girias = this.$store.state.girias
    // },
    // async handleScroll(){
      // if(this.$refs.scrollComponent.getBoundingClientRect().bottom < window.innerHeight*1.01){
        // await this.verMais()
      // }
    // }
  // },
};
</script>
