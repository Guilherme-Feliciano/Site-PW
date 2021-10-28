    <!-- Content Header (Page header) -->
    <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Perfil</li>
            </ol>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Perfil</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="row">
    <div class="col-md-4 offset-md-4">

      <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
          <label>Alterar imagem <small>(<i>.jpg .png .bmp</i>)</small></label>
          <input type="file" class="form-control" name="imagem" id="imagem">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-append"> 
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div><input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo" value="<?php echo $_SESSION['nome']; ?>" required>
          
        </div>
        <div class="input-group mb-3">
         <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div> <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" readonly disabled>
          
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-md-2 offset-sm-8">
            <button type="submit" class="btn btn-primary btn-block">Atualizar</button>
          </div>
          <!-- /.col -->
        </div>

       <br> 
         
      </form>
    </div>
    <!-- /.form-box -->
  </div>