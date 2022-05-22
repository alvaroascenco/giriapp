<template>
  <div class="home w-100">
    <div class="row w-90 d-flex justify-content-center">
      <div
        class="col-xxl-3 col-lg-4 col-md-6 col-xs-12"
        v-for="(idiom, index) in $store.state.idioms"
        :key="index"
      >
        <CardIdiom
          :idiom="idiom"
          :index="index"
        />
      </div>
    </div>
    <div class="row d-flex mb-5 justify-content-center">
      <div class="col-lg-4">
        <button :class="'btn btn-primary w-100 ' + hideButton" @click="verMais">
          Ver mais
        </button>
      </div>
    </div>
  </div>
</template>
<script>
import CardIdiom from "@/components/CardIdiom.vue";

export default {
  name: "Idioms",
  components: {
    CardIdiom,
  },

  data() {
    return {
      showIndex: 12,
      hideButton: "",
    };
  },

  created() {
    this.$store.dispatch("fetchIdiomResults");
    this.hideButton =
      this.$store.state.idioms.length <= 9 ? (this.hideButton = "d-none") : "";
  },

  methods: {
    verMais() {
      console.log(this.$store.state.idioms.length);
      this.showIndex = this.showIndex + 9;
      if (this.showIndex > this.$store.state.idioms.length) {
        this.hideButton = "d-none";
      }
    },
  },
};
</script>
