<!--abra que llamar los archivos aqui siempre-->
<?php include_once("componentes_alberto.php"); ?>






<?php //include_once('controlador/cortmecanico.php'); ?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Gestionar mecanico</div>


<form action=''  id='formulario_maestro' method='POST'>

<table width='100%' id='formulario_persona'><tr>
 <td><span style="color:red;">*</span>Cedula</td>
 <td><input type='text' id="cedula_chofer" style='width:80%; float:left;' maxlength='8' class='solocedula <?php if($existe!='yes') print('campo campoclave'); ?>'  name='cedula' value='<?php print($rows["cedula"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'></td>
</tr>

<tr>
 <td><span style="color:red;">*</span>Nombre</td>
 <td>
 	<input type='text' style='float:left;' class='sololetras campo'  name='nombre1' value='<?php print($rows["nombre1"]); ?>' >
 </td>
</tr>

<tr>
 <td>Segundo nombre</td>
 <td><input type='text' class='sololetras nobligatorio campo'  name='nombre2' value='<?php print($rows["nombre2"]); ?>' ></td>
</tr>

<tr>
 <td><span style="color:red;">*</span>Apellido</td>
 <td><input type='text' class='sololetras campo'  name='apellido1' value='<?php print($rows["apellido1"]); ?>' ></td>
</tr>

<tr>
 <td>Segundo Apellido</td>
 <td><input type='text' class='sololetras nobligatorio campo'  name='apellido2' value='<?php print($rows["apellido2"]); ?>' ></td>
</tr>

<tr>
 <td><span style="color:red;">*</span>sexo</td>
 <td>
 	<select name="sexo" class="solovacio campo">
 		<option value="">Seleccione el sexo</option>
 		<option <?php if($rows['sexo']=="M") print("selected"); ?> value="M">Masculino</option>
 		<option <?php if($rows['sexo']=="F") print("selected"); ?> value="F">Femenino</option>
 	</select>
 </td>
</tr>

<tr>
 <td><span style="color:red;">*</span>Fecha de nacimiento</td>
 <td><input type='text' id="fecha_nacimiento" onchange="obtener_edad(this)" class='solofecha2 fecha_piker campo'  name='fecha_naci' value='<?php print($rows["fecha_naci"]); ?>' ></td>
</tr>

<tr>
 <td><span style="color:red;">*</span>Estado Civil</td>
  <td>
 	<select name="estado_civil" class="solovacio campo">
 		<option value="">Estado civil</option>
 		<option <?php if($rows['estado_civil']=="1") print("selected"); ?> value="1">Casado</option>
 		<option <?php if($rows['estado_civil']=="2") print("selected"); ?> value="2">Soltero</option>
 		<option <?php if($rows['estado_civil']=="3") print("selected"); ?> value="3">Viudo</option>
 	</select>
 </td>
</tr>

<tr>
<td>
<span style="color:red;">*</span>Parroquia</td>
<td>
  </td>
</tr>

<tr>
 <td><span style="color:red;">*</span>Direccion</td>
 <td><textarea class='letranumeros campo' name='direccion'><?php print($rows["direccion"]); ?></textarea></td>
</tr>

<tr>
 <td><span style="color:red;">*</span>Telefono</td>
 <td><input type='text' class='solotelefono campo'  name='telefono' value='<?php print($rows["telefono"]); ?>' ></td>
</tr>

<tr>
 <td><span style="color:red;">*</span>Correo</td>
 <td><input type='text' class='solocorreo'  name='correo' value='<?php print($rows["correo"]); ?>' ></td>
</tr>

</table>
<ol id='botonera'>
<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
<li><input type='submit'  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
<li><input type='submit' class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>
<li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
<li><input type='submit' class="cancelar"  name='cancelar'   value='cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>
</ol>






<!--ventana modal aqui-->
<!--aqui estara la ventana modal-->
<!--aqui crearemos la ventana modal, esta ventana se traera todos los datos al momento de buscar en un maestro-->
<div id="ventana_modal" style="position:fixed !important; top:-200 !important;">
  <h1 id="tabla_modal">Lista de mecanicos</h1>
  <div id="busqueda_modal">
    <label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
  </div>

  <div style="height:400px; overflow:auto;">
  <table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
    <tr>
      <th>Cedula</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Fecha de nacimiento</th>
      <th>Buscar</th>
    </tr>
    <?php
      include_once("modelo/clstpersona.php");
      $lista_persona = new clstpersona();
      $lista_persona->listar_mecanico();
      while($lista = $lista_persona->row()){ 
     ?>

     <tr>
      <td><?php print($lista['cedula']); ?></td>
      <td><?php print($lista['nombre1'].' '.$lista['nombre2']); ?></td>
      <td><?php print($lista['apellido1']." ".$lista['apellido2']); ?></td>
      <td><?php print($lista['fecha_naci']); ?></td>
      <td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

    </tr>
     <?php } ?>
    
  </table>
</div>
</div>
<!--ciere de la ventana modal-->











</form>
</div>

<?php if($msj){ ?>   <script> alert("<?php print($msj); ?>"); </script>   <?php  };  ?>




<script type="text/javascript">


//funcion para calcular la fecha

	
function obtener_edad(e)

{

    var fecha= e.value;


        // Si la fecha es correcta, calculamos la edad

        var values=fecha.split("-");

        var dia = values[2];

        var mes = values[1];

        var ano = values[0];

 

        // cogemos los valores actuales

        var fecha_hoy = new Date();

        var ahora_ano = fecha_hoy.getYear();

        var ahora_mes = fecha_hoy.getMonth()+1;

        var ahora_dia = fecha_hoy.getDate();





        // realizamos el calculo

        var edad = (ahora_ano + 1900) - ano;

        if ( ahora_mes < mes )

        {

            edad--;

        }

        if ((mes == ahora_mes) && (ahora_dia < dia))

        {

            edad--;

        }

        if (edad > 1900)

        {

            edad -= 1900;

        }

 

        // calculamos los meses

        var meses=0;

        if(ahora_mes>mes)

            meses=ahora_mes-mes;

        if(ahora_mes<mes)

            meses=12-(mes-ahora_mes);

        if(ahora_mes==mes && dia>ahora_dia)

            meses=11;

 

        // calculamos los dias

        var dias=0;

        if(ahora_dia>dia)

            dias=ahora_dia-dia;

        if(ahora_dia<dia)

        {

            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);

            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);

        }


        //document.getElementById("result").innerHTML="Tienes "+edad+" años, "+meses+" meses y "+dias+" días";
       if(edad>=20){
       	//no pasa nada
       }else{
       		alert("la persona debe tener minimo 20 años de edad");	
       		document.getElementById("fecha_nacimiento").value = "";
       		document.getElementById("fecha_nacimiento").focus();

       }

}








</script>