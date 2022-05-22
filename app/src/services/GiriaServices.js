import axios from "axios";

const apiClient = axios.create({
  //MUDAR NO DEPLOY!!!!!!!
  baseURL: "http://localhost:8000/api",
  withCredentials: false,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

export default {
  filterGirias(str) {
    return apiClient.get(`/giriasSearch/${str}`);
  },

  getAllGirias(page){
    return apiClient.get(`/girias/${page}`)
  },

  getGiria(id) {
    return apiClient.get("/giria/" + id);
  },
};
