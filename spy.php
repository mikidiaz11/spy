<?php
	if($_REQUEST){
		
		$mysqli = new mysqli("localhost", "root", "", "daw", 33060);
		
		if(!$mysqli || $mysqli->connect_errno){
			die("<h2>error connecting to database</h2>");
		}
		
		$origen = $_GET["origen"];
		$destino = $_GET["destino"];
		$query = "INSERT INTO enlaces(origen,destino) VALUES ('$origen','$destino');";

		$result = $mysqli->query($query);
	}

	header('Location: http://'.$_GET["destino"]);
	exit;
?>