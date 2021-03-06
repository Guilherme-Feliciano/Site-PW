<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
  <li class="breadcrumb-item active" aria-current="page">Categorias</li>
  </ol>
</nav>
<div class="card mb-5">
   <div class="row card-body">
    <div class="col-sm-9">
      <h4>Categoria</h4>
    </div>

    <div class="col-sm-3">
      <a href="index.php?pg=form-categoria&operacao=cadastrar" title="Nova Categoria">
        <i class="far fa-plus-square"></i> Nova Categoria
      </a>	
    </div>
  </div>
</div>

<?php 
if ( isset($_GET['msg']) ) {
    echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
}
?>

<table class="table table-condensed">
  <thead>
    <tr>
      <th scope="col">cod Categoria</th>
      <th scope="col">Categoria</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>

  <?php 

  // criar a consulta para exibir as categorias
  $sql = "SELECT *, 
          IFNULL( (SELECT COUNT(cod_produto) FROM tbl_produto 
          WHERE categoria_produto=cod_categoria),0 ) AS anuncios FROM tbl_categoria";

  // incluir a conexao
  include("../connection/conexao.php");

  // executar a instrução sql
  $executa = $mysqli->query($sql);

  // obter o número de linhas retornado pela consulta
  $totalLinhas = $executa->num_rows;
  
  // se o total de linhas for menor que 1, exibir uma mensagem para o usuario
  if( $totalLinhas < 1  ){

    echo "<tr>
            <td colspan='4'> Não existem categorias cadastradas. </td>
          </tr>";

  }else{
  
    // obter os dados retornados pela consulta 
    while( $dados = $executa->fetch_assoc() ){
  ?>

    <tr>
      <td scope="col"> <?php echo $dados['cod_categoria'];?> </td>
      <td scope="col"> <?php echo $dados['categoria']; ?> </td>
      <td scope="col">
<a href="index.php?pg=form-categoria&operacao=editar&cod_categoria=<?php echo $dados['cod_categoria'];?>"> 
  <i class="fas fa-edit"></i> Editar
</a>  
      </td>
      <td scope="col">
<!-- ------------------------------------------------------------------------------------------------------ -->
<?php if($dados['anuncios']==0 ){ ?>

<a href="acoes-categoria.php?operacao=excluir&cod_categoria=<?php echo $dados['cod_categoria'];?>"> 
  <i class="fas fa-trash-alt"></i> Excluir 
</a> 

<?php }else{ ?>

  <a href="#" data-toggle="modal" data-target="#modalAlertCategoria">
  <i class="fas fa-trash-alt"></i> Excluir 
  </a>

<?php } ?>
<!-- ------------------------------------------------------------------------------------------------------ -->

      </td>
    </tr>

  <?php  } // fim do while  
       } // fim do else ?>

 </tbody>	
</table>


<!-- Modal -->
<div class="modal fade" id="modalAlertCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atenção!!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Essa categoria já está atribuída a um ou mais anúncios e não pode ser excluída.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>