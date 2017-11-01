<?php


		$codactivacion = $_GET['activation'];
		// $codactivacion = "l1lxuui1pffubamjwa5n94kyxvowyb5a";

		include "php/conexion.php";

				$found=false;
				$sql1= "select * from user where activation_key=\"$codactivacion\"";
				$query = $con->query($sql1);
				while ($r=$query->fetch_array()) {
					$found=true;
					$miID = $r['id'];
					break;
				}

		if($found){
			//print "<script>alert(\"El código de activación existe, procedo a la validación.\");window.location='../index.php';</script>";

			$validated = 1;
			// Meto contenido en la base de datos
			$sql = "update user set validated='$validated' WHERE id='$miID'";


			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Validación exitosa. Proceda a logearse\");window.location='./login.php';</script>";
				}
				
				// Obtengo la dirección de correo para enviar el aviso
				$sql1= "select * from user where activation_key=\"$codactivacion\"";
				$query = $con->query($sql1);
				while ($r=$query->fetch_array()) {
					$found=true;
					$email = $r['email'];
					break;
				}

				//$email = $_POST["email"];
				$headers = "From: name@domain.com";
				
			// Enviar un mensaje para confirmar la dirección de email introducida
			mail($email,"Cuenta activada", "Ya puede acceder a su cuenta ya que ha sido verificada y activada. http://www.domain.com/login.php", $headers);

			}

?>
