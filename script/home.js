window.onscroll = () => {
	stickyWindow();
	}

const menu = document.getElementById("menu");
let sticky = menu.offsetTop;

function stickyWindow() {
 if (window.pageYOffset >= sticky) {
  menu.classList.add("sticky");
  } 
	else {
  menu.classList.remove("sticky");
  }
}
