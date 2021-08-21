<?php
	require $_SERVER['DOCUMENT_ROOT'].'/reinamadre/db/db.php';
	session_start();

	db_CleanPost($_POST);

	$usuario = $_POST['usuario'];
	$passwd = $_POST['passwd'];

	$user = db_select("SELECT passwd, email, nickname, nivel FROM usuarios WHERE email = '$usuario' AND deleted_at IS NULL ");
	if (!$user === false) {

		$realPasswd = $user[0]['passwd'];

		if(password_verify($passwd, $realPasswd)){
			$_SESSION['isLoged'] = true;
			$_SESSION['email'] = $user[0]['email'];
			$_SESSION['nickname'] = $user[0]['nickname'];
			$_SESSION['nivel'] = $user[0]['nivel'];
            echo "1";
        }else{
        	echo "0";
        }
	}
?>