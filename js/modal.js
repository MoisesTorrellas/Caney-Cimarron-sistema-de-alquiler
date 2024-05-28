let cerrar = document.querySelectorAll(".closes")[0];
let abrir = document.querySelectorAll(".cta")[0];
let modal = document.querySelectorAll(".modal2")[0];
let modalc = document.querySelectorAll(".modal-contenedor")[0];

abrir.addEventListener("click", function(e){e.preventDefault()

    modalc.style.opacity = "1"
    modalc.style.visibility = "visible"
    modal.classList.toggle("modal-close")

}); 

cerrar.addEventListener("click", function(){
    modal.classList.toggle("modal-close")
    setTimeout(function(){
        modalc.style.opacity = "0"
        modalc.style.visibility = "hidden"
    },300)
});

window.addEventListener("click", function(e){
    console.log(e.target)
    if(e.target == modalc){
        modal.classList.toggle("modal-close")
    setTimeout(function(){
        modalc.style.opacity = "0"
        modalc.style.visibility = "hidden"
    },300)
    }
});