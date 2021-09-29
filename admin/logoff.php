<?php @session_start();

// destruir todas as váriaveis de sessão
session_destroy();

header("location:../login.php")

?>