import './bootstrap';

import Alpine from 'alpinejs';

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
    default:
      console.log(`Sorry, [data-js] is null!.`);
  }

