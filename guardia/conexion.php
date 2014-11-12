<?php
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db = "mpc";

		$conexion=mysql_connect($host, $user, $pass);
		mysql_select_db($db);

		$query = "SELECT * FROM empleado";
		$empleados = mysql_query($query, $conexion);

		$rt = "SELECT * FROM persona";
		$persona = mysql_query($rt, $conexion);





class DB{
	var $conect;

	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	function DB(){
		$this->BaseDatos = "mpc";
		$this->Servidor = "localhost";
		$this->Usuario = "root";
		$this->Clave = "root";
	}

	 function conectar() {
		if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
			echo"<h1> [:(] Error al conectar a la base de datos</h1>";
			exit();
		}
		if (!@mysql_select_db($this->BaseDatos,$con)){
			echo "<h1> [:(] Error al seleccionar la base de datos</h1>";
			exit();
		}
		$this->conect=$con;
		return true;
	}
}


?>
