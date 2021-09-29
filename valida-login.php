<?php session_start();

// receber os campos do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

$_SESSION['dadosFormLogin'] = $_POST; // armazenar todos os dados via POST
$_SESSION['mensagemErroLogin'] = array(); // array para armazenar as mensagens de login

if(strlen($email) < 1){
    $_SESSION['mensgaemErroLogin'][] = "O campo email é obrigatório";
}

if(strlen($senha) < 1){
    $_SESSION['mensgaemErroLogin'][] = "O campo senha é obrigatório";
}

// incluir a conexão
include("connection/conexao.php");

// consulta ao banco para verificar se a senha e o email existem
$consultaLogin = "SELECT * FROM tbl_login WHERE email='$email' AND senha= MD5('$senha') ";

// executar a consulta
$executaConsulta = $mysqli->query($consultaLogin);

// total de linhas retornada pela consulta
$totalLinhas = $executaConsulta->nuw_rows;


// obter os dados do SELECT
$dadosUsuario = $executaConsulta->fetch_assoc();


if ($totalLinhas < 1) {
    $_SESSION['mensagemErroLogin'][] = "Usuário ou senha inválidos!";
}

if ( $dadosUsuario['status_login'] == 0 && $totalLinhas > 0 ) {
    

    $cod_ativacao = $dadosUsuario['cod_ativacao'];
    $mensagem = "Você ainda não ativou a sua conta. 
                <a href='ativa-conta.php?codigoAtivacao=$cod_ativacao'> Ativar agora </a> ";

    $_SESSION['mensgaemErroLogin'][] = $mensagem;

}


if( sizeof($_SESSION['mensagemErroLogin']) > 0 ){

    header("location:login.php?erro=1");

}else{

    unset($_SESSION['mensagemErrologin']);
    unset($_SESSION['dadosFormLogin']);

    // armazenar alguns dados em variaveis de sessão e direcionar o usuário para área administrativa

    // armazenar o código do usuário
    $_SESSION['cod-login'] = $dadosUsuario['cod-login'];

    // nome do usuário
    $_SESSION['nome'] = $dadosUsuario['nome'];

    header("location:admin/index.php");

}

?>