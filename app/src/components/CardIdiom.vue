<template>
  <div class="col-12 mb-5">
    <div :class="`card p-0 ${$root.colorScheme}`">
      <div class="card-body d-flex justify-content-center">
        <div class="card--text left" :id="`en${index}`">{{idiom.expressao_en}}</div>
        <div class="imgDiv">
          <img
            :src="`${$root.publicPath}doubleArrow.svg`"
            id="arrow"
            alt="É equivalente a"
            width="70"
            height="70"
          />
        </div>
        <div class="card--text" :id="`pt${index}`">{{idiom.expressao_pt}}</div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "CardIdiom",
  props: {
    idiom: Object,
    index: Number,
    shouldResize: Boolean
  },
  data(){
    return {
      isResized: false
    }
  },
  mounted() {
    if(!this.isResized){
      this.resizeFonts()
    }
  },
  methods: {
    resizeFonts(){
      let en = document.getElementById(`en${this.index}`)
      let pt = document.getElementById(`pt${this.index}`)
      if(en.clientHeight >= en.scrollHeight && pt.clientHeight >= pt.scrollHeight) return 
      let enFontsize = window.getComputedStyle(document.getElementById(`en${this.index}`)).fontSize
      let ptFontsize = window.getComputedStyle(document.getElementById(`pt${this.index}`)).fontSize
      enFontsize = enFontsize.slice(0, -2)
      ptFontsize = ptFontsize.slice(0, -2)
      while(en.clientHeight < en.scrollHeight){
        enFontsize = enFontsize - 2
        document.getElementById(`en${this.index}`).style.fontSize = `${enFontsize}px`
      }
      while(pt.clientHeight < pt.scrollHeight){
        ptFontsize = ptFontsize - 2
        document.getElementById(`pt${this.index}`).style.fontSize = `${ptFontsize}px`
      }
      this.isResized = true
    }
  },
  watch: {
    shouldResize(){
      console.log('aa')
      this.resizeFonts()
    }
  }
};
</script>
<style scoped>
.card--text {
  width: 33%;
  overflow-wrap: anywhere;
  color: white;
  text-align: center;
  font-weight: bold;
  display: flex !important;
  justify-content: center;
  align-items: center;
  font-size: 50px;
}

.left {
  padding-right: 4%;
}

.card-body {
  height: 35vh;
}

.imgDiv{
  padding: 0 5%;
  display: flex;
  align-items: center;
}
</style>
