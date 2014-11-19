<?
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
     include 'conexion.php';

     /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función
     htmlentities para evitar inyecciones SQL. */
     $myusuario = mysqli_query($conexion, "SELECT user, pass FROM login  WHERE user =  '".htmlentities($_POST["user"])."'");
     $nmyusuario = mysqli_num_rows($myusuario);

     //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario != 0){
          $myclave = mysqli_query($conexion, "SELECT user FROM login WHERE user = '".htmlentities($_POST["user"])."' AND pass = '".htmlentities($_POST["pass"])."'");
          $nmyclave = mysqli_num_rows($myclave);

          //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
          if($nmyclave != 0){
               session_start();
               //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario
               $_SESSION["autentica"] = "SIP";
               $_SESSION["usuarioactual"] = mysql_result($myclave,0,0); //nombre del usuario logueado.
               //Direccionamos a nuestra página principal del sistema.
               echo '<script>location.href = "index.php"</script>';
          }
          else{
                echo '<div class="alert alert-danger" role="alert">El usuario y/o clave son incorrectas, vuelva a intentarlo.</div>';
          }
     }else{
          echo '<div class="alert alert-danger" role="alert">El usuario y/o clave son incorrectas, vuelva a intentarlo.</div>';


     }
     mysqli_close($conexion);
?>
