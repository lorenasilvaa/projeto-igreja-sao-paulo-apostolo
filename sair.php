<?php
    session_start();   
    unset(
        $_SESSION['usuarioId']
    );   
    $_SESSION['logindeslogado'] = "Deslogado com sucesso!";
    //retorna o usuario para a tela de login
    header("Location: adm.php");
?>