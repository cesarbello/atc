<?php

  /********************************************************************************************
  *                                                                                           *
  *  Nombre: ATCSISTEM                                                                        *
  *  Descripción: (Almacenes y Transporte Cerealeros C.A Sistema).                            *
  *  Fecha de Creacion: Año 2014 Acarigua, Venezuela.                                         *
  *                                                                                           *
  *  Programador (a): Carballo Jesús <jesusalejandrocarballo@gmail.com>                       *
  *                   Gomez Zoraly   <z-oral-y8@hotmail.com>                                  *
  *                   Montes Daniela <dani.daniela.montes@gmail.com>                          *
  *                   Mogollón José  <josetomas_033@hotmail.com>                              *
  *                   Marcelo Maria  <mary_mvr_272@hotmail.com>                               *
  *                   Sanchez Jesús  <jesussh7@gmail.com>                                     *
  *                                                                                           *
  *  Este programa es software libre, puede redistribuirlo y / o modificar                    *
  *  Bajo los términos de la GNU Licencia Pública General(GPL) publicada por                  *
  *  La Fundación de Software Libre (FSF), en su versión 2 o cualquier versión posterior.     *
  *                                                                                           *
  *  Este programa se distribuye con la esperanza de que sea útil,                            *
  *  Pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de                          *
  *  COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.                               *
  *                                                                                           *
  ********************************************************************************************/

  session_start();
  $msj = isset($_GET['msj']) ? $_GET['msj'] : null ;
  $login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
  if(!$login)
    {
  	 exit('<script> alert("Acceso Denegado!"); window.location.href="../../adsertrans.php" </script>');
  	}
  if($msj)
  	{
  		echo "<script> alert('".$msj."') </script>";
  	}

?>
<html> 
<head> 
    <title>ATCSISTEM</title> 
<script> 
function ponPrefijo(cod, nomco, modelo, tippro, unimed, pesso, nomed, disa){ 
	opener.document.form1.txtcedula.value = cod;
	opener.document.form1.txtnombres_per.value = nomco;
	opener.document.form1.txttelefono_corp_per.value = modelo;
	opener.document.form1.txtidrelacion_unidad.value = tippro;
	opener.document.form1.txtidunidad.value = unimed;
	opener.document.form1.txtplaca_uni.value = pesso;
	opener.document.form1.txtidremolque.value = nomed;
	opener.document.form1.txtplaca_rem.value = disa;
	window.close()	
} 
</script> 
<style type="text/css">
</style>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="../css/maestro.css" type="text/css" rel="stylesheet" />
</head> 

<body style="background:url(../imagenes/fondo2.png);"> 
<h1><?php 
				include("../../modelo/class_conductor.php");
				$objEquipo = new class_conductor();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->flistadoreluni($cod,$nombre);
				if($lista=="99")				
				{	
				?>
				<script> 
					alert("No se han encontrado resultados en la busqueda.");
					
				</script> 
				<script languaje='javascript' type='text/javascript'>window.close();</script>;
				<?php 
				}
				?>
			
</h1> 

	
			<fieldset style="width:470;background:#F7F7F7;" id="formu">
			 <form name=fprefijos>
			  <table border="0"  rules="rows">
    		   <tr>
				<td colspan="5" style="background:url(../imagenes/colores3.jpg);radius: 6px 6px 0px 0px;-moz-border-radius: 6px 6px 0px 0px;-webkit-border-radius : 5px 5px 0px 0px;" width="470"><p style="font-family:arial;color:#FFFFFF;margin:0px 0px 0px 170px;">Seleccione la cedula </p></td>
			   </tr>
			   <tr>
					<td><p style="font-family:arial;">Cedula:</p></td>
					<td ><p style="font-family:arial;">&nbsp Nombre:  </p></td>
					<td ><p style="font-family:arial;">Telefono:  </p></td>
				</tr>
				<tr>
					
					<?php
						if ($lista<0)
							echo "ERROR: no se logro la conexion a la bd";
						else
							for($i=0;$i<count($lista);$i++){
								$codig= $lista[$i][1];
								$nomb = $lista[$i][2];
								$modelo = $lista[$i][3];
								$tippro = $lista[$i][4];
								$unimed = $lista[$i][5];
								$pesso = $lista[$i][6];
								$nomed = $lista[$i][7];
								$disa = $lista[$i][8];
								
							?>
					<td><div align="center">
					  <input name="textfield" type="text"value="<?php echo $codig ?>" size="40" onClick="ponPrefijo(this.value, '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $tippro?>', '<?php echo $unimed?>', '<?php echo $pesso?>', '<?php echo $nomed?>', '<?php echo $disa?>')">
						</div>
					</td>
					<td><div align="center" >
					  <input name="textfield2" type="text" size="120" readonly value="<?php echo $nomb?>" size="15">
					</div></td>
					<td><div align="center" >
					  <input name="textfield4" type="text" size="40" readonly  value="<?php echo $modelo?>" size="15">
					</div></td>
				</tr>
				  <?php }?>
				  
					 
</td></tr>
				</table>
			</form>  <p style="font-family:arial;margin:0px 0px 0px 0px;color:#D90000;"> Para seleccionar un conductor, haga click en el cedula.</p>
			</fieldset>
		</div>
		
 
</body> 
</html> 
