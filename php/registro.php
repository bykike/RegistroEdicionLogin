<?php

	if(!empty($_POST)){
		if(isset($_POST["username"]) &&isset($_POST["fullname"]) &&isset($_POST["email"]) &&isset($_POST["password"]) &&isset($_POST["confirm_password"])){
			if($_POST["username"]!=""&& $_POST["fullname"]!=""&&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["password"]==$_POST["confirm_password"]){
				include "conexion.php";

				$found=false;
				$sql1= "select * from user where username=\"$_POST[username]\" or email=\"$_POST[email]\"";
				$query = $con->query($sql1);
				while ($r=$query->fetch_array()) {
					$found=true;
					break;
				}
				if($found){
					print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
				}
				// Genero un randomke
				$random_key = generate_random_key();
				$validated = 0;
				// Meto contenido en la base de datos
				$sql = "insert into user(username, fullname, email, password, created_at, activation_key, validated)
							value (\"$_POST[username]\",\"$_POST[fullname]\",\"$_POST[email]\",\"$_POST[password]\",NOW(),\"$random_key\",\"$validated\")";
				$query = $con->query($sql);
				if($query!=null){
					print "<script>alert(\"Registro exitoso. Proceda a logearse una vez que active la cuenta desde el correo electrónico que recibirá. Asegúrese ver la bandeja de entrada o bien la carpeta de spam.\");window.location='../login.php';</script>";

				$email = $_POST["email"];
				$headers = "From: name@domain.com" . "\r\n" . "CC: name@domain.com";
				// Enviar un mensaje para confirmar la dirección de email introducida
				mail($email,"Activación de la cuenta",
				     "Gracias por registrarse en nuestro sitio.
				     Su cuenta ha sido creada, y debe ser activada antes de poder ser utilizada.
				     Para activar la cuenta, haga click en el siguiente enlace o copielo en la
				     barra de direcciones del navegador:
				     http://www.domain.com/RegistroEdicionLogin/activate.php?activation=".$random_key, $headers);


				}
			}
		}
	}


function generate_random_key() {
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";

    $new_key = "";
    for ($i = 0; $i < 32; $i++) {
        $new_key .= $chars[rand(0,35)];
    }
    return $new_key;
}

?>
