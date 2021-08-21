<?php require_once 'src/private/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="@CRojas" />
		<title>ExamenB2_1</title>
		<link href="css/styles.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		
	</head>
	<body class="sb-nav-fixed">
		<div id="loader hideThis"></div>
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<a class="navbar-brand ps-3" href="index.html">Reina Madre Examen</a>
			<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
			<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
				<div class="input-group">
					<!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
					<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
				</div>
			</form>

			<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fas fa-user fa-fw"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
						<li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
						<li><hr class="dropdown-divider" /></li>
						<li><a class="dropdown-item" href="src/private/logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<div id="layoutSidenav">
			<div id="layoutSidenav_nav">
				<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
					<div class="sb-sidenav-menu">
						<div class="nav">
							<div class="sb-sidenav-menu-heading">BASES DE DATOS</div>
							
							<a class="nav-link mymenu" href="empleados">
								<div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div> Empleados
							</a>

							<?php if ($_SESSION['nivel'] == "1"): ?>
								<div class="sb-sidenav-menu-heading">CONFIGURACIÓN</div>
							
								<a class="nav-link mymenu" href="config">
									<div class="sb-nav-link-icon"><i class="fa fa-cogs" aria-hidden="true"></i></div> Usuarios
								</a>	
							<?php endif ?>
							
						</div>
					</div>
					<div class="sb-sidenav-footer text-center">
						<div class="small">Logged in as:</div>
						<?=$_SESSION['email']?>
					</div>
				</nav>
			</div>
			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid px-4" id="mainContainer">
						
					</div>
				</main>

				<footer class="py-4 bg-light mt-auto text-center">
					<div class="container-fluid px-4 ExamenB2_1">
						<div class="d-flex align-items-center justify-content-between small">
							<div class="text-muted">Copyright &copy; ExamenB2_1 2021 powered by @CesarRojas</div> 
						</div>
					</div>
				</footer>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".mymenu").first().click();				
			});

			$(".mymenu").click(function(event) {
				event.preventDefault();

				$(".mymenu").removeClass('active');
				$(this).addClass('active');

				var page = $(this).attr('href');
				$.ajax({
					url: `src/public/${page}.php`,
					beforeSend: function(){
						$('#loader').fadeIn();
					},
					success: function(response){
						$('#mainContainer').html(response);
						$('#mainContainer').fadeIn();
						$('#loader').fadeOut();
					},
					error: function(response){
						$('#mainContainer').html(response);
						$('#mainContainer').fadeIn();
						$('#loader').fadeOut();
					},
					contentType: "application/x-www-form-urlencoded;charset=iso-8859-1"
				});
			});
		</script>
	</body>
</html>
