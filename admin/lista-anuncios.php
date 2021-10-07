<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
  <li class="breadcrumb-item active" aria-current="page">Anúncios</li>
  </ol>
</nav>
<div class="card mb-5">
   <div class="row card-body">
    <div class="col-sm-9">
      <h4>Anúncios</h4>
    </div>

    <div class="col-sm-3">
      <a href="index.php?pg=form-anuncio&operacao=cadastrar" title="Nova Categoria">
        <i class="far fa-plus-square"></i> Novo Anúncio
      </a>	
    </div>
  </div>
</div>
   
<!--  receber e exibir a mensagem que está sendo enviada via GET  -->

<?php 
if (isset($_GET['msg']) ) {
  echo "<div class='alert alert-sucess'>".$_GET['msg']." </div>";
} 
?>

<table class="table table-condensed">
      <tr>
        <td><strong>Cod_produto</strong></td>
        <td><strong>Categoria</strong></td>
        <td><strong>Produto</strong></td>
        <td><strong>Preço</strong></td>
        <td></td>
        <td></td>
      </tr>

<?php 
// cria uma consulta na tbl_produto
$sql = "SELECT * FROM tbl_produto";

// incluir a conexao 
include("../connection/conexao.php");

// executar a consulta 
$executa = $mysqli->query($sql);

// obter o número de linhas 
$totalLinhas = $executa->num_rows;

// utilizando o while exibir os produtos cadstrados

if ($totalLinhas < 1){
  
  echo "<tr>  
          <td colspan='6'> Não existe anúncios cadastradas. </td>
      </tr>";

}else{
  while( $dados = $executa->fetch_assoc() ){


?>

      <tr>
        <td> <?php echo $dados['cod_produto'];?></td>
        <td> <?php echo $dados['categoria_produto'];?></td>
        <td> <?php echo $dados['nome_produto'];?></td>
        <td> <?php echo $dados['preco'];?></td>
        <td><a href="#">Editar</a></td>
      <td><a href="#">Excluir</a></td>
      </tr>
       


<?php 
} // fim do while
} // fim do else
?>

</table>
