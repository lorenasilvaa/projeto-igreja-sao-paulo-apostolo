<?php 
	session_start();
	include('trataMotivacoes.php'); 

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8"/>
	<title>Igreja São Paulo Apóstolo</title>
	<link rel="stylesheet" type="text/css" href="_css/style.css"/>
	<link rel="stylesheet" type="text/css" href="_css/estiloCrud.css"/>
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
			<h3>Motivações > Frases Espirituais</h3>
			<h2>por Lorena Nunes</h2>
			<h3 class="direita">Atualizado em Setembro/2021</h3>
		</hgroup>
	</header>
	
		<?php 
			if(isset($_SESSION['usuarioId'])){
				echo '<section id="corpo-crud2" Style="margin-bottom:-240px;">';
			}else{
				echo '<section id="corpo-crud2" Style="display:none;>';
			}
		
		?>
		<h1><?=($id==-1)?"Cadastrar nova ":"Editar "?> Frase</h1>
		<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
		  <fieldset>
		  <p style="color:red; margin-left:5px; font-size:12px;">* Informações obrigatórias</p>
		  
		  <p><label for="cAutor"><span style="color:red">*</span>Autor: </label><input type="text" required name="tAutor" id="cAutor" size="32" maxlength="50" placeholder="Autor, versículo ..." value="<?=$autor?>"/></p>
		  
		  <p><label for="cMensagem"><span style="color:red">*</span>Mensagem:</label><textarea required name="tMensagem" id="cMensagem" maxlength="500" cols="30" rows="5" placeholder="Insira a frase, trecho bíblico..."><?php echo $mensagem; ?></textarea><br></p>
		  
		  
		  <input type="hidden" value="<?=$id?>" name="id" >
		  <button class="botao" type="submit"><?=($id==-1)?"Cadastrar":"Salvar Edição"?></button>
		  </fieldset>
		</form>
		
	</section>
	
	<section id="corpo-crud">
	<h1>Frases Espirituais</h1>
		<?php
		// receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);

		$pagina = (!empty($pagina_atual))? $pagina_atual : 1;
		
		//setar a quantidade de itens por página
		$qnt_result_pg = 2;

		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		if(isset($_SESSION['usuarioId'])){
		
			$result = $banco->query("SELECT * FROM frases order by cod_frase desc LIMIT $inicio, $qnt_result_pg");
			while ($aux_query = $result->fetch_assoc()) 
			{
			  //echo $aux_query["cod_frase"].'</br>';
			  echo '<div class="div-crud">';
			  echo '<p title="Editar Registro" class="menus"><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["cod_frase"].'" onclick=\'return confirm("Deseja editar esse registro?");\'> Editar </a>';
			  echo '<a title="Excluir Registro" href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["cod_frase"].'&del=true" onclick=\'return confirm("Tem certeza que deseja deletar esse registro?");\'> Excluir </a></p></br></br>';
			  echo '<p><em>'.'"'.$aux_query["desc_frase"].'"'.'</em></p>';
			  echo '<p class = "autor"><em><strong>'.$aux_query["autor_frase"].'.'.'</strong></em></p>';
			  echo '</div>';
			}
		}else{
			$qnt_result_pg = 5;
			$result = $banco->query("SELECT * FROM frases order by cod_frase desc LIMIT $inicio, $qnt_result_pg");
			if(mysqli_num_rows($result) === 0){
						echo '<div class="div-crud">';
						echo '<p>Nenhuma frase encontrada! Volte mais tarde!</p>';
						echo '</div>';
			}else{
				while ($aux_query = $result->fetch_assoc()) 
				{
				  //echo $aux_query["cod_frase"].'</br>';
				  echo '<div class="div-crud">';
				  echo '<p><em>'.'"'.$aux_query["desc_frase"].'"'.'</em></p>';
				  echo '<p class = "autor"><strong><em>'.$aux_query["autor_frase"].'.'.'</em></strong></p>';
				  echo '</div>';
				}
			}
		}
		
		//Paginação - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(cod_frase) AS num_result FROM frases";
		$resultado_pg = mysqli_query($banco, $result_pg );
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de página
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

		//Limitar os link antes depois
		$max_links = 2;
		echo "<p class= 'navegacao'><a href='motivacoes.php?pagina=1' title='Primeira Página'> Primeira </a>";
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){	
				echo "<a href='motivacoes.php?pagina=$pag_ant'> $pag_ant </a>";
			}
		}
		echo $pagina;
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='motivacoes.php?pagina=$pag_dep'> $pag_dep </a>";
			}
		}
		echo "<a href='motivacoes.php?pagina=$quantidade_pg' title='Última Página'> Última </a></p>";
		?>
	
	</section>


	<footer id="rodape">
		<p>R. Angola, 271 - São Paulo, Belo Horizonte - MG, 31910-060 - Telefone: (31) 3432-1280<br>
		Copyright &copy; 2021 - by Lorena Nunes</p>
	</footer>
	</div>
</body>
</html>