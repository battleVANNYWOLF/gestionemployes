<?php
/* $currentTime=date('m-d-Y',strtotime($registrationTime . "-1 days"))*/
	// connexion a la base de donnees avec la  class PDO//
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "projets";

	try {
		$con = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo"Connection successfully!";
	} catch (Exception $e) {
		echo"Connection Failed" .$e->getMessage();
		
	}
	
	
?>