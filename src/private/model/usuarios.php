<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/reinamadre/src/private/init.php';

function setFiltros(){
	db_CleanPost($_POST);

	$_SESSION['filtros'] = "";

	$fil = " AND deleted_at IS NULL ";

	if( isset($_POST['filNivel']) && $_POST['filNivel']!="" ){
		$fil .= " AND nivel = $_POST[filNivel] ";
	}

	if( isset($_POST['filPalabra']) && $_POST['filPalabra']!="" ){
		$fil .= " AND CONCAT(nickname, ' ', email) LIKE '%$_POST[filPalabra]%' ";
	}

	$_SESSION['filtros'] = $fil;
}

function getUsuarios(){
	$sql = " SELECT * FROM `usuarios` WHERE 1 ".$_SESSION['filtros']." ORDER BY created_at DESC ";
	$result = db_select($sql);
	echo json_encode($result);
}

function saveUsuario(){
	db_CleanPost($_POST);

	if (!empty($_POST['id_user']) && $_POST['id_user'] != ""){
		$sql = " SELECT COUNT(*) cuantos FROM `usuarios` WHERE id_user <> $_POST[id_user] AND (nickname = '$_POST[nick]' OR email = '$_POST[email]')  ";
		$result = db_select($sql);
		if ($result[0]['cuantos'] > 0) {
			echo "2";
		}else{
			$sql = " UPDATE `usuarios` SET nivel = '$_POST[nivel]', nickname = '$_POST[nick]', email = '$_POST[email]' WHERE id_user = $_POST[id_user] ";	
			$result = db_query($sql);
			if ($result === false) echo "0"; else echo "1";
		}
	}else{

		$sql = " SELECT COUNT(*) cuantos FROM `usuarios` WHERE nickname = '$_POST[nick]' OR email = '$_POST[email]' ";
		$result = db_select($sql);
		if ($result[0]['cuantos'] > 0) {
			echo "2";
		}else{
			$realPasswd = password_hash( $_POST['passwd'], PASSWORD_BCRYPT);

			$sql = " INSERT INTO `usuarios` SET nivel = '$_POST[nivel]', nickname = '$_POST[nick]', email = '$_POST[email]', passwd = '$realPasswd', created_at = NOW() ";	
			$result = db_query($sql);
			if ($result === false) echo "0"; else echo "1";
		}
	}
}

function delete(){
	$idUss = $_POST['id_user'];
	$sql = " UPDATE `usuarios` SET deleted_at = NOW() WHERE id_user = $idUss ";
	$result = db_query($sql);
	echo "1";
}

function getData(){
	$idUss = $_POST['id_user'];
	$sql = " SELECT * FROM `usuarios` WHERE id_user = $idUss ";
	$result = db_select($sql);
	echo json_encode($result[0]);
}

function changePasswd(){
	if (!empty($_POST['passwd2']) && $_POST['passwd2']!="") {
		$realPasswd = password_hash( $_POST['passwd2'], PASSWORD_BCRYPT);
		
		$sql = " UPDATE `usuarios` SET passwd = '$realPasswd' WHERE id_user = $_POST[id_user2] ";	
		$result = db_query($sql);
		if ($result === false) echo "0"; else echo "1";
	}else{
		echo "0";
	}
	
}

call_user_func($_POST['action']);
?>
