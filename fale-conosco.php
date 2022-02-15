<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8"/>
	<title>Igreja São Paulo Apóstolo</title>
	<link rel="stylesheet" type="text/css" href="_css/style.css"/>
	<link rel="stylesheet" type="text/css" href="_css/formulario.css"/>
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
				<h3>Contato > Fale Conosco</h3>
				<h2>por Lorena Nunes</h2>
				<h3 class="direita">Atualizado em Setembro/2021</h3>
			</hgroup>
		</header>
		<section id="corpo">
			<h2>Formulário de contato</h2>
			<form method="post" name= "form" action="trataFormulario.php" id="formContato" >
				<p class="importante">* Informações obrigatórias</p>
				<fieldset id="usuario">
				<legend>Identificação do Usuário</legend>
				<p><label for="cNome"><span style="color:red">*</span>Nome:</label><input type="text" required name="tNome" id="cNome" size="20" maxlength="30" placeholder="Nome completo"/></p>
				<p><label for="cTelefone"><span style="color:red">*</span>Telefone:</label><input type="number" required name="tTelefone" id="cTelefone"  placeholder="dígitos apenas"/></p>
				<p><label for="cMail">E-mail:</label><input type="email" name="tMail" id="cMail" size="20" maxlength="40"  placeholder="usuario@dominio"/></p>
				</fieldset>
				<fieldset id="mensagem">
				<legend>Mensagem do Usuário</legend>
				<p><label for="cAssunto"><span style="color:red">*</span>Assunto:</label><input type="text" required name="tAssunto" id="cAssunto" size="20" maxlength="30" placeholder="Assunto"/></p>
				<p><label for="cMsg"><span style="color:red">*</span>Mensagem:</label><textarea required name="tMsg" id="cMsg" cols="35" rows="5" placeholder="Deixe aqui sua mensagem..."></textarea></p>
				</fieldset>
				<input Style="margin-left:110px;" class="botao" type="submit" value="Enviar">
				<input class="botao" type="reset" value="Limpar">
			</form>
		</section>
		

		<footer id="rodape">
			<p>R. Angola, 271 - São Paulo, Belo Horizonte - MG, 31910-060 - Telefone: (31) 3432-1280<br>
			Copyright &copy; 2021 - by Lorena Nunes</p>
		</footer>
	</div>
</body>
</html>