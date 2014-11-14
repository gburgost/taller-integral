<?php

	include("conexion.php");
	$rut_persona = $_POST['rut'];
	 date_default_timezone_set("Chile/Continental");
	$fecha=date("d-m-Y");
	$hora=date("H:i:s");

	$myusuario = mysql_query("select rut_persona from persona
                                 where rut_persona =  '".htmlentities($_POST["rut"])."'");
    $nmyusuario = mysql_num_rows($myusuario);



    $lista = mysql_query("select * from lista_negra
    							where rut_persona =  '".htmlentities($_POST["rut"])."'");
    $fila = mysql_fetch_array($lista);
    $lista = mysql_num_rows($lista);
    $motivo = $fila['motivo'];




    if($lista != 0)
    {
    	echo"<script>alert('Persona en la lista negra.\\n Motivo $motivo.');window.location.href=\"index.php\"</script>";


    }

    //Si existe el usuario, validamos también el estado
     elseif($nmyusuario != 0){
          $sql = "select rut_persona
               from registro_persona
               where rut_persona = '".htmlentities($_POST["rut"])."'";
          $myclave = mysql_query($sql);
          $nmyclave = mysql_num_rows($myclave);

          	 if ($nmyclave != 0){
          	 	$sql = "select rut_persona
               	from registro_persona
               	where rut_persona = '".htmlentities($_POST["rut"])."' and estado = 'abierto'";
		          $myclave = mysql_query($sql);
		          $nmyclave = mysql_num_rows($myclave);

		          if ($nmyclave != 0){
		          	echo"<script>alert('No se ha realizado una salida');window.location.href=\"index.php\"</script>";
		          }
		          else
		          {
		          	$estado = "abierto";
          	 	mysql_query("INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida, estado) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '', '$estado' )");
            	echo"<script>alert('Registro de entrada con exito');window.location.href=\"index.php\"</script>";
		          }

          }
          else{

          	$estado = "abierto";
          	 mysql_query("INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida, estado) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '', '$estado' )");
            	echo"<script>alert('Registro de entrada con exito');window.location.href=\"index.php\"</script>";
          }



     }else{
          echo"<script>alert('La persona no existe en la empresa.');window.location.href=\"index.php\"</script>";
     }




	/*



	$consulta = mysql_query("SELECT estado FROM registro_persona WHERE estado = 'cerrado' ");


		mysql_query("INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '' )");
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
