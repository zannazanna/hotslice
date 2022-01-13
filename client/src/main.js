import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router';
import Home from "@/components/Home";
import Aggiungi from "@/components/Aggiungi";
Vue.use(VueRouter)

const routes = [{
  path:"/home",
  component:Home
},
{
  path:"/Aggiungi",
  component:Aggiungi
},{
  path:"/home/:id",
  component:Aggiungi
}]

const router = new VueRouter({
  mode:"history",
  routes
})

Vue.config.productionTip = false



new Vue({
  render: h => h(App),
  router
}).$mount('#app')
