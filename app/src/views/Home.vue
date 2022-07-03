<template>
  <div class="home w-100">
    <div class="row d-flex justify-content-center" ref="scrollComponentHome">
      <div
        class="col-lg-4 col-md-6"
        v-for="(giria, index) in $store.state.girias"
        :key="index"
      >
        <CardGiria :giria="giria" />
      </div>
    </div>
    <div v-if="!$store.state.isFinishedGirias" class="d-flex justify-content-center mb-5">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only"></span>
      </div>
    </div>
    <div class="mb-5" v-else>
      <hr>
    </div>
  </div>
</template>

<script>
import CardGiria from "@/components/CardGiria.vue"
import infScroll from "@/helpers/infScroll.js"
import { mapGetters } from 'vuex'

export default {
  name: "Home",

  components: {
    CardGiria,
  },

  data(){
    return {
      page: 0,
      defaultDispatchFunction: "fetchAllGirias",
      objectType: 'girias',
      defaultFinishedFlagInStore: "isFinishedGirias"
    }
  },
  computed: {
      ...mapGetters({
	  storeGiriasDone: 'isFinishedGiriasGetter'
      })
  },
  watch: {
      storeGiriasDone (newValue){
	  if(newValue == true) this.page = 1
      },
    $route(){
	console.log("saiu")
	window.removeEventListener('scroll', this.callableHandleScroll)
    }
  },
  created() {
    infScroll.verMais(this)
    console.log(this.$store.state)
  },
  mounted(){
    window.addEventListener('scroll', this.callableHandleScroll)
  },

  methods: {
      // js apis are weird man
      callableHandleScroll(){
	  infScroll.handleScroll(this)
      }
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
  },
};
</script>
