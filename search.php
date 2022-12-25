<?php
	include"./dbcon.php";
	$allusers = $con->query('SELECT * FROM employes ORDER BY id DESC');

	if(isset($_POST['search']) && !empty($_POST['search']))
	{
		$rech = htmlspecialchars($_POST['search']);
		$traitement = $con->query("SELECT  FROM employes WHERE nom_complet LIKE "%'.$rech.'%" ORDER BY id DESC");
		

	}

    ?>