<?php
	// Verificação o preenchimento das informações
	if(isset($_POST["tNome"]) && isset($_POST["tTelefone"]) && isset($_POST["tAssunto"])&& isset($_POST["tMsg"])){
		
		$tNome = $_POST['tNome'];
		$tTelefone = $_POST['tTelefone'];
		
		if(empty($_POST["tMail"])){
			$tMail = ' não informado!';
		}else{
			$tMail = $_POST['tMail'];
		}

		$tAssunto = $_POST['tAssunto'];
		$tMsg = $_POST['tMsg'];
		
		date_default_timezone_set('America/Sao_Paulo');
  
		// Preparação das informações do cabeçalho
		$arquivo = "
			<html>
				<p><strong>Informações pessoais: </strong></p>
				<p><strong>Nome: </strong>".$tNome."</p>
				<p><strong>Telefone: </strong>".$tTelefone."</p>
				<p><strong>E-mail: </strong>".$tMail."</p>
				
				<p><strong>Mensagem: </strong>".$tMsg."</p></br>
				<p>E-mail enviado em <strong>".date('d/m/Y \à\s H:i:s')."</strong>
				
				
			</html>
		";
		
		$destinatario = "apostoloigrejasaopaulo@gmail.com";
		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
		$headers .= "From: ".$tNome. "< ".$tAssunto." >";
		
		if (mail($destinatario, $tAssunto, $arquivo, $headers)){
			
			echo"<script language='javascript' type='text/javascript'>
					alert('Dados enviados com sucesso!');window.location.href='fale-conosco.php'</script>";
					exit;
		}else{
			
			$tNome = $_POST['tNome'];
			$tTelefone = $_POST['tTelefone'];
			
		if(empty($_POST["tMail"])){
			
			$tMail = ' não informado!';
			
		}else{
			
			$tMail = $_POST['tMail'];
		}

		$tAssunto = $_POST['tAssunto'];
		$tMsg = $_POST['tMsg'];
			echo"<script language='javascript' type='text/javascript'>
					alert('Dados não enviados! Tente novamente');window.location.href='fale-conosco.php'</script>";
					exit;
		}
	}else{
		
		echo"<script language='javascript' type='text/javascript'>
			alert('Preencha todos os campos obrigatórios!');window.location.href='fale-conosco.php'</script>";
		exit;
	}
	
?>