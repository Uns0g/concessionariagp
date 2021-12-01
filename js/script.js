const ddButtons = document.querySelectorAll('.dropdown-menu__button');
ddButtons.forEach(ddButton => {
    ddButton.addEventListener('click', () => {
        ddButton.nextElementSibling.classList.toggle('visible');
    });
});

// form elements
const newOptions = document.querySelectorAll('.dropdown-menu:first-of-type li');
const formsCtn = document.querySelector('.forms-container');
const form = document.querySelectorAll('.form');
const closeBtn = document.querySelectorAll('.form__close');
closeBtn.forEach(button =>{
    button.addEventListener('click', () =>{
        formsCtn.classList.remove('visible')
        removeForms();
    });
;});

newOptions.forEach(option => {
    option.addEventListener('click', () => {
        formsCtn.classList.add('visible');
        ddButtons.forEach(menu => {
            menu.nextElementSibling.classList.remove('visible');
        });
        switch (option.outerHTML) {
            case '<li>Carro</li>':
                removeForms(); 
                form[0].classList.add('visible');
                break;
            case '<li>Cor</li>':
                removeForms();
                form[1].classList.add('visible');
                break;
            case '<li>Marca</li>':
                removeForms();
                form[2].classList.add('visible');
                break;
            case '<li>Modelo</li>':
                removeForms();
                form[3].classList.add('visible');
                break;
        }
    });
});

function removeForms(){
    for (let i = 0; i < form.length; i++) {
        form[i].classList.remove('visible');
    }
}

const addNewCarBtn = document.querySelector('#add-button-container button');
addNewCarBtn.addEventListener('click', () =>{
    formsCtn.classList.add('visible');
    removeForms();
    form[0].classList.add('visible');
});