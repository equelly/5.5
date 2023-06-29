<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="farm-control" v-model="title" id="title" placeholder="название">
        </div>
        <div class="mb-3">
            <input type="text" class="farm-control" v-model="content" id="content" placeholder="содержание">
        </div>
        <div class="mb-3">
            <input type="text" class="farm-control" v-model="image" id="image" placeholder="фото">
        </div>
        <div class="mb-3">
            <input type= "button" @click.prevent="addPost" class="btn btn-primary" value="добавить">
        </div>
        
    </div>
</template>

<script>
    export default {
        name:'PostComponent',
        data(){
            return{
            title: null,
            content: null,
            image: null
        }
        },
        mounted(){
           
        },
        methods:{
           addPost(){
            axios.post('/api/posts', {title:this.title, content:this.content, image:this.image})
            .then(res=> {
                this.title = '';
                this.content = '';
                this.image = '';
                console.log(res);
            })
           }
        },
            
    }
</script>
<style scoped>

</style>
