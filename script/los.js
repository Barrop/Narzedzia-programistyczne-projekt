const tabela = document.getElementById('test');
const losowanie = document.getElementById('losowanie');
const zakoncz = document.getElementById('zakoncz');

losowanie.addEventListener('click', function (){
	tabela.classList.remove("test");
	zakoncz.classList.remove("test");
	losowanie.classList.add("test");
});