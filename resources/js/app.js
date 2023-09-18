import { createApp } from "vue";
import Welcome from "./Welcome.vue"
import { createRouter, createWebHistory } from 'vue-router'
import UrlForm from "./components/UrlForm.vue"
import ListUrls from "./components/ListUrls.vue"

const routes = [ 
    { path: '/', component: UrlForm },
    { path: '/list', component: ListUrls },
] 
 
const router = createRouter({ 
    history: createWebHistory(),
    routes
}) 

createApp(Welcome).use(router).mount("#app")