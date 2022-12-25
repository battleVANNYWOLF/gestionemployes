<?php
	session_start();
	include"C:/wamp64/www/test01/dbcon.php"; 

	if (isset($_POST['Save_form_btn']))
	 {
	 	// declaration des variables 
		$idpersonnel = $_POST['idpersonnel'];
		$nom_complet = $_POST['nom_complet'];
		$sexe = $_POST['sexe'];
		$poste = $_POST['poste'];
		$adresse = $_POST['adresse'];
		$telephone = $_POST['telephone'];
		$statut = $_POST['statut'];

		$query = "INSERT INTO employes(idpersonnel,nom_complet,sexe,poste,adresse,telephone,statut) VALUES(:idpersonnel,:nom_complet,:sexe,:poste,:adresse,:telephone,:statut)";
		$run = $con->prepare($query);

		$data = [':idpersonnel'=> $idpersonnel,
					':nom_complet'=> $nom_complet,
					':sexe'=> $sexe,
					':poste'=> $poste,
					':adresse'=> $adresse,
					':telephone'=> $telephone,
					':statut' => $statut];
		$query_execute = $run->execute($data);

		if($query_execute)
		{
			// si la requette est correctement executer on affiche un message de confirmation
			$_SESSION['message'] = "Donnees Enregister avec success!";
			header('Location: indextest.php');
				exit(0);
		}
		else
		{
			$_SESSION['message'] = "Erreur d'enregistrement des donnees!";
			header('Location: indexac.php');
				exit(0);
		}
	}
		

		/*$date_reg = $_POST['date_reg'];*/
		
		

	/*	$query = "INSERT INTO user_piasoft(idp,name,sexe,poste,adresse,tel,statut) VALUES(:idp, :name,  :sexe, :poste, :adresse, :tel, :statut)";
		$query_run = $con->prepare($query);
		$data = [
			':idp'=> $idp,
			':name'=> $name,
			':sexe'=> $sexe,
			':poste'=> $poste,
			':adresse'=> $adresse,
			':tel'=> $tel,
			':statut'=> $statut,
			/*':date_reg' => $date_reg,];*/
		/*var_dump($query);
		die();*/
		/*$query_execute = $query_run->execute();

		if ($query_execute)
		 {
			// si la requette est correctement executer on affiche un message de confirmation
			$_SESSION['message'] = "Donnees Enregister avec success!";
			header('Location: indextest.php');
				exit(0);
		}else{
			$_SESSION['message'] = "Erreur d'enregistrement des donnees!";
			header('Location: indexac.php');
				exit(0);
		}
	}


	/*if(!isset($_POST['Envoyer'])){
	require("classform.php");
	$sc = new Formprocess($id_p='',$name='',$sexe='',$poste='',$adresse='',$tel='', $statut='');
	$sc->InsertUser();
}
if(!isset($_POST['save'])){
	require("classform.php");
	$sc = new Formprocess($id_p='',$name='',$sexe='',$poste='',$adresse='',$tel='', $statut='');
	$sc->readOne();
}
if(!isset($_POST['save'])){
	require("classform.php");
	$sc = new Formprocess($idp='',$name='',$sexe='',$poste='',$adresse='',$tel='',$statut='');
	$sc->();
}*/



?>