<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8"/>
	<title>Igreja São Paulo Apóstolo</title>
	<link rel="stylesheet" type="text/css" href="_css/style.css"/>
	<link rel="stylesheet" type="text/css" href="_css/duvidas.css"/>
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
			<h3>Igreja São Paulo Apóstolo > Dúvidas Frequentes</h3>
			<h2>por Lorena Nunes</h2>
			<h3 class="direita">Atualizado em Setembro/2021</h3>
		</hgroup>
	</header>
	
	<section id="corpo">
		<h2>Dúvidas Frequentes</h2>
		<!-- Insere o frame -->

		<div style="position:relative;">
		<iframe src="_subduvidas/frame.html" class="frame" ></iframe>
		 </div> 
	</section>


	<footer id="rodape">
		<p>R. Angola, 271 - São Paulo, Belo Horizonte - MG, 31910-060 - Telefone: (31) 3432-1280<br>
			Copyright &copy; 2021 - by Lorena Nunes</p>
	</footer>
</div>
</body>
</html>