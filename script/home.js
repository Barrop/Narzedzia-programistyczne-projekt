// When the user scrolls the page, execute myFunction 
window.onscroll = () => {
	stickyWindow();
	}

// Get the navbar
const menu = document.getElementById("menu");

// Get the offset position of the navbar
let sticky = menu.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyWindow() {
  if (window.pageYOffset >= sticky) {
    menu.classList.add("sticky")
  } 
  else {
    menu.classList.remove("sticky");
  }
}