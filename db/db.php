<?php
	function db_connect(){
		static $connection;

		if(!isset($connection)) $connection = mysqli_connect('localhost', 'root', '', 'reinamadre');
		if($connection === false) return mysqli_connect_error();

		return $connection;
	}

	function db_query($query){
		$connection = db_connect();
		
		mysqli_query($connection, "SET NAMES utf8mb4");
		mysqli_query($connection, "SET time_zone = '-06:00'");
		$result = mysqli_query($connection, $query);
		
		return $result;
	}

	function db_select($query){
		$result = db_query($query);
		$rows = array();
		
		if($result === false) return false;
		if(@count($result)) while($row = mysqli_fetch_assoc($result)) $rows[] = $row;
		
		mysqli_free_result($result);
		return $rows;
	}

	function db_error($sql){
		$connection = db_connect();
		$error = mysqli_error($connection);
		echo "p".$error."</p>";
	}

	function db_quote($value){
		$connection = db_connect();
		return mysqli_real_escape_string($connection, $value);
	}

	function db_CleanPost($post){
		foreach($post as $a=>$b) $_POST[$a] = db_quote($b);
	}
?>
