<template>
<div class="flex flex-col">
    <div class="flex flex-row m-5 ">
            <label for="name" class="w-36">Nome:</label>
            <input id="name" v-model="pizza.name" class=" border w-1/4">
            <span v-if="pizza.name == ''" class="text-red-300 mx-5 text-l"> *</span>

    </div>

    <div class="flex flex-row m-5 ">
        <label for="foto" class="w-36">foto:</label>
        <input id="foto" v-model="pizza.foto" class=" border w-1/4">
        <span v-if="pizza.foto == ''" class="text-red-300 mx-5 text-l"> *</span>

    </div>


    <div class="flex flex-row m-5 ">
        <label for="prezzo" class="w-36">prezzp:</label>
        <input id="prezzo" v-model="pizza.prezzo" class=" border w-1/4">
        <span v-if="pizza.prezzo== '' || pizza.prezzo < 0 " class="text-red-300 mx-5 text-l"> *</span>

    </div>

    <div class="flex flex-row m-5 ">
        <label for="impasto" class="w-36">Nome:</label>
        <select class=" border w-1/4" v-model="pizza.impasto">
            <option value="napoletano"> napoletano</option>
            <option value="italiano"> italiano</option>
            <option value="cinese"> cinese</option>

        </select>

    </div>

      <div class="flex flex-row m-5 ">
        <label for="allergeni" class="w-36">allergeni:</label>
        <input id="allergeni" v-model="pizza.allergeni" class=" border w-1/4">
        <span v-if="pizza.allergeni== ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

    <div class="flex flex-row m-5 ">
        <label for="desrizione" class="w-36">descrizione:</label>
        <input id="desrizione" v-model="pizza.descrizione" class=" border w-1/4">
        <span v-if="pizza.descrizione== ''" class="text-red-300 mx-5 text-l"> *</span>
    </div>

<div v-if="modify == true">
    <div class="flex flex-row justify-center items-center">
        <button  @click="conferma2()"
         :disabled=!isFormValid
         :class="{
             'bg-blue-900  hover:bg-blue-500 text-white  px-4 py-2 rounded cursor-pointer':isFormValid,
             'bg-blue-900  hover:bg-blue-800 text-white  px-4 py-2 rounded cursor-not-allowed':!isFormValid
        }">Conferma</button>
    </div>
</div>
<div v-if="modify == false">

    <div class="flex flex-row justify-center items-center">
        <button  @click="conferma()"
         :disabled=!isFormValid
         :class="{
             'bg-blue-900  hover:bg-blue-500 text-white  px-4 py-2 rounded cursor-pointer':isFormValid,
             'bg-blue-900  hover:bg-blue-800 text-white  px-4 py-2 rounded cursor-not-allowed':!isFormValid
        }">Conferma</button>
    </div>
    </div>
</div>
</template>

<script>
import axios from "axios"
export default {
    data(){
        return{
            pizza:{
                name:"",
                foto:"",
                prezzo:0,
                impasto:"",
                allergeni:"",
                descrizione:""
            },
            modify:false,
        }
    },
    methods:{
        async conferma(){
            await axios.post("http://127.0.0.1:8000/api/create",this.pizza);
            alert("la pizza è stata creata");
            this.$router.push("/home");
        },
        async conferma2(){
            await axios.post("http://127.0.0.1:8000/api/modify/"+ this.pizza.id,this.pizza);
            alert("la pizza è stata creata");
            this.$router.push("/home");
        }
    },
    async mounted(){
        let id = this.$route.params.id;
        if(id != undefined){
            let response = await axios.get("http://127.0.0.1:8000/api/pizza/" + id);
            this.pizza = response.data;
            this.modify = true;
        }
            },
    computed:{
        isFormValid(){
            let valid = false;
            if(this.pizza.name != "" && this.pizza.prezzo != ""){
                            valid = true

            }
                return valid;
        }
    }
    
}
</script>