<?php

	include("conexion.php");

	date_default_timezone_set("Chile/Continental");
	$rut_persona = $_POST['rut'];
	$fecha=date("d-m-Y");
	$hora=date("H:i:s");
	mysql_query("SELECT * FROM registro_persona WHERE rut_persona ='$rut_persona'");

	$myusuario = mysql_query("select rut_persona from persona
                                 where rut_persona =  '".htmlentities($_POST["rut"])."'");
    $nmyusuario = mysql_num_rows($myusuario);
    //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario != 0){
          $sql = "select *
               from registro_persona
               where rut_persona = '".htmlentities($_POST["rut"])."'
               and estado = 'abierto'";
          $myclave = mysql_query($sql);
          $nmyclave = mysql_num_rows($myclave);
          $fila = mysql_fetch_array($myclave);


          if ($nmyclave != 0){
          	$estado = "abierto";
          	mysql_query("UPDATE registro_persona SET fecha_salida = '$fecha', hora_salida = '$hora', estado = 'cerrado' WHERE rut_persona = '$rut_persona' and estado ='$estado' ");
          	echo"<script>alert('Registro de salida con exito');window.location.href=\"index.php\"</script>";
          }
          else{
          	echo"<script>alert('No se ha realizado una entrada');window.location.href=\"index.php\"</script>";
          }

     }else{
          echo"<script>alert('La persona no existe en la empresa.');window.location.href=\"index.php\"</script>";
     }





/*


	mysql_query("UPDATE registro_persona SET fecha_salida = '$fecha', hora_salida = '$hora' WHERE rut_persona = '$rut_persona'");


		echo "<script>
              alert('Registro realizado con exito');
              location.href='index.php';</script>";


		echo "<h1>Entradas</h1>";
		echo "Tus datos son los siguientes: <br /><br /> Nombre: $nombre<br />Email: $email<br /><br />Fecha Entrada: $fechaentrada  <br /> Hora entrada: $horaentrada <br />";
		echo "<button><a href='entrada.html'>Volver</a></button>";


class conexion{

		function recuperarDatos(){
			include("conexion.php");
			$query= "SELECT * FROM entrada";
			$resultado = mysql_query($query);

			while($fila = mysql_fetch_array($resultado))
			{
				echo "<br/>Nombre: $fila[Nombre] <br/>";
				echo "Rut: $fila[Rut]<br/>";
				echo "Fecha y Hora: $fila[Fechaentrada]<br/>";
				echo "Hora: $fila[Horaentrada]<br/>";

			}

		}
	}

$con= new conexion();
$con ->recuperarDatos();
*/



?>
</body>
</html>
