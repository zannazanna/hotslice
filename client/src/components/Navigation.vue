<template>
<div class="flex flex-row items-center p-5 bg-blue-200">
    <div class="flex-row flex">
    <span class="justify-center text-indigo-500 font-bold text-2xl"> Hot</span>
        <span class="justify-center text-white text-white text-2xl"> Pizza</span>
    </div>

    <div class="flex flex-row mx-auto">
    <button type="button" class="ustify-center px-3 py-3 text-blue-900 hover:text-blue-500" @click="goto('/home')" >Pizze</button>
    <button type="button" class="ustify-center px-3 py-3 text-blue-900 hover:text-blue-500"  @click="goto('aggiungi')">Aggiungi</button>


    </div>
</div>
</template>

<script>
export default {
    data(){
        return{

        }
    },
    methods: {
        goto(link){
            this.$router.push(link)
        }
    },

}
</script>