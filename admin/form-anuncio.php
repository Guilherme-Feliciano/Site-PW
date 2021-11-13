<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?pg=lista-anuncios">Anúncios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro de Anúncio</li>
  </ol>
</nav>

<?php 
$operacao = $_GET['operacao'];

include("../connection/conexao.php");

if ($operacao == 'editar') {
  $cod_produto = $_GET['cod_produto'];

  $sql_produto = "SELECT * FROM tbl_produto WHERE cod_produto=$cod_produto";
  $executa_sql = $mysqli->query($sql_produto);

  $dados = $executa_sql->fetch_assoc();
}

?>

<div class="row">
  <div class="col-sm-4">
    <form action="acoes-anuncio.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="categoria">Categoria do anúncio</label>

        <select name="categoria_produto" class="form-control" required>
          <option value="">Selecione a categoria</option>

          <?php 
          // criar a consulta SQL
          $consultaCategoria = "SELECT * from tbl_categoria ORDER BY categoria ASC";

          $executaConsultaCategoria = $mysqli->query($consultaCategoria);

          $totalLinhasCategoria = $executaConsultaCategoria->num_rows;

          if($totalLinhasCategoria > 0 ){

              while( $categoria = $executaConsultaCategoria->fetch_assoc() ){ 
                
                $selected = "";

                if ($categoria['cod_categoria'] == @$dados['categoria_produto']){
                  
                  $selected = "selected='selected' ";

                }
                
                ?>

                <option value="<?php echo $categoria['cod_categoria'];?>"<?php echo $selected;?> > 
                  <?php echo $categoria['categoria'];?>
                </option>

            <?php  } // fim while

          } // fim do if         
          
          ?>
        </select>

      </div>

      <div class="form-group">
        <label for="nome_produto">Título do anúncio</label>
        <input type="text" name="nome_produto" class="form-control" placeholder="Informe o título para o anúncio" value="<?php echo @$dados['nome_produto'];?>" required>
      </div>

      <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" name="descricao" required><?php echo @$dados['descricao'];?></textarea>
      </div>

      <div class="form-group">
          <label for="preco">Preço</label>
          <input type="text" name="preco" class="form-control" value="<?php echo @$dados['preco'];?>">
      </div>

      <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="file" class="form-control" name="imagem">
      </div>

      <?php 
      if ($operacao == 'ediatar' && strlen(@$dados['imagem']) > 0 ){
          echo "<img src='../imagens/".$dados['imagem']."' width='180' height='180' > <br>";
      }?>

      <input type="hidden" name="operacao" value="<?php echo $operacao;?>">
      
      <!-- Campo para armazenar o código da categoria na operação "editar" -->
      <input type="hidden" name="cod_produto" value="<?php echo @$dados['cod_produto'];?>">

      <input type="hidden" name="nome_imagem" value="<?php echo @$dados['imagem'];?>" >

      <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
  </div>
</div>