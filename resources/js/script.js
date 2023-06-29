//grosery
/*
let searchForm = document.querySelector('.search-form');
let dropdownContent = document.querySelector('.dropdown-content');
document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
	dropdownContent.style.display = ('block');
    ShopCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let ShopCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>{
    ShopCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    ShopCart.classList.remove('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cart.classList.remove('active');
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
	dropdownContent.style.display = ('none');
    cart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}
/*
let slides = document.querySelectorAll('.home .slides-container .slide');
let index = 0;

function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}
console.log('Подключено!!!!');*/
//
if (!localStorage.getItem('Cart')){
    localStorage.setItem('Cart','[]');
};
//записываем в глобальные переменные массивы, чтобы обращаться к ним из функций

let Cart =  JSON.parse(localStorage.getItem('Cart'));

//функция добавления продукта в localStorage***********************
function  addToCart(id, name, value){
	
	let Cart = localStorage.getItem('Cart');
	
			let newProduct = [
				{
				'id': id,
				'name': name,
				'carb': value
			}
			]
	if(!Cart){
		localStorage.setItem('Cart', JSON.stringify(newProduct));
		
			} else{
				//преобразуем строковое представление Cart из localStorage в массив
				Cart = JSON.parse(Cart);
				//методом find переберем массив Cart и если найдется свойство id == аргументу функции (id), то ничего не делаем... 
				let cart = Cart.find(item=> item.id == id);
				//а если нет, то метод find вернет undefined которое сохраним в cart
					if (cart ==undefined){
					//и добавляем данные newPoduct в массив Cart
					Array.prototype.push.apply(Cart, newProduct);
				}
				//добавляем в localStorage полученный массив Cart приведенный к стрковому формату
				localStorage.setItem('Cart', JSON.stringify(Cart));
					
				}
		}

  document.addEventListener ('click', event=>{      //определяем событие click для объекта document
	const element = event.target;                 //событие event аргумент функции, которая присваивает const element результат метода target
	 
	 if (element.className ==="hint p-1"){            //если элемент имеет className ==="alert"
		console.log(element.name);
		   //функция добавляет в localStorage элемент с событием 'click'
		   addToCart(element.id, element.name, element.value);
		   //в массив localCart помещаем содержимое localStorage
		  let localCart = JSON.parse(localStorage.getItem('Cart'));
				let count = document.querySelectorAll(".count");
					for(let i=0; i<count.length; i++){
					count[i].innerHTML = localCart.length;
					}
		   //... и наименование продуктов
          let x = "";
	    for (let i = 0; i < localCart.length; i++) { 
	          x += localCart[i].name +"--  "+localCart[i].carb+" углеводов<br>";   
        }
 document.getElementById("name").innerHTML = x;
		   // далее запускается анимация
		   element.style.animationPlayState = 'running';
		   //слушаем: когда анимация закончится элемент получит событие animationend 
		   element.addEventListener ('animationend', ()=>{
		   //стрелочная функция запускает встроенный метод объекта element и элемент удаляется со страницы
		   element.remove();                              
		   });
	   }
   });
   let localCart = JSON.parse(localStorage.getItem('Cart'));
   
   
   let count = document.querySelectorAll(".count");
   		for(let i=0; i<count.length; i++){
			count[i].innerHTML = localCart.length;
		}
  
   // наименование продуктов и кл-во углеводов для карточки 
  let x = "";
for (let i = 0; i < localCart.length; i++) { 
	  x +=localCart[i].name+"--  "+localCart[i].carb+" углеводов<br>";   
}
document.getElementById("name").innerHTML = x;
//***************************************** */

let parentListCount = document.querySelector('#listCount');
 console.log(parentListCount);
let il = '';
for (let i = 0; i < localCart.length; i++) {
	il = document.createElement('il');
	il.className = "list-group-item";
	il.innerHTML =  localCart[i].name + "<input id='input' class='cls' type='' placeholder='грамм' style='width: 5rem; float: right;'>";
	parentListCount.appendChild(il);
}

/*{
    nameCount += localCart[i].name+ "<br>";
    
	inputCount += localCart[i].input="<input id='input' class='cls' type='number' placeholder='грамм'>"+ "<br>";
};	
	document.getElementById("nameCount").innerHTML = nameCount;
    
	document.getElementById("inputCount").innerHTML = inputCount;
*/
//формула для расчета хлебных единиц

let elem = document.getElementsByClassName('cls');
for(let i = 0; i < elem.length; i++){
	elem[i].addEventListener('keyup', func);
}


function func() {
	let elemInput = document.getElementsByClassName('cls');
	let sum = 0;
	for (let i = 0; i < elemInput.length; i++) {
		sum += +localCart[i].carb/100*elemInput[i].value/12;
	}
	let newElem = document.getElementById('sum');
	newElem.value = sum;
}
//************************************ 
   // далее запускается анимация
   element.style.animationPlayState = 'running';
   //слушаем: когда анимация закончится элемент получит событие animationend 
   element.addEventListener ('animationend', ()=>{
   //стрелочная функция запускает встроенный метод объекта element и элемент удаляется со страницы
   element.remove();                              
   })