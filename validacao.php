<?php
session_start(); 

include_once('_database/conexao.php');
 
if ($banco->connect_errno)
{
	echo "Ocorreu um erro na conexão com o banco de dados.";
	exit;
}
 
mysqli_set_charset($banco, 'utf8');

	
  // Confirmação de POST e se as informações são vazias
  if((isset($_POST['usuario'])) && (isset($_POST['senha']))){
	  
	  $usuario = mysqli_real_escape_string($banco, $_POST['usuario']); //Prevenção de SQL injection
        $senha = mysqli_real_escape_string($banco, $_POST['senha']);
        $senha = md5($senha);
            
        //Localizando na tabela usuario se existe o informado
        $result_usuario = "SELECT * FROM usuario WHERE usuario = '$usuario' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($banco, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
		//Usuário encontrado
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id'];
			header("Location: index.php");
		}
		//Usuário não encontrado e redirecionamento para a tela de Login
        else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválida!";
            header("Location: adm.php");
        }
    //O campo usuário e senha não preenchido
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválida!";
        header("Location: adm.php");
    }
  
  
  ?>