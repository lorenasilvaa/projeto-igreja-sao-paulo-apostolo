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
					<h3>São Paulo Apóstolo > Sobre</h3>
					<h2>por Lorena Nunes</h2>
					<h3 class="direita">Atualizado em Setembro/2021</h3>
				</hgroup>
			</header>
		
	<section id="corpo">
		<h2>Sobre a Paróquia</h2>
		<p>A Paróquia de São Paulo Apóstolo está localizada na rua Angola, nº 271, bairro São Paulo, na cidade de Belo Horizonte - Minas Gerais. Além dos compromissos religiosos, desenvolve um trabalho social, por meio da reunião e estímulo dos paroquianos a doar ajuda espiritual, material e alimentícia, àqueles que se encontram desamparados.<strong>Pároco:</strong>  Pe. Nêmio José de Oliveira. <strong>Telefone:</strong> (31)3432-1280.</p>
		<figure>
			<img src="_imagens/igreja.png" alt="Imagem frontal da Igreja São Paulo Apóstolo">
			<figcaption>Frente da Igreja São Paulo Apóstolo.</figcaption>
		</figure>
		
		<h2>Sobre a desenvolvedora</h2>

		<p>Mora em Belo Horizonte, Minas Gerais e possui 23 anos. Possui formação no curso Técnico em Informática - CEFET-MG. Atualmente cursa Sistemas para Internet na Universidade do Sul de Santa Catarina. Desenvolveu esse site, após ter a ideia de reunir as informações de contato da Igreja São Paulo Apóstolo em um local e também para ajudar a informatizar o processo solidário dessa instituição, através de um projeto para a conclusão do curso.</p>
	</section>	

	<footer id="rodape">
		<p>R. Angola, 271 - São Paulo, Belo Horizonte - MG, 31910-060 - Telefone: (31) 3432-1280<br>
		Copyright &copy; 2021 - by Lorena Nunes</p>
	</footer>
	</div>
</body>
</html>