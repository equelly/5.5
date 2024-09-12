<template> 
<div class="dropdown w-100">
        
         
          <input  style="font-size: 18px;border-color: green;" @input="showHint(this.val.toLowerCase())" v-model="val" class="form-control w-100" type="search" placeholder="Найти продукт..." aria-label="Search">
         
        
          <div id="hintDropdown" class="hintDropdown-content d-flex justify-center">
            <div id="HintForProduct"></div>
            
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
            document.querySelector('#HintForProduct').innerHTML = '';
            //... и класс
	          document.querySelector('#HintForProduct').className = '';
              if (str.length == 0) {
                document.querySelector('#HintForProduct').innerHTML = 'в поле поиска ничего нет';
                document.querySelector('#HintForProduct').className = 'text-red-500 animate-pulse p-3';
              
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
             
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      let jsonHints = JSON.parse(this.responseText);
                      //если не найдено соответствий в базе данных выводим сообщение
                        if(jsonHints.length== 0 && str != ''){
                          document.querySelector('#HintForProduct').innerHTML = "Ничего не найдено";
                          document.querySelector('#HintForProduct').className = 'text-red-500 animate-pulse p-3';
                          return;
                        };
                      jsonHints = jsonHints.slice(0,10);
                      
                      let parentHint = document.querySelector('#HintForProduct');  
                     
                      let titleCart = "", hintCart = '', bodyCart = '', formCart='', inputCartHidden ='', inputCartSubmit ='', inputCart = '';
                        for (let i = 0; i < jsonHints.length; i++) { 
                          hintCart = document.createElement('div');
                            
                            hintCart.className = "card m-4";
                          titleCart = document.createElement('h1');

                              titleCart.className = "card-header";
                              titleCart.style= "background:#99eb917d";
                              titleCart.innerHTML= jsonHints[i].name;
                          inputCart = document.createElement('input');
                              
                              inputCart.placeholder = "кол-во грамм";
                              inputCart.min = "1";
                              inputCart.className = "w-50 m-3";
                              inputCart.type = "number";
                              inputCart.name = "massa";
                              inputCart.required = true;
                              inputCart.autocomplete = "off";
                             
                          
                          bodyCart = document.createElement('div'); 
                              bodyCart.className = "card-body";
                              bodyCart.innerHTML = 'Содержит: </br>'+jsonHints[i].carb+'угл./'+jsonHints[i].prot+'бел./'+jsonHints[i].fat+'ж';
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
                              inputCartSubmit.innerHTML= 'добавить к рецепту';
                              inputCartSubmit.name= "product_id";
                              inputCartSubmit.value= jsonHints[i].id;
                              inputCartSubmit.className ="btn btn-card m-3";
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
