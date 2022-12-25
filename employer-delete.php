<?php
	session_start();
include('dbcon.php');
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		try {
		$query = "DELETE  FROM employes WHERE id = :id";
		$trait = $con->prepare($query);
		$data = [':id'=> $id];
		$query_execute = $trait->execute($data);
		if ($query_execute)
		{
		 $_SESSION['message'] = "data delete successfully!";
		 header('Location:indextest.php');
		 exit(0);	
		}else{
			$_SESSION['message'] = "Erreur ! data NOT delete";
			header('Location:indextest.php');
			exit(0);
		}
		} catch (PDOException $e)
		 {
			echo $e->getMessage();	
		}
	}



   ?>