import './bootstrap';

import Alpine from 'alpinejs';
import { update } from 'lodash';

window.Alpine = Alpine;

Alpine.start();

const body = document.body.getAttribute('data-js'); 

/* Get the value of the checked chekbox to make the radio button valid   */
function checkedBox($checkbox){
    $checkbox.toggleAttribute('checked'); 
    document.querySelectorAll(`.radio-image[value='${$checkbox.value}']`).forEach(radio => {
        radio.toggleAttribute('disabled');
        radio.checked=false;
    });
};

/* Remove hidden class from table columns when screen width > 768 px */  
function displayHiddenColumns(){
    if (screen.width >= 768) {
        document.querySelectorAll('td.selected').forEach(hidden=>{
            hidden.classList.remove("hidden");
        });
    };  
}

/* Add product cart */ 
const addProduct =  document.querySelectorAll(".add-to-shopping-cart"); 
const counter = document.getElementById("cart-nb");
let quantity = 0;

/* Update cart number of the products page*/ 
function updateCart(event){
    quantity += 1;
    if(quantity >= 99){
        counter.innerText = "99+0";
        event.target.classList.add("disableCart");
        event.target.removeEventListener("click", updateCart);
        return; 
    }
    counter.innerText = quantity;
    event.target.classList.add("disableCart");
    event.target.removeEventListener("click", updateCart);
}


// DISPLAY IMG ON MOBILE //
const displayImg = document.getElementById("display-img");
const img1 = document.getElementById("img-1");
const img2 = document.getElementById("img-2");
const img3 = document.getElementById("img-3");

let countImg= 1; 

/* Display the right img */ 
function displayMainImg(){
    document.getElementById("next-img").addEventListener("click", function(){
        countImg += 1;
        console.log(countImg);
        if(countImg == 2) {
            displayImg.src = img2.src;
        } 
        if (countImg == 3) {
            displayImg.src = img3.src;
            document.getElementById("next-img").classList.add("hidden");
        }
        if(countImg >= 1 && countImg <= 2 ) document.getElementById("last-img").classList.remove("hidden");

    })
    document.getElementById("last-img").addEventListener("click", function(event){
        countImg--;
        console.log(countImg);
        if (countImg <=1) document.getElementById("last-img").classList.add("hidden");
        if (countImg == 1) {
            displayImg.src = img1.src;
        }
        if(countImg == 2) {
            displayImg.src = img2.src;
        } 
        if (countImg == 3) {
            displayImg.src = img3.src;
        } 
        if(countImg >= 1 && countImg <= 2 ) document.getElementById("next-img").classList.remove("hidden");

    })
}

switch (body) {
    case 'userJs':
        document.getElementById('link-list-users').addEventListener("click", function(e){
            document.getElementById('list-dashboard-users').classList.toggle('hidden');
            document.getElementById('list-title-dashboard-users').classList.toggle('hidden');
        });      
        break;
    case 'images':
        document.querySelectorAll('.checkbox-image').forEach(check => {
            document.querySelectorAll('.radio-image').forEach(radio => radio.setAttribute("disabled",""));
            check.addEventListener("click", function() {
                checkedBox(check);
            });
        });
        break;
    case 'changeImages':
        document.getElementById('change-button').addEventListener("click", function(e){
            document.getElementById('image-update').classList.toggle('hidden');
            document.getElementById('file').classList.toggle('hidden');
            document.getElementById('submit').value = "Update"
        });
        break;  
        case 'hiddenProduct':
            displayHiddenColumns();         
            window.addEventListener("resize", function(e){
                displayHiddenColumns(); 
                if (screen.width < 768 ) {
                    document.querySelectorAll('td.selected').forEach(hidden=>{
                        hidden.classList.add("hidden");
                    })
                }
            })
            break; 
        case 'listProducts':
            document.getElementById('sorting').addEventListener('change', function(){
                document.getElementById('form-sorting').submit();
            })

            addProduct.forEach(cta => {
                cta.addEventListener("click", updateCart)
            });
            break;  
        case 'detailed-product':
            displayMainImg();
        break;  
    default:
      console.log(`Sorry, [data-js] is null!.`);
  }

