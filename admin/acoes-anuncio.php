<?php session_start();

// receber os campos do form
  // categoria_produto  -   nome_produto   -   descricao  - preco
  // *  menos o campo da imagem
$categoria_produto = $_POST['categoria_produto'];
$nome_produto = $_POST['nome_produto'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

$cod_login = $_SESSION['cod_login'];  
$operacao = $_POST['operacao'] ?: $_GET['operacao'];  

$imagem = $_FILES['imagem']['name']; //nome original
$imagem_temporaria = $_FILES['imagem']['tmp_name']; // nome temporário 

// obter a extensão do arquivo
$extensao_imagem = strtolower(strrchr($imagem,"."));
$novo_nome = "imagem_".time().$extensao_imagem;

if ($operacao == 'cadastrar') {
    
// fazer o upload da imagem 
if(strlen($imagem) > 0 ){
    copy($imagem_temporaria,"../imagens/$novo_nome");
}else{
    $novo_nome = "";
}

    $sql = "INSERT INTO tbl_produto 
                (categoria_produto,nome_produto,preco,descricao,produto_usuario,imagem)
                VALUES
                ('$categoria_produto','$nome_produto','$preco','$descricao','$cod_login','$novo_nome')";
    
    $mensagem = "Anúncio adicionado com sucesso!";

} // fim se cadastrar

if ($operacao == 'editar') {
    
    $cod_produto = $_POST['cod_produto'];
    $nome_imagem = $_POST['nome_imagem'];

    if (strlen($imagem) > 0 ){
        copy($imagem_temporaria,"../imagens/$novo_nome");
        unlink("../imagens/$nome_imagem"); // deletar a imagem

        $nome_imagem = $novo_nome;
    }

    $sql = "UPDATE tbl_produto SET categoria_produto='$categoria_produto', 
                                   nome_produto='$nome_produto',
                                   preco='$preco',
                                   descricao='$descricao',
                                   produto_usuario='$cod_login',
                                   imagem='$nome_imagem',
                                   WHERE cod_produto=$cod_prouduto";

} // fim do editar





// incluir a conexao
include("../connection/conexao.php");

// executar a instrução SQL
$executa = $mysqli->query($sql);

if($executa){
    header("location:index.php?pg=lista-anuncios&msg=$mensagem");
}else{
    header("location:index.php?pg=lista-anuncios&msg=Erro ao executar, contate o administrador.");
}


?>