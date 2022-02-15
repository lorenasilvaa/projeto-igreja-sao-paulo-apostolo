<?php
	include_once('_database/conexao.php');
 
	//Conexão com banco de dados
	if ($banco->connect_errno){
		echo "Ocorreu um erro na conexão com o banco de dados.";
		exit;
	}
 
	mysqli_set_charset($banco, 'utf8');
 
	$id     = -1;
	$item= "";
	$caracteristica  = "";
	$descricao = "";
	$status = "";
 
//Verificação do preenchimento das informações
if(isset($_POST["tItem"]) && isset($_POST["tCaracteristica"]) && isset($_POST["tDescricao"]))
{
	
	if(isset($_POST['tStatus']))
		$status = 'c';
	else
		$status = 'p';
	if(empty($_POST["tItem"]))
		$erro = "Campo item obrigatório";
	else
	if(empty($_POST["tCaracteristica"]))
		$erro = "Campo caracteristica obrigatório";
	else
	if(empty($_POST["tDescricao"]))
		$erro = "Campo descrição obrigatório";
	else
	{
		$id     = $_POST["id"];		
		$item  = $_POST["tItem"];
		$caracteristica  = $_POST["tCaracteristica"];
		$descricao = $_POST["tDescricao"];
		//Cadastro das informações			
		if($id == -1)
		{
			$stmt = $banco->prepare("INSERT INTO doacoes (item, caracteristicas,descricao,status) VALUES (?,?,?,?)");
			$stmt->bind_param('ssss', $item,$caracteristica,$descricao,$status);	
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo"<script language='javascript' type='text/javascript'>
				alert('Registro cadastrado com sucesso!');window.location.href='doacoes.php'</script>";
				exit;
			}
		}
		else
		//Atualização das Informações
		if(is_numeric($id) && $id >= 1)
		{
			$stmt = $banco->prepare("UPDATE doacoes SET item=?, caracteristicas=?, descricao=?, status=? WHERE cod_doacao = ? ");
			$stmt->bind_param('ssssi', $item,$caracteristica,$descricao,$status, $id);
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo"<script language='javascript' type='text/javascript'>
				alert('Registro alterado com sucesso!');window.location.href='doacoes.php'</script>";
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
		$stmt = $banco->prepare("DELETE FROM doacoes WHERE cod_doacao = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		
		echo"<script language='javascript' type='text/javascript'>
		alert('Registro excluído com sucesso!');window.location.href='doacoes.php'</script>";
		exit;
	}
	else
	{
		$stmt = $banco->prepare("SELECT * FROM doacoes WHERE cod_doacao = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();
		
		$id = $aux_query["cod_doacao"];
		$item = $aux_query["item"];
		$caracteristica = $aux_query["caracteristicas"];
		$descricao = $aux_query["descricao"];
		$status = $aux_query["status"];

		
		$stmt->close();		
	}
}
 
?>