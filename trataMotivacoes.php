<?php
	include_once('_database/conexao.php');
	
	//Conexão com banco de dados
	if ($banco->connect_errno){
		echo "Ocorreu um erro na conexão com o banco de dados.";
		exit;
	}
 
	mysqli_set_charset($banco, 'utf8');
	 
	$id     = -1;
	$autor  = "";
	$mensagem = "";
 
//Verificação do preenchimento das informações
if(isset($_POST["tAutor"]) && isset($_POST["tMensagem"]))
{
	if(empty($_POST["tAutor"]))
		$erro = "Campo autor obrigatório";
	else
	if(empty($_POST["tMensagem"]))
		$erro = "Campo mensagem obrigatório";
	else
	{
		$id     = $_POST["id"];		
		$autor  = $_POST["tAutor"];
		$mensagem = $_POST["tMensagem"];
		//Cadastro das informações		
		if($id == -1)
		{
			$stmt = $banco->prepare("INSERT INTO frases (desc_frase,autor_frase) VALUES (?,?)");
			$stmt->bind_param('ss', $mensagem,$autor);	
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				//header("Location:motivacoes.php");
				//exit;
				echo"<script language='javascript' type='text/javascript'>
				alert('Registro cadastrado com sucesso!');window.location.href='motivacoes.php'</script>";
				exit;
			}
		}
		else
		//Atualização das Informações
		if(is_numeric($id) && $id >= 1)
		{
			$stmt = $banco->prepare("UPDATE frases SET desc_frase=?, autor_frase=? WHERE cod_frase = ? ");
			$stmt->bind_param('ssi', $mensagem, $autor, $id);
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo"<script language='javascript' type='text/javascript'>
				alert('Registro atualizado com sucesso!');window.location.href='motivacoes.php'</script>";
				exit;
			}
		}
		else
		{
			$erro = "Número inválido";
		}
	}
}
else

if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
	$id = (int)$_GET["id"];
	//Deleção das Informações
	if(isset($_GET["del"]))
	{
		$stmt = $banco->prepare("DELETE FROM frases WHERE cod_frase = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		echo"<script language='javascript' type='text/javascript'>
		alert('Registro excluído com sucesso!');window.location.href='motivacoes.php'</script>";
		exit;
	}
	
	else
	{
		$stmt = $banco->prepare("SELECT * FROM frases WHERE cod_frase = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();
		
		$id = $aux_query["cod_frase"];
		$autor = $aux_query["autor_frase"];
		$mensagem = $aux_query["desc_frase"];
		
		$stmt->close();		
	}
}
 
?>