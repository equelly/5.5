<template>
    <div id="app">
  Счётчик: {{counter}}сек.
    </div>
    <button @click="sayHello">Hello</button>
    <button @click=sayHi()>Hi</button>
    <div id = "index">
<Index>

</Index>
    </div>
</template>

<script>
    import Index from './Index.vue'
    export default {
    components:{
        Index
    },
  data() {
    

    return {
      name:'Вася',
      counter: 0
    }
  },
  methods: {
    sayHello(){
        prompt('Hello');
    },
    sayHi(){
        alert('HI!');
    }

  },
  mounted() {
    setInterval(() => {
      this.counter++
    }, 1000)
  }
    }
</script>
