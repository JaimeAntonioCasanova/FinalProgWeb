document.addEventListener("click", function (e) {
//Busca el src de el elemento al que se le hace click 
//Para imprimirlo en el modal con bootsrap.Modal
    if(e.target.classList.contains("gallery-item")){
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-img").src = src;
        const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'))
        myModal.show()
}
} )