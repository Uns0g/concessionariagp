const editBtns = document.querySelectorAll('.alterarBtn');
editBtns.forEach(editBtn =>{
    editBtn.addEventListener('click', () =>{
        formsCtn.classList.add('visible');
        form[4].classList.add('visible');

        form[4].querySelector('#inputId').value = editBtn.getAttribute('data-index');
        const tableNameField = editBtn.parentElement.previousElementSibling;
        console.log(form[4].querySelector('#inputId').value);
        form[4].querySelector('#inputName').value = tableNameField.textContent;
    });
});