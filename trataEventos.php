<?php
	include_once('_database/conexao.php');
	//Conexão com banco de dados
	if ($banco->connect_errno){
		echo "Ocorreu um erro na conexão com o banco de dados.";
		exit;
	}
 
	mysqli_set_charset($banco, 'utf8');
	 
	$id     = -1;
	$titulo  = "";
	$data  = "";
	$hora = "";
	$local = "";
	$descricao = "";
 
//Verificação do preenchimento das informações
if(isset($_POST["tTitulo"]) && isset($_POST["tData"]) && isset($_POST["tHora"]) && isset($_POST["tLocal"]) && isset($_POST["tDescricao"]))
{
	
	if(empty($_POST["tTitulo"]))
		$erro = "Campo título obrigatório";
	else
	if(empty($_POST["tData"]))
		$erro = "Campo data obrigatório";
	else
	if(empty($_POST["tHora"]))
		$erro = "Campo hora obrigatório";
	else
	if(empty($_POST["tLocal"]))
		$erro = "Campo local obrigatório";
	else
	if(empty($_POST["tDescricao"]))
		$erro = "Campo descrição obrigatório";
	else
	{
		$id     = $_POST["id"];		
		$titulo  = $_POST["tTitulo"];
		$data  = $_POST["tData"];
		$hora = $_POST["tHora"];
		$local = $_POST["tLocal"];
		$descricao = $_POST["tDescricao"];
		//Cadastro das informações			
		if($id == -1)
		{
			$stmt = $banco->prepare("INSERT INTO eventos (titulo_evento,data_evento,hora,local,desc_evento) VALUES (?,?,?,?,?)");
			$stmt->bind_param('sssss', $titulo,$data,$hora,$local,$descricao);	
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo"<script language='javascript' type='text/javascript'>
				alert('Registro cadastrado com sucesso!');window.location.href='eventos.php'</script>";
				exit;
			}
		}
		else
		//Atualização das Informações
		if(is_numeric($id) && $id >= 1)
		{
			$stmt = $banco->prepare("UPDATE eventos SET titulo_evento=?, data_evento=?, hora=?, local=?, desc_evento=? WHERE cod_evento = ? ");
			$stmt->bind_param('sssssi', $titulo,$data,$hora,$local,$descricao, $id);
		
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				echo"<script language='javascript' type='text/javascript'>
				alert('Registro atualizado com sucesso!');window.location.href='eventos.php'</script>";
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
		$stmt = $banco->prepare("DELETE FROM eventos WHERE cod_evento = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		echo"<script language='javascript' type='text/javascript'>
		alert('Registro excluído com sucesso!');window.location.href='eventos.php'</script>";
		exit;
	}
	
	else
	{
		$stmt = $banco->prepare("SELECT * FROM eventos WHERE cod_evento = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();
		
		$id = $aux_query["cod_evento"];
		$titulo = $aux_query["titulo_evento"];
		$data = $aux_query["data_evento"];
		$hora = $aux_query["hora"];
		$local = $aux_query["local"];
		$descricao = $aux_query["desc_evento"];
		
		$stmt->close();		
	}
}
 
?>