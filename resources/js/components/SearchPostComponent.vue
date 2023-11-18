<template> 

<div class="dropdown">
  <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
         
          <input style="font-size: 18px;border-color: green;" @keyup="showHint(this.val.toLowerCase())" v-model="val" class="form-control" type="search" placeholder="поиск рецепта!!!" aria-label="Search">
          <div class="input-group-append">
                        
          </div>
        </div>
        <div id="myDropdown" class="dropdown-content">
        <div id="parentHint"></div>
       
        </div>
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
              if (str.length == 0) {
                documentquerySelector('#parentHint').innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      let jsonHints = JSON.parse(this.responseText);
                      jsonHints = jsonHints.slice(0,10);
                      let parentHint = document.querySelector('#parentHint');  
                      
                      let h = "", r = '';
                        for (let i = 0; i < jsonHints.length; i++) { 
                          r = document.createElement('a');
                            r.value = "добавить";
                            r.className = "button hint p-3";
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

                       
                        console.log(jsonHints);
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
