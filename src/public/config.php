<h2 class="mt-3">Usuarios</h2>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item">Usuarios</li>
	<li class="breadcrumb-item active">Control</li>
</ol>

<form class="form" id="filtros">
	<div class="row" class="bg-light">

		<input type="hidden" name="action" value="setFiltros">
		
		<div class="col-md-3 col-sm-12">
			<label>Nivel de Usuario</label>
			<select name="filNivel" id="filNivel" class="form-select form-select-sm">
				<option value="" selected="">-- Todo --</option>
				<option value="1"> Administrador </option>
				<option value="2"> Coordinador </option>
			</select>	
		</div>

		<div class="col-md-3 col-sm-12 form-group">
			<label>Búsqueda</label>

			<div class="input-group">
				<input type="text" name="filPalabra" id="filPalabra" class="form-control form-control-sm" placeholder="¿Que deseas encontrar?">
				<div class="input-group-append">
					<span class="input-group-text" data-toggle="tooltip" data-placement="bottom" title="Puedes búscar por nombre de usuario"><i class="fa fa-question" aria-hidden="true"></i> </span>
				</div>
			</div>
		</div>

	</div>
</form>

<hr>

<div class="row">
	<div class="col-sm-12">
		<div class="butons float-end">
			<button class=" btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#ModalUsuario" onclick="$('#reset').click();$('#passwdSecc').show('fast');$('#passwd, #repasswd').attr('required');$('#alert').hide('fast');"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo Usuario </button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<b class="text-info">Usuarios (<span id="count"></span>)</b>
		<div class="table-responsive">

			<table class="table table-sm table-boreded table-hover" style="width:98%;" id="mytable">
				<thead>
					<tr>
						<th width="30%">Usuario</th>
						<th width="30%">Email</th>
						<th width="30%">Nivel</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalUsuario" tabindex="-1" aria-labelledby="ModalUsuarioLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalUsuarioLabel">Agregar nuevo usuario</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="formUsuario">
				<div class="modal-body">
					<input type="hidden" name="action" id="action" value="saveUsuario">
					<input type="hidden" name="id_user" id="id_user" value="">

					<div class="alert alert-warning" id="alert" style="display:none;"></div>

					<div class="row mt-2">
						<div class="col-sm-6 col-xs-12">
							<label class="text-muted">Nivel de usuario</label>
							<select name="nivel" id="nivel" class="form-select form-select-sm" required="">
								<option value="1"> Administrador </option>
								<option value="2"> Coordinador </option>
							</select>	
						</div>

						<div class="col-sm-6 col-xs-12">
							<label class="text-muted">Nick name (usuario)</label>
							<input type="text" name="nick" id="nick" class="form-control form-control-sm" required="">
						</div>

						<div class="col-sm-12 col-xs-12">
							<label class="text-muted">email</label>
							<input type="email" name="email" id="email" class="form-control form-control-sm" required="">
						</div>
					</div>

					<div class="row mt-2" id="passwdSecc">
						<div class="col-sm-12 col-xs-12">
							<label class="text-muted">Contraseña</label>
							<input type="password" name="passwd" id="passwd" class="form-control form-control-sm" required="">
						</div>

						<div class="col-sm-12 col-xs-12">
							<label class="text-muted"> Repite la Contraseña</label>
							<input type="password" name="repasswd" id="repasswd" class="form-control form-control-sm" required="">
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

<div class="modal fade" id="ModalPasswd" tabindex="-1" aria-labelledby="ModalPasswdLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalPasswdLabel">Cambiar contraseña</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="formPasswd">
				<div class="modal-body">
					<input type="hidden" name="action" id="action2" value="changePasswd">
					<input type="hidden" name="id_user2" id="id_user2" value="">

					<div class="alert alert-warning" id="alert2" style="display:none;"></div>

					<div class="row mt-2">
						<div class="col-sm-12 col-xs-12">
							<label class="text-muted">Contraseña</label>
							<input type="password" name="passwd2" id="passwd2" class="form-control form-control-sm" required="">
						</div>

						<div class="col-sm-12 col-xs-12">
							<label class="text-muted"> Repite la Contraseña</label>
							<input type="password" name="repasswd2" id="repasswd2" class="form-control form-control-sm" required="">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>

			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
		$("#filtros").submit();
	});

	/*----------  Asignación de filtros  ----------*/
	$("#filtros").submit(function(event) {
		event.preventDefault();

		var formData = $(this).serialize();
		$.ajax({
			url: 'src/private/model/usuarios.php',
			data: formData,
			method: 'POST',
			beforeSend: function(){
				$('#loader').fadeIn();
			},
			success: function(response){
				getUsuarios();
			},
			error: function(response){
				console.log('error al consultar usuarios');
			},
			complete: function(response){
				$('#loader').fadeOut();
			}
		});
	});

	/*----------  Envío de filtros  ----------*/
	$("#filNivel, #filPalabra").change(function(event) {
		$("#filtros").submit();
	});

	/*----------  BUSCAR de usuarios  ----------*/
	function getUsuarios(){
		$.ajax({
			url: 'src/private/model/usuarios.php',
			data: {'action' : 'getUsuarios'},
			method: 'POST',
			beforeSend: function(){
				$('#loader').fadeIn();
			},
			success: function(response){
				let usuarios = jQuery.parseJSON(response);

				$('#mytable > tbody').empty();
				$("#count").text( usuarios.length );
				$.each(usuarios, function(index, val) {

					if (val.nivel == 1) level = "Administrador"; else level = "Coordinador";

					var lostr = `
					<tr>
						<td>
							<b class="text-muted">${val.nickname}</b>
						</td>
						<td>
							${val.email}
						</td>
						<td>
							${level}
						</td>
						<td>
							<button class="btn btn-sm btn-primary" title="Modificar usuario" onclick="editUsuarios(${val.id_user})"> <i class="fa fa-edit" aria-hidden="true"></i> </button>
							<button class="btn btn-sm btn-warning" title="Cambiar contraseña" onclick="changepass(${val.id_user})"> <i class="fa fa-key" aria-hidden="true"></i> </button>
							<button class="btn btn-sm btn-danger" title="Borrar usuario" onclick="deleteUsuarios(${val.id_user})"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
						</td>
					</tr>
					`;

					$('#mytable > tbody').append(lostr);
				});
			},
			error: function(response){
				console.log('error al consultar usuarios');
			},
			complete: function(response){
				$('#loader').fadeOut();
			}
		});
	}

	/*----------  GUARDAR: usuario  ----------*/
	$('#formUsuario').submit(function(event) {
		event.preventDefault();
		
		if (confirm('¿Deseas guardar los cambios?')) {
			var band = true;
			var formData = $(this).serialize();
			var passwd = $('#passwd').val();
			var repasswd = $('#repasswd').val();

			if (passwd != 0) {
				if (passwd != repasswd) {
					band = false;
					$('#passwd').addClass('is-invalid');
					$('#repasswd').addClass('is-invalid');
					$('#alert').text('Las contraseñas no son iguales');
					$('#alert').show('fast');
				}else{
					$('#passwd').removeClass('is-invalid');
					$('#repasswd').removeClass('is-invalid');
				}
			}

			if (band) {
				$.ajax({
					url: 'src/private/model/usuarios.php',
					data: formData,
					method: 'POST',
					beforeSend: function(){
						$('#loader').fadeIn();
					},
					success: function(response){
						var result = $.trim(response);

						if (result == "1") {
							getUsuarios();
							$('#reset').click();
							$('#dismiss').click();
						}else if (result == "2") {
							$('#alert').text('ya hay un usuario registrado con el mismo nickname ó email, prueba con uno diferente');
							$('#alert').show('fast');
						}else{
							$('#alert').text('No se pudo guardar el registro');
							$('#alert').show('fast');
						}
						
					},
					error: function(response){
						console.log('error al consultar usuarios');
						alert('No se logro insertar el usuario');
					},
					complete: function(response){
						$('#loader').fadeOut();
					}
				});
			}
		}
	});

	/*----------  ELIMINAR: usuario  ----------*/
	function deleteUsuarios(idUs){
		if (confirm('¿Deseas eliminar este usuario?')) {
			$.ajax({
				url: 'src/private/model/usuarios.php',
				data: {'action':'delete', 'id_user':idUs},
				method: 'POST',
				beforeSend: function(){
					$('#loader').fadeIn();
				},
				success: function(response){
					getUsuarios();
				},
				error: function(response){
					console.log('error al consultar usuarios');
					alert('No se logro insertar el usuario');
				},
				complete: function(response){
					$('#loader').fadeOut();
				}
			});
		}
	}

	/*----------  MODIFICAR: usuario  ----------*/
	function editUsuarios(idUs){
		$('#passwdSecc, #alert').hide('fast');
		$('#passwd, #repasswd').removeAttr('required');

		$.ajax({
			url: 'src/private/model/usuarios.php',
			data: {'action':'getData', 'id_user':idUs},
			method: 'POST',
			beforeSend: function(){
				$('#loader').fadeIn();
			},
			success: function(response){
				var uss = jQuery.parseJSON(response);
				
				$('#id_user').val(uss.id_user);
				$('#nick').val(uss.nickname);
				$('#email').val(uss.email);

				$("#nivel").find("option:selected").removeAttr("selected");
				$("#nivel option[value='"+uss.nivel+"']").attr("selected","selected");

				$("#ModalUsuario").modal('show');
			},
			error: function(response){
				console.log('error al consultar usuarios');
				alert('No se logro consultar la infromación del usuario');
			},
			complete: function(response){
				$('#loader').fadeOut();
			}
		});
	}

	function changepass(idUss){
		$('#formPasswd')[0].reset();
		$("#id_user2").val(idUss);
		$('#ModalPasswd').modal('show');
		$('#alert2').hide('fast');
	}

	$("#formPasswd").submit(function(event) {
		event.preventDefault();

		var band = true;
		var formData = $(this).serialize();
		var passwd = $('#passwd2').val();
		var repasswd = $('#repasswd2').val();

		if (passwd != repasswd) {
			band = false;
			$('#passwd2').addClass('is-invalid');
			$('#repasswd2').addClass('is-invalid');
			$('#alert2').removeClass('alert-success');
			$('#alert2').addClass('alert-warning');
			$('#alert2').text('Las contraseñas no son iguales');
			$('#alert2').show('fast');
		}else{
			$('#passwd2').removeClass('is-invalid');
			$('#repasswd2').removeClass('is-invalid');
		}

		if (band) {
			$.ajax({
				url: 'src/private/model/usuarios.php',
				data: formData,
				method: 'POST',
				beforeSend: function(){
					$('#loader').fadeIn();
				},
				success: function(response){
					var result = $.trim(response);

					if (result == "1") {
						$('#alert2').removeClass('alert-warning');
						$('#alert2').addClass('alert-success');
						$('#alert2').text('Se cambió correctamente la contraseña');
						$('#alert2').show('fast');
					}else if (result == "2") {
						$('#alert2').removeClass('alert-success');
						$('#alert2').addClass('alert-warning');
						$('#alert2').text('ya hay un usuario registrado con el mismo nickname ó email, prueba con uno diferente');
						$('#alert2').show('fast');
					}else{
						$('#alert2').removeClass('alert-success');
						$('#alert2').addClass('alert-warning');
						$('#alert2').text('No se pudo guardar el registro');
						$('#alert2').show('fast');
					}
					
				},
				error: function(response){
					console.log('error al consultar usuarios');
					alert('No se logro insertar el usuario');
				},
				complete: function(response){
					$('#loader').fadeOut();
				}
			});
		}
	});
</script>