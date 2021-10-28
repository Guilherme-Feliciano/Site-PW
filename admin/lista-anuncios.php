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

<!-- receber e exibir a mensagem que está sendo enviada via GET  -->

<?php
if (isset($_GET['msg'])) {
  echo "<div class='alert alert-success'>" . $_GET['msg'] . "</div>";
}


  $cod_login = $_SESSION['cod_login'];  

  // criar a consulta para exibir as categorias
  $sql = " SELECT * FROM tbl_produto WHERE produto_usuario='$cod_login' ";

  // incluir a conexao
  include("../connection/conexao.php");

  // executar a instrução sql
  $executa = $mysqli->query($sql);

  // obter o número de linhas
  $totalLinhas = $executa->num_rows;

  if ($totalLinhas < 1) {
    echo "<div class='row'>
            <div class='col-sm-6'> Não existem anúncios cadastrados. </div>
          </div>";
  } else {

    while ($dados = $executa->fetch_assoc()) { ?>

      <div class="row border-bottom">
        <div class="col-sm-3"> imagem </div>
        <div class="col-sm-7"> 
          <p> Categoria </p>
          <p><?php echo '#'.$dados['cod_produto'].' - '.$dados['nome_produto'];?> </p>
          <p>R$ <?php echo $dados['preco'];?> </p>
        </div>  
        <div class="col-sm-1 text-right"><a href="#"><i class="fas fa-edit"></i> Editar</a></div>
        <div class="col-sm-1"><a href="#"><i class="fas fa-trash-alt"></i> Excluir</a></div>
      </div>

  <?php } // fim do while

  } // fim do else

  ?>
