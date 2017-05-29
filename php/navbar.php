<meta charset="UTF-8">
<nav class="navbar navbar-default" role="navigation">
<div  class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Barra de Navegador</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
    <a class="navbar-brand" href=""><b>GESTIÓN PERFILES</b></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div align="center" class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <?php if(!isset($_SESSION["user_id"])):?>
        <!-- Deshabilito esto para que cuando entre por primera ver que 
            no está logeado no muestr los apartados -->
        
       <li><a href="./login.php">LOGIN</a></li>
      <li><a href="./registro.php">DARSE DE ALTA</a></li>

      
    <?php else:?>
        <!-- Habilito esto para que cuando entre logeado 
            pueda cambiar la contraseña-->
      <li><a href="./editar.php">EDITAR USUARIO</a></li> 
      <li><a href="./editar.php">EDITAR USUARIO</a></li>
      <li><a href="./php/logout.php">Salir de la sesión</a></li>
    <?php endif;?>
    </ul>

  </div><!-- /.navbar-collapse -->
</div>
</nav>