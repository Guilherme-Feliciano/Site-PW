<?php @session_start();

// se a variavel de sessao cod_login não existir direcionamos o usuario para a tela de login

if( !isset($_SESSION['cod_login']) ){

    header("location:../login.php");

}

?>