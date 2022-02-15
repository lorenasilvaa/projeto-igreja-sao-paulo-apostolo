<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8"/>
	<title>Igreja São Paulo Apóstolo</title>
	<link rel="stylesheet" type="text/css" href="_css/style.css"/>
	<link rel="stylesheet" type="text/css" href="_css/login.css"/>
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
				<h3>Acesso Administrativo > Login</h3>
				<h2>por Lorena Nunes</h2>
				<h3 class="direita">Atualizado em Setembro/2021</h3>
			</hgroup>
		</header>
	
		<section id="corpo">
			<!-- Formulário de Login -->
			<h2>Formulário de Login</h2>
			  <form action="validacao.php" method="post">
			  <fieldset>
			  <legend>Dados de Login</legend>
				  <p><label for="txUsuario">Usuário: </label>
				  <input type="text" name="usuario" id="txUsuario" maxlength="50" size="35" required placeholder="usuario@dominio"/></p>
				  <p><label for="txSenha">Senha: </label>
				  <input type="password" name="senha" id="txSenha" size="36" required placeholder="Insira a senha"/></p>
				  <p class="cc">Em caso de dificuldade no acesso, contate o responsável pelo site.</p>
				  <p style="color:red;">
						<?php 
						//Erro de login.
						if(isset($_SESSION['loginErro'])){
							echo $_SESSION['loginErro'];
							unset($_SESSION['loginErro']);
						}?>
					</p>
					<p style="color:blue;">
						<?php 
						//Deslogado com sucesso.
						if(isset($_SESSION['logindeslogado'])){
							echo $_SESSION['logindeslogado'];
							unset($_SESSION['logindeslogado']);
						}
						?>
					</p>
				  

				  <input type="submit" id="botao-enviar" value="Entrar" />
			  </fieldset>
			  </form>

		</section>
	<footer id="rodape">
		<p>R. Angola, 271 - São Paulo, Belo Horizonte - MG, 31910-060 - Telefone: (31) 3432-1280<br>
			Copyright &copy; 2021 - by Lorena Nunes</p>
	</footer>
</div>
</body>
</html>