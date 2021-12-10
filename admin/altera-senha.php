    <!-- Content Header (Page header) -->
    <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Alterar senha</li>
            </ol>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Alterar senha</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="row">
    <div class="col-md-4 offset-md-4">

<?php @session_start();

if ( isset($_GET['erro']) ) {
  
  $dadosForm = $_SESSION['dadosFormulario'];

  $erro = $_SESSION['erro'];

}

if ( isset($_GET['msg']) ) {
  
  $mensagem = $_GET['msg'];

  echo "<div class='alert alert-success'> Senha alterada com sucesso </div>";

}

?>

      <form action="altera-senha-grava.php" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" readonly disabled>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" name="senha_atual" class="form-control" placeholder="Senha atual" 
          value="<?php echo @$dadosForm['senha_atual'];?>"> 
          </div>

        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" name="nova_senha" class="form-control" placeholder="Nova senha" 
          value="<?php echo @$dadosForm['nova_senha'];?>">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" name="confirma_nova_senha" class="form-control" placeholder="Confirmar Nova senha"
          value="<?php echo @$dadosForm['confirma_nova_senha'];?>">
        </div>

<?php 

  if (isset($erro) ) {
    
    echo "<div class='alert alert-danger'> ";

    foreach($erro as $mensagem){

       echo "<p> $mensagem </p>";

    } // fim do foreach

    echo "</div>";

  } // fim do if

?>

        <div class="row">
          <!-- /.col -->
          <div class="col-md-2 offset-sm-8 text-right">
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div>