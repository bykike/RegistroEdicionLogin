<html>
	<head>
		<title>Formulario de Registro</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/docs.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/miCSS.css">

	</head>

	<body>
	<?php include "php/navbar.php"; ?>


<?php
#################################################################
# Activo la sesión
#################################################################
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
        #################################################################
        # Leo todo lo que hay en la base de datos MySql
        #################################################################

        include "php/conexion.php";

        $tildes = $con->query("SET NAMES 'utf8'"); # Para que se muestren las tildes correctamente

        ##################################################################
        # Obtener el usuario que se ha logeado
        ##################################################################

						$user_id = $_SESSION["user_id"];
            $consulta_mysql="select * from user where id = $user_id";

            $resultado_consulta_mysql=mysqli_query($con, $consulta_mysql);

             while (($fila = mysqli_fetch_array($resultado_consulta_mysql))!=NULL){

                        $id = $fila["id"];
                        $fullname = $fila["fullname"];
                        $username = $fila["username"];
                        $email = $fila["email"];
                        $password = $fila["password"];
                        $created_at = $fila["created_at"];


                    }

                    # Libero la memoria asociada a result y cierro base de datos
                    mysqli_free_result($resultado_consulta_mysql);
                    mysqli_close($con);


?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" align="left">
            <h1>Editar Usuario</h1>
            <hr>
            <br><br>
                <form action="actualizar.php" method="post">
                    <input type="hidden" size="100%" name="id" value="<?php echo $id;?>">
                    <label>Nombre completo</label>
                    <br />
                    <input type="text" size="75%" name="fullname" value="<?php echo $fullname;?>">
                    <br/>
                    <br/>
                    <label>Usuario</label>
                    <br />
                    <input type="text" size="75%" name="username" value="<?php echo $username;?>">
                    <br/>
                    <br/>
                    <label>Correo</label>
                    <br />
                    <input type="text" size="75%" name="email" value="<?php echo $email;?>">
                    <br/>
                    <br/>
                    <label>Contraseña</label>
                    <br/>
                    <input type="text" size="75%" name="password" value="<?php echo $password;?>">
                    <br/>
                    <br/>
                    <label>Fecha creación</label>
                    <br/>
                    <input type="text" size="75%" name="created_at" value="<?php echo $created_at;?>">
                    <br/>
                    <br/>
                    <input class="btn btn-default" type="submit" value="Actualizar">
                </form>
            <br/>
            <br/>

            <div align="left">
                <!-- Volver apantalla inicial -->
                <br><br>
								<?php echo $_SESSION["user_id"]; ?>
                    <input class="btn btn-default" type="button" value="Volver a inicio" onclick="location.href='home.php'">
                <br><br>
            </div>

        </div>
    </div>
</div>
	</body>
</html>
