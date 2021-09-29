<?php  @session_start();

// se a variavél de sessão cod_login não existir direcionamos para a tela de login

if ( !isset($_SESSION['cod_login']) ) {
    
    header("location:../login.php");

}

?>