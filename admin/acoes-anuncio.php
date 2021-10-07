<?php session_start();

// receber os campos do form
// categoria_produto    -   nome_produto  -   descricao -   preco   -   produto_usuario	
    // menos o campo imagem

$categoria_produto = $_POST['categoria_produto'];
$produto = $_POST['nome_produto'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

$cod_login = $_SESSION['cod_login'];
$operacao = $_POST['operacao'] ?: $_GET['operacao'];

if ($operacao == 'cadastrar'){
    
    $sql = "INSERT INTO tbl_produto (categoria_produto,nome_produto,preco,descricao,produto_usuario)
            VALUES ('$categoria_produto','$produto','$preco','$descricao','$cod_login')";

    $mensagem = "Produto cadastrado com sucesso!";

} // fim do cadastrar

// incluir a conexao
include("../connection/conexao.php");

// executar o sql
$executa = $mysqli->query($sql);

//verificar se o sql que foi executado e redirecionar para a lista de anúncios com a mesnagem de sucesso ou erro
if ($executa){
    header("location:index.php?pg=lista-anuncios&msg=$mensagem");
}else{
    header("location:index.php?pg=lista-anuncios&msg=Erro ao executar, contate o administrador.");
}

 

?>