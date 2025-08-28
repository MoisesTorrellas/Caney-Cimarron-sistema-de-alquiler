let botonMenu = document.querySelector('.bMenu');
let menu = document.querySelector('.barraLateral');

$(botonMenu).on("click", function () {
	menu.classList.toggle("menuShow")
});