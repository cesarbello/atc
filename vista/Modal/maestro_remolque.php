<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25"> 
	<div class="chat-inner"> 
		<h2 class="chat-header">
			<a href="#" class="chat-close">
				<i class="entypo-cancel"></i>
			</a>
			<i class="entypo-users"></i>Consulta Remolque<span class="badge badge-success is-hidden">0</span></h2> 
			<form method="POST" action="../controlador/ControladorBuscarAjax.php" id="envio_Modal" name="envio_Modal">
				<div class="row">
					<br>
					<div class="form-group col-lg-1"></div>
					<div class="form-group col-lg-10">
						<input type="text" class="form-control" onkeyup="BuscarAjaxremolque(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-2"></div>
					<div class="form-group col-lg-2">
						<input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxremolque('')" name="est1" value="1" id="est1"/> Activo
					</div>
					<div class="form-group col-lg-3">
						<input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxremolque('')" name="est2" value="2" id="est2"/> Relacion Unidad
					</div>
					<div class="form-group col-lg-3"><input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxremolque('')" name="est1" value="0" id="est2"/> Inactivo 
					</div>
				</div>
				</form>
				<?php 
					include_once("../modelo/ModeloBuscarAjax.php"); 
					$obj_estado = new ModeloBuscarAjax();
					$tupla = $obj_estado->ConsultarTodoremolque();
					$c = 1;
					$contenido = "";
				?>
				<div class="chat-group" id="group-1"> 
				<table class="table table-bordered datatable">
					 <thead> 
						<tr>
							<th>Remolque</th> 
							<th>Serial</th>
							<th>Estatus</th>
						</tr> 
					 </thead>			
					<tbody id="datosAjax">
					<?php 
						while($rs = $obj_estado->getremolque($tupla))
						{
							if($rs["estatus_rem"]==1){$status= "Activo";}
								 else{ $status= "Inactivo"; } 
									$id = $rs["idremolque"];
									$des = $rs["serial_rem"];
									$ape = $rs["placa_rem"];
									$est = $rs["estatus_rem"];
									
									
							$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id')>
											<td> ".$rs['idremolque']."</td>
											<td> ".$rs['serial_rem']."</td>
											<td> <span id='".$status."'>".$status." </span></td>
										</tr>";
							$c++; 
						}
						if($contenido!="")
							echo $contenido;
						else
							echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; ?>
					</tbody>
					<input type="hidden" name="ident">
				</table>
				</div>
				<form method='post' name='fmaestro_remolque' action='../controlador/control_maestro_remolque.php'>
				<input type='hidden' name='txtoperacion' value='buscar'>
				<input type='hidden' name='txtidremolque' value=''>
				</form>
			
		</div> 
	</div>
</div>
<script type="text/javascript">
	function EnviarDatos(valor)	{
		lof=document.fmaestro_remolque;
		lof.txtidremolque.value=valor;
		lof.submit();}
</script>
