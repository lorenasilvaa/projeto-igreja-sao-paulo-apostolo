<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8"/>
		<title>Igreja São Paulo Apóstolo</title>
		<link rel="stylesheet" type="text/css" href="_css/style.css"/>
		<script language="javascript" src="_javascript/funcoes.js"></script>

	</head>
<body>

	<div id="interface">
		<div class="topnav" id="myTopnav">
				  <a href="index.php" class="active">HOME</a>
				  <a href="motivacoes.php">MOTIVAÇÕES</a>
				  <div class="dropdown">
					<button class="dropbtn">AÇÕES SOLIDÁRIAS
					  <i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
					  <a href="doacoes.php">DOAÇÕES</a>
					  <a href="eventos.php">EVENTOS</a>
					</div>
				  </div>
				  <a href="sobre.php">SOBRE</a>
				  <a href="fale-conosco.php">FALE CONOSCO</a>
				  <a href="duvidas.php">DÚVIDAS FREQUENTES</a>
				  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
	
		<header id="cabec">
					
				
				<hgroup>
				
					<h1>Igreja São Paulo Apóstolo</h1>
					<h2>Ações solidárias para o bem da comunidade!</h2>
				
					<?php 
							if(isset($_SESSION['usuarioId'])){
								echo '<h3 class="direitaa" ><a href="sair.php">&#8617; Sair</a></h3>';
							}else{
								echo '<h3 class="direitaa" ><a href="adm.php">Acesso Administrativo </a></h3>';
							}
					?>
				</hgroup>
				
		</header>
		
		<header id="cabecalho-artigo">
			<hgroup>
				<h3>Home > Introdução</h3>
				<h2>por Lorena Nunes</h2>
				<h3 class="direita">Atualizado em Setembro/2021</h3>
			</hgroup>
		</header>

	<section id="corpo">
		<h2>Introdução</h2>
		<p>Olá, seja muito bem vindo(a)!</p>
		<p><a href="sobre.php" title="Informações sobre o site">Este site</a> é destinado a ajudar a Paróquia São Paulo Apóstolo na divulgação dos itens necessários a arrecadar para <a href="doacoes.php" title="Acesso a doações">doação</a>. Aqui você encontrará também uma <a href="motivacoes.php" title="Acesso a motivações">palavra amiga</a>, ou poderá tirar <a href="duvidas.php" title="Acesso às principais dúvidas">dúvidas</a> de como participar dos <a href="eventos.php" title="Acesso a Eventos">eventos solidários</a>. Caso precisar de uma ajuda, conhecer alguém que necessite, ou desejar contribuir de alguma forma, encaminhe-nos sua <a href="fale-conosco.php" title="Acesso a formulário de contato">mensagem</a>, ou nos procure nos outros canais de atendimento.</p>
		<figure>
			<img src="_imagens/imagem-home.png" alt="Imagem de solidariedade">
		</figure>
		<p><em>"O importante é fazer a caridade, não falar de caridade. Compreender o trabalho em favor dos necessitados como missão escolhida por Deus", <strong>Irmã Dulce.</strong></em></p>
		
	</section>
	
	<footer id="rodape">
	
		<p>R. Angola, 271 - São Paulo, Belo Horizonte - MG, 31910-060 - Telefone: (31) 3432-1280<br>
		Copyright &copy; 2021 - by Lorena Nunes</p>
		
	</footer>
	</div>
</body>
</html>