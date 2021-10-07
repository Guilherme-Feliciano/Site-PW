<?php session_start();

$categoria = $_POST['categoria'];
$operacao = $_POST['operacao'] ?: $_GET['operacao'];

$cod_login = $_SESSION['cod_login'];

// -------------------------------------------------------------------------------------------------------------- //


if( $operacao == "cadastrar" ){
    
    $sql = "INSERT INTO tbl_categoria (categoria, categoria_cadastrado_por) 
                                VALUES('$categoria','$cod_login')";    
                                
    $mensagem = "Categoria cadastrada com sucesso!";

} // fim do casdastrar

if( $operacao == "editar" ){
    
    // receber o código de registro a ser editado
    $cod_categoria = $_POST['cod_categoria'];

    $sql = "UPDATE tbl_categoria SET categoria='$categoria' WHERE cod_categoria='$cod_categoria' ";

    $mensagem = "Categoria editada com sucesso";

} // fim do editar

if( $operacao == "excluir" ){
    //receber o código do registro que vai ser excluído
    $cod_categoria = $_GET['cod_categoria'];

    $sql = "DELETE * FROM tbl_categoria WHERE cod_categoria='$cod_categoria' ";

    $mensgaem = "Categoria excluída com sucesso!";

} // fim do excluir

// -------------------------------------------------------------------------------------------------------------- //

// incluir a conexão
include("../connection/conexao.php");

// executar a instrução SQL
$executa = $mysqli->query($sql);

if ($executa){
    header("location:index.php?pg=lista-categoria&msg=$mensagem");
}else{
    header("location:index.php?pg=lista-categoria&msg=Erro ao executar, contate o administrador.");
}
?>