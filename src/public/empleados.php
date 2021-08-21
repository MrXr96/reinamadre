<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/reinamadre/src/private/init.php';

	$empresas = db_select('SELECT id_empresa, nombre_empresa FROM `empresas`');
	$departamentos = db_select('SELECT * FROM `departamentos`');
?>

<h2 class="mt-3">Empleados</h2>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item">Empleados</li>
	<li class="breadcrumb-item active">Control</li>
</ol>

<form class="form" id="filtros">
	<div class="row" class="bg-light">

		<input type="hidden" name="action" value="setFiltros">
		<div class="col-md-3 col-sm-12">
			<label>Empresa</label>
			<select name="filEmpresa" id="filEmpresa" class="form-select form-select-sm">
				<option value="" selected="">-- Todo --</option>
				<?php foreach ($empresas as $key): ?>
					<option value="<?=$key['id_empresa']?>"> <?=$key['nombre_empresa']?> </option>
				<?php endforeach ?>
			</select>	
		</div>

		<div class="col-md-3 col-sm-12">
			<label>Departamento</label>
			<select name="filDepartamento" id="filDepartamento" class="form-select form-select-sm">
				<option value="" selected="">-- Todo --</option>
				<?php foreach ($departamentos as $key): ?>
					<option value="<?=$key['id_depa']?>"> <?=$key['nombre_depa']?> </option>
				<?php endforeach ?>
			</select>	
		</div>

	<!-- 	<div class="col-md-3 col-sm-12">
			<label>Genero</label>
			<select name="filGenero" id="filGenero" class="form-select form-select-sm">
				<option value="" selected="">-- Todo --</option>
				<option value="m">Masculino</option>
				<option value="f">Femenino</option>
			</select>	
		</div> -->

		<div class="col-md-3 col-sm-12 form-group">
			<label>Búsqueda por Nombre</label>

			<div class="input-group">
				<input type="text" name="filPalabra" id="filPalabra" class="form-control form-control-sm" placeholder="¿Que deseas encontrar?">
				<div class="input-group-append">
					<span class="input-group-text" data-toggle="tooltip" data-placement="bottom" title="Puedes búscar por nombre de empleado"><i class="fa fa-question" aria-hidden="true"></i> </span>
				</div>
			</div>
		</div>
	</div>
</form>
 <hr>

<div class="row">
	<div class="col-sm-12">
		<div class="butons float-end">
			<button class=" btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#ModalEmpleado" onclick="$('#ingreso').removeAttr('readonly'); $('#reset').click(); "> <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo empleado </button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<b class="text-info">empleados (<span id="count"></span>)</b>
		<div class="table-responsive">

			<table class="table table-sm table-boreded table-hover" style="width:98%;" id="mytable">
				<thead>
					<tr>
						<th width="30%">Empleado</th>
						<th width="30%">Área</th>
						<th width="30%">Contacto</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalEmpleado" tabindex="-1" aria-labelledby="ModalEmpleadoLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalEmpleadoLabel">Agregar nuevo empleado</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="formEmpleado">
				<div class="modal-body">
					<input type="hidden" name="action" id="action" value="saveEmpleado">
					<input type="hidden" name="id_empleado" id="id_empleado" value="">
					<input type="hidden" name="id_det_em" id="id_det_em" value="">
					
					<small class="text-primary">Asignación</small>

					<div class="row mt-2">
						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">Empresa</label>
							<select name="empresa" id="empresa" class="form-select form-select-sm" required="">
								<?php foreach ($empresas as $key): ?>
									<option value="<?=$key['id_empresa']?>"> <?=$key['nombre_empresa']?> </option>
								<?php endforeach ?>
							</select>	
						</div>

						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">Departamento</label>
							<select name="departamento" id="departamento" class="form-select form-select-sm" required="">
								<?php foreach ($departamentos as $key): ?>
									<option value="<?=$key['id_depa']?>"> <?=$key['nombre_depa']?> </option>
								<?php endforeach ?>
							</select>	
						</div>

						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">F. de ingreso</label>
							<input type="date" name="ingreso" id="ingreso" class="form-control form-control-sm" required="">
						</div>
					</div>

					<small class="text-primary">Datos personales</small>

					<div class="row mt-2">
						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">Apellido Paterno</label>
							<input type="text" name="apat" id="apat" class="form-control form-control-sm" required="">
						</div>
						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">Apellido Materno</label>
							<input type="text" name="amat" id="amat" class="form-control form-control-sm" required="">
						</div>
						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">Nombre(s)</label>
							<input type="text" name="nombre" id="nombre" class="form-control form-control-sm" required="">
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">F. Nacimiento</label>
							<input type="date" id="birthday" name="birthday" class="form-select form-select-sm" required="">
						</div>
						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">Género</label>
							<select name="genero" id="genero" class="form-select form-select-sm">
								<option value="m">Masculino</option>
								<option value="f">Femenino</option>
							</select>
						</div>
					</div>

					<small class="text-primary">Datos de contacto</small>

					<div class="row mt-2">
						<div class="col-sm-8 col-xs-12">
							<label class="text-muted">email</label>
							<input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="example@testhost.com" required="">
						</div>
						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">Teléfono</label>
							<input type="text" name="tel" id="tel" class="form-control form-control-sm">
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-sm-4 col-xs-12">
							<label class="text-muted">Celular</label>
							<input type="text" name="cel" id="cel" class="form-control form-control-sm">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="dismiss">Close</button>
					<button type="reset" class="btn btn-secondary" id="reset">Reset</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>

			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
		$("#filtros").submit();

		$('#mytable').DataTable( {
	        dom: 'Bfrtip',
	        buttons: [
	            'print'
	        ]
	    } );
	});

	/*----------  Asignación de filtros  ----------*/
	$("#filtros").submit(function(event) {
		event.preventDefault();

		var formData = $(this).serialize();
		$.ajax({
			url: 'src/private/model/empleados.php',
			data: formData,
			method: 'POST',
			beforeSend: function(){
				$('#loader').fadeIn();
			},
			success: function(response){
				getEmpleados();
			},
			error: function(response){
				console.log('error al consultar empleados');
			},
			complete: function(response){
				$('#loader').fadeOut();
			}
		});
	});

	/*----------  Envío de filtros  ----------*/
	$("#filEmpresa, #filDepartamento, #filGenero, #filPalabra").change(function(event) {
		$("#filtros").submit();
	});

	/*----------  BUSCAR de empleados  ----------*/
	function getEmpleados(){
		$.ajax({
			url: 'src/private/model/empleados.php',
			data: {'action' : 'getEmpleados'},
			method: 'POST',
			beforeSend: function(){
				$('#loader').fadeIn();
			},
			success: function(response){
				let empleados = jQuery.parseJSON(response);

				$('#mytable > tbody').empty();
				$("#count").text( empleados.length );
				$.each(empleados, function(index, val) {

					if (val.genero_empleado == "m") sex = "<i class='fa fa-male text-primary'></i> Masculino";
					else sex = "<i class='fa fa-female' style='color:#D414D6'></i> Femenino";

					var lostr = `
					<tr>
						<td>
							<b class="text-muted">${val.empleado}</b> <br>
							<small>
							<i class="fa fa-birthday-cake" aria-hidden="true"></i> ${val.nacimiento_empleado} <br>
							${sex} <br>
							<i class="fa fa-clock" aria-hidden="true"></i> ingreso el ${val.ingreso}
							</small>
						</td>
						<td>
							Empresa: <b>${val.nombre_empresa}</b> <br>
							Departamento: <b>${val.nombre_depa}</b> <br>
						</td>
						<td>
							<i class="fa fa-envelope" aria-hidden="true"></i> ${val.email_empleado} <br>
							<i class="fa fa-phone" aria-hidden="true"></i> ${val.tel_empleado} <br>
							<i class="fa fa-mobile" aria-hidden="true"></i> ${val.cel_empleado} <br>
						</td>
						<td>
							<button class="btn btn-sm btn-primary" title="Modificar empleado" onclick="editEmpleado(${val.id_empleado})"> <i class="fa fa-edit" aria-hidden="true"></i> </button>
							<button class="btn btn-sm btn-danger" title="Borrar empleado" onclick="deleteEmpleado(${val.id_empleado})"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
						</td>
					</tr>
					`;

					$('#mytable > tbody').append(lostr);
				});
			},
			error: function(response){
				console.log('error al consultar empleados');
			},
			complete: function(response){
				$('#loader').fadeOut();
			}
		});
	}

	/*----------  GUARDAR: empleado  ----------*/
	$('#formEmpleado').submit(function(event) {
		event.preventDefault();
		
		var formData = $(this).serialize();
		$.ajax({
			url: 'src/private/model/empleados.php',
			data: formData,
			method: 'POST',
			beforeSend: function(){
				$('#loader').fadeIn();
			},
			success: function(response){
				var result = $.trim(response);

				if (result == "1") {
					getEmpleados();
					$('#reset').click();
					$('#dismiss').click();
				}else{
					alert('No se pudo guardar el registro');
				}
				
			},
			error: function(response){
				console.log('error al consultar empleados');
				alert('No se logro insertar el empleado');
			},
			complete: function(response){
				$('#loader').fadeOut();
			}
		});
	});

	/*----------  ELIMINAR: empleado  ----------*/
	function deleteEmpleado(idEmp){
		if (confirm('¿Deseas eliminar este empleado?')) {
			$.ajax({
				url: 'src/private/model/empleados.php',
				data: {'action':'delete', 'id_empleado':idEmp},
				method: 'POST',
				beforeSend: function(){
					$('#loader').fadeIn();
				},
				success: function(response){
					getEmpleados();
				},
				error: function(response){
					console.log('error al consultar empleados');
					alert('No se logro insertar el empleado');
				},
				complete: function(response){
					$('#loader').fadeOut();
				}
			});
		}
	}

	/*----------  MODIFICAR: empleado  ----------*/
	function editEmpleado(idEmp){
		$.ajax({
			url: 'src/private/model/empleados.php',
			data: {'action':'getData', 'id_empleado':idEmp},
			method: 'POST',
			beforeSend: function(){
				$('#loader').fadeIn();
			},
			success: function(response){
				var emp = jQuery.parseJSON(response);
				
				$('#ingreso').attr('readonly', 'readonly');

				$('#id_det_em').val(emp.id_det_em);
				$('#id_empleado').val(emp.id_empleado);
				$('#ingreso').val(emp.ingreso);
				$('#apat').val(emp.apat_empleado);
				$('#amat').val(emp.amat_empleado);
				$('#nombre').val(emp.nombre_empleado);
				$('#birthday').val(emp.nacimiento_empleado);
				$('#email').val(emp.email_empleado);
				$('#tel').val(emp.tel_empleado);
				$('#cel').val(emp.cel_empleado);

				$("#genero, #empresa, #departamento").find("option:selected").removeAttr("selected");
				$("#genero option[value='"+emp.genero_empleado+"']").attr("selected","selected");
				$("#empresa option[value='"+emp.id_empresa+"']").attr("selected","selected");
				$("#departamento option[value='"+emp.id_depa+"']").attr("selected","selected");

				$("#ModalEmpleado").modal('show');
			},
			error: function(response){
				console.log('error al consultar empleados');
				alert('No se logro consultar la infromación del empleado');
			},
			complete: function(response){
				$('#loader').fadeOut();
			}
		});
	}
</script>