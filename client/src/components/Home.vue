<template>
<div class="flex">
<div class="grid grid-cols-4 gap-4">
<div class="flex flex-row border border-2 border-neutral-300 m-5" :key="index" v-for="(piz, index) in pizza">
<div class="flex flex-col w-52	h-52 p-5 justify-center items-center" >
<img :src="piz.foto" alt="immagine pizza">
</div>

<div class="flex flex-col justify-center p-5 ">
<p class="text-l font-bold"> {{piz.name}}</p>
<p class="text-l font-bold"> {{piz.prezzo}} €</p>
<p> {{piz.descrizione}}</p>
<button @click="modifica(piz)" class="bg-blue-900  hover:bg-blue-500 text-white  px-4 py-2 rounded cursor-pointer" >Modifica</button>
</div>
</div>
</div>
</div>
</template>

<script>
import axios from "axios"
export default {
    data(){
        return{
            pizza:[]
        }
    },
    async mounted() {
        let response = await axios.get("http://127.0.0.1:8000/api/pizza");
        this.pizza = response.data;
        console.log(this.pizza)
    },
    methods:{
         modifica(pizza){
             this.$router.push("/home/"+pizza.id)
        }
    }
    }


</script>