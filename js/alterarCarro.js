const carViewers = document.querySelectorAll('.car-viewer');

carViewers.forEach(carViewer => {
    const carHeaderData = carViewer.getElementsByTagName('span');
    const editBtn = carViewer.querySelector('.alterarBtn');

    editBtn.addEventListener('click', () =>{
        formsCtn.classList.add('visible');
        form[4].classList.add('visible');

        document.getElementById('inputId').value = editBtn.getAttribute('data-car-index');
        document.getElementById('alterarPlaca').value = carHeaderData[0].innerText;
    });
});