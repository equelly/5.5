<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="farm-control" v-model="name" id="name" placeholder="название">
        </div>
        <div class="mb-3">
            <input type="text" class="farm-control" v-model="carb" id="carb" placeholder="углеводы">
        </div>
        <div class="mb-3">
            <input type="text" class="farm-control" v-model="prot" id="prot" placeholder="белки">
        </div>
        <div class="mb-3">
            <input type="text" class="farm-control" v-model="fat" id="fat" placeholder="жиры">
        </div>
        <div class="mb-3">
            <input type="text" class="farm-control" v-model="G" id="G" placeholder="гликемический индекс">
        </div>
        
        <div class="mb-3">
            <input type= "button" @click.prevent="addProduct" class="btn btn-primary" value="добавить">
        </div>
        
    </div>
</template>

<script>
    export default {
        name:'ProductComponent',
        data(){
            return{
            name: null,
            carb: null,
            prot: null,
            fat: null,
            G: null
        }
        },
        mounted(){
           
        },
        methods:{
           addProduct(){
            axios.post('/api/products', {name:this.name, carb:this.carb, prot:this.prot, fat:this.fat, G:this.G})
            .then(res=> {
                this.name = '';
                this.carb = '';
                this.prot = '';
                this.fat = '';
                this.G = '';
                console.log(res);
            })
           }
        },
            
    }
</script>
<style scoped>

</style>
