<template> 

<div class="dropdown w-100">
  <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
         
          <input style="font-size: 18px;border-color: green;" @input="showHint(this.val.toLowerCase())" v-model="val" class="form-control w-100" type="search" placeholder="поиск рецепта" aria-label="Search">

        </div>
        
        <div id="parentHint" class="dropdown d-flex justify-center"></div>
       
        
  </div>
</div>
</template>

<script>
    export default {
        name:'SearchPostComponent',
        data(){
            return{
            str: '',
            val: null
        }
        },
        mounted(){
            
        },
        methods:{
          showHint(str) {
            //сначала удалим подсказки от предыдущих запросов
	          document.querySelector('#parentHint').innerHTML = '';
            // ...и класс
            document.querySelector('#parentHint').className = '';
            
              if (str.length == 0) {
                
                
                document.querySelector('#parentHint').innerHTML = "в поле поиска ничего нет...";
                document.querySelector('#parentHint').className = 'text-red-500 animate-pulse p-3';
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      let jsonHints = JSON.parse(this.responseText);
                      console.log(jsonHints);
                      //если не найдено соответствий в базе данных выводим сообщение
                      if(jsonHints.length== 0 && str != ''){
                          document.querySelector('#parentHint').innerHTML = "Ничего не найдено";
                          document.querySelector('#parentHint').className = 'text-red-500 animate-pulse p-3';
                          return;
                        };
                      jsonHints = jsonHints.slice(0,10);
                      let parentHint = document.querySelector('#parentHint');  
                      
                      let h = "", r = '';
                        for (let i = 0; i < jsonHints.length; i++) { 
                          r = document.createElement('a');
                            r.value = "добавить";
                            r.className = "button hint mt-3 w-100";
                            r.type = "submit";
                            r.name = "action";
                            r.id = jsonHints[i].id;
                            r.href = "/posts/"+jsonHints[i].id;
                      h = jsonHints[i].title;
                      r.innerHTML = h;
                        parentHint.appendChild(r);
                          
                        //  x += jsonHints[i].title + "<br>";
                       
                        //  document.getElementById("parentHint").innerHTML = x;
                        };

                       
                        //console.log(jsonHints);
                    }
                };
                xmlhttp.open("GET", "/hints?q=" + str, true);
                xmlhttp.send();
            }
          },
         
        },
        
        computed: {
    // a computed getter
    
  }
}
</script>
<style scoped>
.dropdown-content {
  
  
  min-width: 100%;
  overflow: auto;
  border-radius: 5px;
  
  z-index: 1;
}

</style>
