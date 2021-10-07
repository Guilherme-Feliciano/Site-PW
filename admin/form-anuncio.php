<nav aria-label="breadcrumb">a
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?pg=lista-anuncios">Anúncios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro de Anúncio</li>
  </ol>
</nav>

<?php  

$operacao = $_GET['operacao'];

include("../connection/conexao.php");

?>


<div class="row">
  <div class="col-sm-4">
    <form action="acoes-anuncio.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="categoria">Categoria do anúncio</label>

        <select name="categoria_produto" class="form-control" required>
          <option value="<?php echo @$dados['categoria_produto'];?>">Selecione a categoria</option>

            <?php 
            // criar a consulta sql            
            $consultaCategoria = "SELECT * FROM tbl_categoria ORDER BY categoria ASC";

            $executaConsultaCategoria = $mysqli->query($consultaCategoria);
            
            $totalLinhasCategoria = $executaConsultaCategoria->num_rows;

            if ($totalLinhasCategoria > 0){
              
              while( $categoria = $executaConsultaCategoria->fetch_assoc() ){ ?>
                
                <option value="<?php echo $categoria['cod_categoria'] ; ?>">  
                  <?php echo $categoria['categoria'];?>                  
                </option>

             <?php } // fim do while

            } // fim do if


            
            ?> </select>

      </div> 

      <div class="form-group">
        <label for="nome_produto">Título do anúncio</label>
        <input type="text" name="nome_produto" class="form-control" placeholder="Informe o título para o anúncio" value="<?php echo @$dados['nome_produto'];?>" required>
      </div>

      <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" value="<?php echo @$dados['descricao'];?>" name="descricao" required></textarea>
      </div>

      <div class="form-group">
          <label for="preco">Preço</label>  
          <input type="text" name="preco" class="form-control" value="<?php echo @$dados['preco'];?>">
      </div>


      <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="file" class="form-control" name="imagem">
      </div>

      <input type="hidden" name="operacao" value="<?php echo $operacao;?>">
      
      <!-- Campo para armazenar o código da categoria na operação "editar" -->
      <input type="hidden" name="cod_produto" value="">

      <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
  </div>
</div>