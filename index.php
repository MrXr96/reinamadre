<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>ExamenB2_1</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/custom.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	</head>
	<body class="bg-primary">
		<div id="loader hideThis"></div>
		<div id="layoutAuthentication">
			<div id="layoutAuthentication_content">
				<main>
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-5">
								<div class="card shadow-lg border-0 rounded-lg mt-5">
									<div class="card-header"><h3 class="text-center font-weight-light my-4">Iniciar Sesion</h3></div>
									<div class="card-body">
										
										<div class="alert alert-danger text-center hideThis" id="alerta"></div>

										<form id="formAuth">
											<div class="form-floating mb-3">
												<input class="form-control" id="usuario" name="usuario" type="email" placeholder="name@example.com" required="" />
												<label for="usuario">Email address</label>
											</div>
											<div class="form-floating mb-3">
												<input class="form-control" id="passwd" name="passwd" type="password" placeholder="Password" required="" />
												<label for="passwd">Password</label>
											</div>
											
											<div class="d-grid gap-2">
												<button class="btn btn-primary" type="submit">Login</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
			
			<footer class="py-4 bg-light mt-auto text-center">
				<div class="container-fluid px-4 ExamenB2_1">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; ExamenB2_1 2021 powered by @CesarRojas</div> 
					</div>
				</div>
			</footer>
			
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>

		<script type="text/javascript">
			$("#formAuth").submit(function(event) {
				console.log('entramos');
				event.preventDefault();
				var formData = $(this).serialize();
				
				 $.ajax({
					url: 'src/private/login.php',
					method: "POST",
					data: formData,
					beforeSend : function() {
						$("#loader").show();
					},
					success : function(data) { //se cambia el success por el complete
						var result = $.trim(data);
						if (result == "1") {
							$("#alerta").removeClass('alert-danger');
							$("#alerta").addClass('alert-success');
							$("#alerta").text('Correcto!');
							location.href = "home.php";
						}else{
							$("#alerta").text('Usuario / contraseña incorrecto');
							$("#alerta").show('fast');
						}
					},
					error: function(response){
						console.log('ocurrio un error al hacer login');
					},
					complete: function(){
						$("#loader").hide();
					}
				});
		
			});
		</script>
	</body>
</html>
