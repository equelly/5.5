<template> 
<div class="dropdown w-90">
        
         
          <input  style="font-size: 18px;border-color: green;" @input="showHint(this.val.toLowerCase())" v-model="val" class="form-control" type="search" placeholder="Найти продукт..." aria-label="Search">
         
        
          <div id="hintDropdown" class="hintDropdown-content">
            <div id="HintForPost"></div>
            
          </div>
       
</div>
       
</template>

<script>
    export default {
        name:'SearchProductComponent',
        data: function(){
    return {
        msg: '',
        csrf: document.head.querySelector('meta[name="csrf-token"]').content
    }
  },
        data(){
            return{
            str: '',
            val: null
        }
        },
        mounted(){
            
        },
        methods:{
          addToCart(id){
            localStorage.setItem('cart',[
              {
                'id': id,
              }
            ])
          },

          showHint(str) {
            //сначала удалим подсказки от предыдущих запросов
	          document.querySelector('#HintForPost').innerHTML = '';
              if (str.length == 0) {
                document.getElementById("nameProduct").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
             
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      let jsonHints = JSON.parse(this.responseText);
                      jsonHints = jsonHints.slice(0,10);
                      //console.log(jsonHints);
                      let parentHint = document.querySelector('#HintForPost');  
                      
                      let titleCart = "", hintCart = '', bodyCart = '', formCart='', inputCartHidden ='', inputCartSubmit ='', inputCart = '';
                        for (let i = 0; i < jsonHints.length; i++) { 
                          hintCart = document.createElement('div');
                            
                            hintCart.className = "card m-4 w-75";
                          titleCart = document.createElement('h1');

                              titleCart.className = "card-header";
                              titleCart.style= "background:#99eb917d";
                              titleCart.innerHTML= jsonHints[i].name;
                          inputCart = document.createElement('input');
                              
                              inputCart.className = "w-50 m-3";
                              inputCart.type = "number";
                              inputCart.name = "massa";
                              inputCart.required = true;
                              inputCart.autocomplete = "off";
                             
                          
                          bodyCart = document.createElement('div'); 
                              bodyCart.className = "card-body";
                              bodyCart.innerHTML = 'Содержит: '+jsonHints[i].carb+'угл./'+jsonHints[i].prot+'бел./'+jsonHints[i].fat+'ж';
                          formCart = document.createElement('form'); 
                              formCart.action = '/session';
                              formCart.method = "POST";
                         let Token=document.createElement("input");
                                Token.type = 'hidden';
                                Token.name ="_token";
                                Token.value =  document.querySelector("meta[name='csrf-token']").getAttribute("content");
                          inputCartHidden= document.createElement('input');
                              inputCartHidden.type= "hidden";
                              inputCartHidden.name= "action";
                              inputCartHidden.value= 'добавить';
                          inputCartSubmit= document.createElement('button');
                              inputCartSubmit.type= 'submit';
                              inputCartSubmit.innerHTML= 'добавить';
                              inputCartSubmit.name= "product_id";
                              inputCartSubmit.value= jsonHints[i].id;
                              inputCartSubmit.className ="btn btn-card w-90 m-3";
                              titleCart.appendChild(inputCart);
                             formCart.appendChild(titleCart);
                             formCart.appendChild(bodyCart);
                             
                             
                             formCart.appendChild(Token);
                             formCart.appendChild(inputCartHidden);
                             formCart.appendChild(inputCartSubmit);
                             //formCart.appendChild(bodyCart);
                            

                            
                            //hintCart.appendChild(bodyCart);
                            hintCart.appendChild(formCart);
                             
                        parentHint.appendChild(hintCart);
                        
                        };

                       //console.log(jsonHints);
                        
                    }
                };
                xmlhttp.open("get", "/productHints?q=" + str, true);
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
.hintDropdown-content{
  
  
  min-width: 100%;
  overflow: auto;
  border-radius: 5px;
  
  z-index: 1;
}

</style>
