import { createStore } from "vuex";
import GiriaServices from "@/services/GiriaServices";
import IdiomServices from "../services/IdiomServices";

export default createStore({
  state: {
    girias: [],
    isFinishedGirias: false,
    idioms: [],
    isFinishedIdioms: false,
  },
    getters: {
	giriasGetter: state => state.girias,
	isFinishedGiriasGetter: state => state.isFinishedGirias
    },
  mutations: {
    assignGirias(state, payload) {
      console.log(payload)
      state.isFinishedGirias = payload.isFinishedGirias
      if(state.girias.length == 0 || payload.overwrite == true) 
        return state.girias = payload.data
      state.girias = state.girias.concat(payload.data)
    },
    assignIdioms(state, payload){
	console.log(state)
	console.log(payload)
      console.log(payload)
      state.isFinishedIdioms = payload.data.isFinishedIdioms
      if(state.idioms.length == 0 || payload.overwrite == true) 
        return state.idioms = payload.data.idioms
      state.idioms = state.idioms.concat(payload.data.idioms)
    },
    clearGirias(state){
      return state.girias = []
    },
    clearIdioms(state){
      return state.idioms = []
    }
  },
  actions: {
    clearStoreState({ commit }, payload){
      if(payload.objToClear == 'idioms'){
        commit("clearGirias")
      } else {
        commit("clearIdioms")
      }
    },
    fetchAllGirias({ commit }, payload){
      GiriaServices.getAllGirias(payload.page).then((response) =>
        commit("assignGirias", {data: response.data.girias, overwrite: payload.overwrite, isFinishedGirias: response.data.isFinishedGirias})
      );
    },
    fetchGiriaResults({ commit }, payload) {
      console.log(payload.overwrite)
      GiriaServices.filterGirias(payload.input).then((response) =>
        commit("assignGirias", {data: response.data.girias, overwrite: payload.overwrite, isFinishedGirias: response.data.isFinishedGirias})
      );
    },
    fetchAllIdioms({ commit }, payload){
      IdiomServices.getAllIdioms(payload.page).then((response) => 
        commit("assignIdioms", {data: response.data, overwrite: payload.overwrite})
      )
    },
    fetchIdiomResults({ commit }, payload){
      IdiomServices.filterIdioms(payload.input).then((response) => 
      commit('assignIdioms', {data: response.data, overwrite: payload.overwrite}))
    }
  },
  modules: {},
});
