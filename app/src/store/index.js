import { createStore } from "vuex";
import GiriaServices from "@/services/GiriaServices";
import IdiomServices from "../services/IdiomServices";

export default createStore({
  state: {
    girias: [],
    idioms: [],
  },
  mutations: {
    assignGirias(state, payload) {
      console.log(payload)
      if(state.girias.length == 0 || payload.overwrite == true) 
        return state.girias = payload.data
      state.girias = state.girias.concat(payload.data)
    },
    assignIdioms(state, payload){
      console.log(payload)
      if(state.idioms.length == 0 || payload.overwrite == true) 
        return state.idioms = payload.data
      state.idioms = state.idioms.concat(payload.data)
    }
  },
  actions: {
    fetchAllGirias({ commit }, payload){
      GiriaServices.getAllGirias(payload.page).then((response) =>
        commit("assignGirias", {data: response.data, overwrite: payload.overwrite})
      );
    },
    fetchGiriaResults({ commit }, payload) {
      console.log(payload.overwrite)
      GiriaServices.filterGirias(payload.input).then((response) =>
        commit("assignGirias", {data: response.data, overwrite: payload.overwrite})
      );
    },
    fetchAllIdioms({ commit }, payload){
      IdiomServices.getAllIdioms(payload.page).then((response) => 
        commit("assignIdioms", {data: response.data, overwrite: payload.overwrite})
      )
    },
    fetchIdiomResults({ commit }){
      IdiomServices.filterIdioms().then((response) => 
      commit('assignIdioms', response))
    }
  },
  modules: {},
});
