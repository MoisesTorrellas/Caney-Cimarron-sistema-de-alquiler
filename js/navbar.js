const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barraLateral")
const spans = document.querySelectorAll("span")

const navBotones= document.querySelectorAll("#navBoton")
const navhijos= document.querySelectorAll(".navHijo")

cloud.addEventListener("click",()=>{
    barraLateral.classList.toggle("miniBarraLateral");
    spans.forEach((span)=>{
        span.classList.toggle("visible")
    });
});

navBotones.forEach((navBoton)=>{
    navBoton.addEventListener("click",()=>{
        navhijos.forEach((navHijo)=>{
            navHijo.classList.toggle("navHijoActivo")
        });
    });

});