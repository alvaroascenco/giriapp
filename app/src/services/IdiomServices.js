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
  getAllIdioms(page){
    return apiClient.get(`/idiom/${page}`)
  },
  filterIdioms() {
    return apiClient.get("/idiom");
  },
};
