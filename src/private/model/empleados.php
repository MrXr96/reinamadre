<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/reinamadre/src/private/init.php';

function setFiltros(){
	db_CleanPost($_POST);

	$_SESSION['filtros'] = "";

	$fil = " AND deleted_At IS NULL ";

	if( isset($_POST['filEmpresa']) && $_POST['filEmpresa']!="" ){
		$fil .= " AND id_empresa = '$_POST[filEmpresa]' ";
	}

	if( isset($_POST['filDepartamento']) && $_POST['filDepartamento']!="" ){
		$fil .= " AND id_depa = '$_POST[filDepartamento]' ";
	}

	if( isset($_POST['filGenero']) && $_POST['filGenero']!="" ){
		$fil .= " AND genero_empleado = '$_POST[filGenero]' ";
	}

	if( isset($_POST['filPalabra']) && $_POST['filPalabra']!="" ){
		$fil .= " AND empleado LIKE '%$_POST[filPalabra]%' ";
	}

	$_SESSION['filtros'] = $fil;
}

function getEmpleados(){
	$sql = " SELECT * FROM empleados_view WHERE 1 ".$_SESSION['filtros']." ORDER BY created_at DESC ";
	$result = db_select($sql);
	echo json_encode($result);
}

function saveEmpleado(){
	db_CleanPost($_POST);

	// 
	
	if (!empty($_POST['id_empleado']) && $_POST['id_empleado'] != "") {
		$sql = "
			UPDATE `empleados` SET
				apat_empleado = '$_POST[apat]',
				amat_empleado = '$_POST[amat]',
				nombre_empleado = '$_POST[nombre]',
				nacimiento_empleado = '$_POST[birthday]',
				email_empleado = '$_POST[email]',
				genero_empleado = '$_POST[genero]',
				tel_empleado = '$_POST[tel]',
				cel_empleado = '$_POST[cel]'
			WHERE id_empleado = $_POST[id_empleado]
		";
		$result = db_query($sql);

		if (!$result === false) {
			$sql = " UPDATE `det_empleado_empresa` SET id_depa = '$_POST[departamento]', id_empresa = '$_POST[empresa]' WHERE id_det_em = $_POST[id_det_em] ";
			$result = db_query($sql);
			if (!$result === false) echo "1"; else echo "0";
		}else{
			echo "0";
		}

	}else{
		// inserción de empleado
		$sql = "
			INSERT INTO `empleados` SET
				apat_empleado = '$_POST[apat]',
				amat_empleado = '$_POST[amat]',
				nombre_empleado = '$_POST[nombre]',
				nacimiento_empleado = '$_POST[birthday]',
				email_empleado = '$_POST[email]',
				genero_empleado = '$_POST[genero]',
				tel_empleado = '$_POST[tel]',
				cel_empleado = '$_POST[cel]',
				ingreso = '$_POST[ingreso]',
				created_at = 'NOW()'
		";
		$result = db_query($sql);

		if (!$result === false) {
			$result = db_select('SELECT LAST_INSERT_ID() id_empleado');
			$idEmpleado = $result[0]['id_empleado'];

			$sql = " INSERT INTO `det_empleado_empresa` (id_empresa, id_depa, id_empleado) VALUES ('$_POST[empresa]', '$_POST[departamento]', '$idEmpleado') ";
			$result = db_query($sql);
			if (!$result === false) echo "1"; else echo "0";
		}else{
			echo "0";
		}

	}
}

function delete(){
	$idEmpleado = $_POST['id_empleado'];
	$sql = " UPDATE `empleados` SET deleted_at = NOW() WHERE id_empleado = $idEmpleado ";
	$result = db_query($sql);
	echo "1";
}

function getData(){
	$idEmpleado = $_POST['id_empleado'];
	$sql = " SELECT * FROM `empleados_view` WHERE id_empleado = $idEmpleado ";
	$result = db_select($sql);
	echo json_encode($result[0]);
}

call_user_func($_POST['action']);
?>
