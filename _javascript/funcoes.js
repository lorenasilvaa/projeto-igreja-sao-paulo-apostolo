//Função para retorno de Mensagens
function confirmacao(caminho) {
	var resposta = confirm("Deseja remover esse registro?");
	if (resposta == true) {
		window.location.href = caminho;
	}
}
//Função do Menu
function myFunction() {
	var x = document.getElementById("myTopnav");
	if (x.className === "topnav") {
		x.className += " responsive";
	} else {
		x.className = "topnav";
	}
}
