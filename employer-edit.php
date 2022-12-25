<?php
	session_start();
	require('dbcon.php');

 ?>
 <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TEST00</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.js">
</head>
<body class="bg-transparent justify-content-center col-md-12 mt-4">
	<!-- barre de navigation -->
	<?php if(isset($_SESSION['message'])) :  ?>
		<h5 class="alert alert-success justify-content-center"><?= $_SESSION['message']; ?></h5>
		<?php
			unset($_SESSION['message']);
		 endif; ?>
	 
    <nav class="form-control-lg">
	<div class="form-control">
		<div class="form-control-lg bg-primary">
			<?php
			if (isset($_GET['id']))
			{
				$id = $_GET['id'];
				$query = "SELECT * FROM employes WHERE id=:id LIMIT 1";
				$trait = $con->prepare($query);
				$data = [':id'=>$id];
				$trait->execute($data);
				$result = $trait->fetch(PDO::FETCH_OBJ);	
			}
			     ?>
			<h1 class="row justify-content-center text-white">Salut a vous  !</h1>
			<p class="row justify-content-center text-white">Update employer</p>
			<div class="row justify-content-around">
			</div>
			</div>
	<div class="container justify-content-center ">
	<div class="col-lg-10 ">	
	<div class="card">
			<form action="process.php" method="POST" class="fw-bolder text-center">
				<H2 class="card bg-success text-white">Update</H2><br>
				<input type="hidden" name="id" value="<?= $result->id;?>">
				<label class="from-label">IDpersonnel</label>
				<input type="text" value="<?= $result->idpersonnel; ?>" class="form-control mb-3" name="idpersonnel" placeholder="Identifiant..." required><br>
				<label class="from-label">NOM</label>
				<input type="text" value="<?= $result->nom_complet;?>" class="form-control mb-3" name="nom_complet" placeholder="Nom..." required><br>
				<label class="from-label">Sexe</label>
				<select class="form-control mb-3" name="sexe" id="sexe">
				<option class="form-control mb-3" value="M">Masculin</option>
			<option class="form-control mb-3" value="F">Feminin</option>
    </select>
				<br>
				<label class="from-label">Poste</label>
				<input type="text" value="<?= $result->poste;?>" class="form-control mb-3" name="poste" placeholder="" required><br>
				<label class="from-label">Adresse</label>
				<input type="text" value="<?= $result->adresse;?>" class="form-control mb-3" name="adresse" placeholder="ville.. quartier" required><br>
				<label class="from-label">Telephone</label>
				<input type="telephone" value="<?= $result->telephone; ?>" class="form-control mb-3" name="telephone" placeholder="Number phone" required><br>
				<label class="from-label">Statut</label>
				<select class="form-control mb-3" name="statut" id="sexe">
				<option class="form-control mb-3" value="ENTRER">ENTRER</option>
			<option class="form-control mb-3" value="SORTIR">SORTIR</option>
    </select>
				<!--<label class="from-label">Statut</label>
				<input type="text"class="form-control mb-3" name="statut" placeholder="ville.. quartier" required> <br>
				<label class="from-label">date d'enregistrement</label>
				<input type="date"class="form-control mb-3" name="date_reg" placeholder=" matricule A1..." required>--><br>
				<input class="btn btn-primary form-control mb-3" type="submit" name="Save_form_btn">
			</form>
			</div>
			</div>
			</div>
			</div><br/>
			<footer class="bg-primary blockquote-footer">
					<div class="blockquote">
		<p class="m-1 text-center text-white">Copyright &copy; Batoula!  Tous droits réservés<?php echo date("Y"); ?></p>
	</div>
			</footer>

	

</body>
</html>