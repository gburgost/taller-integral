<?
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
     include 'conexion.php';
     $persona  = $_POST['persona'];
     $desde    = $_POST['desde'];
     $hasta    = $_POST['hasta'];


     if ($persona == "" && $desde == "" && $hasta == "") {

          echo '<br/><div class="alert alert-danger" role="alert">Complete los campos.</div>';

     }
          elseif ($persona == $_POST['persona'] && $desde == "" && $hasta == "")
          {

          list($nombre,$apellido) = explode(" ",$persona);
          /*El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función
          htmlentities para evitar inyecciones SQL.*/
          $myusuario = mysqli_query($conexion, "SELECT * FROM persona  WHERE nombre =  '$nombre'");
          $nmyusuario = mysqli_num_rows($myusuario);

          //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
          if($nmyusuario != 0)
          {
               $consulta="SELECT * FROM persona WHERE nombre = '$nombre'";
               //$myclave = mysqli_query($conexion,$consulta );
               $result = mysqli_query($conexion, $consulta);
               $nmyclave = mysqli_num_rows($result);
               //$result= mysqli_query($conexion, $myclave);

               while ($rowx = mysqli_fetch_array($result))
               {
                    $usu= $rowx['rut_persona'];
                    $usu1= $rowx['nombre'];
                    $usu2= $rowx['apellido'];
               }

               //Si la persona existe se imprimen los datos
               if($nmyclave != 0)
               {
                    echo '<label>Nombre: </label> '.$usu1.' '.$usu2.'.';
                    echo '<br/>';
                    echo '<label>Rut: </label> '.$usu.'.';
                    echo '<a type="button" class="print" href="reporte_historial.php?rut_persona='.$usu.'" target="_blank" aria-label="Left Align">
                           <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                         </a>';
                    echo '<table id="tSearch" class="table table-hover" cellspacing="1"> ';
                    echo '<caption>Registros</caption>';
                    echo '<thead>
                                   <tr>
                                        <th>Fecha Entrada</th>
                                        <th>Fecha Salida</th>
                                        <th>Hora Entrada</th>
                                        <th>Hora Salida</th>
                                   </tr>
                              </thead>';
                    $con = new DB;
                    $historial = $con->conectar();
                    $persona= $usu;
                    $strConsulta =
                     "SELECT registro_persona.fecha_entrada,
                               registro_persona.hora_entrada,
                               registro_persona.fecha_salida,
                               registro_persona.hora_salida,
                               persona.nombre,
                               persona.rut_persona

                    FROM registro_persona
                    Inner Join persona ON registro_persona.rut_persona = persona.rut_persona
                    WHERE persona.rut_persona = '$persona'";

                    $historial = mysql_query($strConsulta);
                    $numfilas = mysql_num_rows($historial);

                    for ($i=0; $i<$numfilas; $i++)
                    {
                         $fila = mysql_fetch_array($historial);

                         if($i%2 == 1)
                         {
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$fila['fecha_entrada']."</td>";
                              echo "<td>".$fila['fecha_salida']."</td>";
                              echo "<td>".$fila['hora_entrada']."</td>";
                              echo "<td>".$fila['hora_salida']."</td>";
                              echo "</tr>";
                         }
                         else
                         {
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$fila['fecha_entrada']."</td>";
                              echo "<td>".$fila['fecha_salida']."</td>";
                              echo "<td>".$fila['hora_entrada']."</td>";
                              echo "<td>".$fila['hora_salida']."</td>";
                              echo "</tr>";
                         }
                    }
                              echo "</tbody>";
                              echo "</table>";
               }
               else
               {
                    echo '<div class="alert alert-danger" role="alert">Completa los campos.</div>';
               }
          }
          else
          {
               echo '<div class="alert alert-danger" role="alert">1.</div>';
          }
          }
     else{

          list($nombre,$apellido) = explode(" ",$persona);

          $ArrayFecha =explode('-', $fechadesde = $_POST['desde']);
          $fechadesde = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

          $ArrayFecha =explode('-', $fechahasta = $_POST['hasta']);
          $fechahasta = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

          /*El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función
          htmlentities para evitar inyecciones SQL.*/
          $myusuario = mysqli_query($conexion, "SELECT * FROM persona  WHERE nombre =  '$nombre'");
          $nmyusuario = mysqli_num_rows($myusuario);

          //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
          if($nmyusuario != 0)
          {
               $consulta="SELECT * FROM persona WHERE nombre = '$nombre'";
               //$myclave = mysqli_query($conexion,$consulta );
               $result = mysqli_query($conexion, $consulta);
               $nmyclave = mysqli_num_rows($result);
               //$result= mysqli_query($conexion, $myclave);

               while ($rowx = mysqli_fetch_array($result))
               {
               $usu= $rowx['rut_persona'];
               $usu1= $rowx['nombre'];
               $usu2= $rowx['apellido'];
               }

               //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
               if($nmyclave != 0)
               {
                    echo '<label>Nombre: </label> '.$usu1.' '.$usu2.'.';
                    echo '<br/>';
                    echo '<label>Rut: </label> '.$usu.'.';
                    echo '<a type="button" class="print" href="reporte_historial.php?rut_persona='.$usu.'&desde='.$fechadesde.'&hasta='.$fechahasta.'" target="_blank" aria-label="Left Align">
                           <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                         </a>';
                    echo '<table id="tSearch" class="table table-hover" cellspacing="1"> ';
                    echo '<caption>Registros</caption>';
                    echo '<thead>
                                   <tr>
                                        <th>Fecha Entrada</th>
                                        <th>Fecha Salida</th>
                                        <th>Hora Entrada</th>
                                        <th>Hora Salida</th>
                                   </tr>
                              </thead>';
                    $con = new DB;
                    $historial = $con->conectar();
                    $persona= $usu;
                    $strConsulta =
                         "SELECT   registro_persona.fecha_entrada,
                                   registro_persona.hora_entrada,
                                   registro_persona.fecha_salida,
                                   registro_persona.hora_salida,
                                   persona.nombre,
                                   persona.rut_persona

                         FROM registro_persona
                         Inner Join persona ON registro_persona.rut_persona = persona.rut_persona
                         WHERE persona.rut_persona = '$persona' AND registro_persona.fecha_entrada >= '$fechadesde' AND registro_persona.fecha_salida <= '$fechahasta'";

                    $historial = mysql_query($strConsulta);
                    $numfilas = mysql_num_rows($historial);

                    for ($i=0; $i<$numfilas; $i++)
                    {
                         $fila = mysql_fetch_array($historial);

                         if($i%2 == 1)
                         {
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$fila['fecha_entrada']."</td>";
                              echo "<td>".$fila['fecha_salida']."</td>";
                              echo "<td>".$fila['hora_entrada']."</td>";
                              echo "<td>".$fila['hora_salida']."</td>";
                              echo "</tr>";
                         }
                         else
                         {
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$fila['fecha_entrada']."</td>";
                              echo "<td>".$fila['fecha_salida']."</td>";
                              echo "<td>".$fila['hora_entrada']."</td>";
                              echo "<td>".$fila['hora_salida']."</td>";
                              echo "</tr>";
                         }
                    }
                              echo "</tbody>";
                              echo "</table>";
               }
               else
               {
                    echo '<div class="alert alert-danger" role="alert">2.</div>';
               }
          }
          else
          {
               echo '<div class="alert alert-danger" role="alert">3</div>';
          }
     }


     mysqli_close($conexion);
?>
