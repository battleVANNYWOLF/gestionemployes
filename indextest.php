<?php
	session_start();
	include('dbcon.php');
$allusers = $con->query('SELECT * FROM employes ORDER BY id DESC');

	if(isset($_POST['search']) && !empty($_POST['search']))
	{
		$rech = htmlspecialchars($_POST['search']);
$alluser = $con->query("SELECT * FROM employes WHERE nom_complet LIKE "%'.$rech.'%"");
		

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TEST01</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.js">
</head>
<body>
	<nav class="form-control-lg">
	<div class="form-control">
		<?php if(isset($_SESSION['message'])) :  ?>
		<h5 class="alert alert-success justify-content-center"><?= $_SESSION['message']; ?></h5>
		<?php
			unset($_SESSION['message']);
		 endif; ?>
		<div class="form-control-lg bg-primary">
			<h1 class="row justify-content-center text-white">Gestion des Employees!</h1>
			<p class="row justify-content-center text-white">Espace Administrateur</p>
			
			</div>
			
	
	<div class="card-header">
		<div class="row justify-content-around">
			<div class="row justify-content-right col-5">
				<a class="btn btn-success rounded-1 mb-1 float-sm-right" href="indexac.php">Ajouter un employer</a>
			</div>
			
			</div>
		<form  method="POST" class="form-control-lg">
				<label class="from-label text-dark">Veuillez inserez votre Identifiant</label>
				<input type="search"class="form-control" name="search" placeholder="Identifiant.."  required autocomplete="off">
				<input class="btn btn-primary form-control" type="submit" name="btn_search" value="Rechercher">
				<?php
					if($allusers->rowCount() >0)
					{
						while ($user = $allusers->fetch()) {
							?>
							<p><?= $user['nom_complet'];?></p>
							<p><?= $user['courante_date'];?></p>
							<?php 
						}
					}else{
						?>
						<p>aucun utilisateur trouve!</p>
						<?php 
					}
				 ?>
			</form>
			<table class="table table-dark">
				<thead>
				<tr>
					<th>id</th>
					<th>IDpersonnel</th>
					<th>nom complet</th>
					<th>sexe</th>
					<th>poste</th>
					<th>adresse</th>
					<th>telephone</th>
					<th>statut</th>
					<th>date et heure du statut</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$query = "SELECT * FROM employes";
						$run = $con->prepare($query);
						$run->execute();
						$result = $run->fetchAll();
						if($result)
						{
							foreach ($result as $row) {
								?>
								<tr>
						<td><?= $row['id']; ?></td>
						<td><?= $row['idpersonnel']; ?></td>
						<td><?= $row['nom_complet'];?></td>
						<td><?= $row['sexe'];?></td>
						<td><?= $row['poste'];?></td>
						<td><?= $row['adresse'];?></td>
						<td><?= $row['telephone'];?></td>
						<td><?= $row['statut'];?></td>
						<td><?= $row['courante_date'];?></td>
						<td><a href="employer-edit.php?id=<?= $row['id'];?>" class="btn btn-primary">Modifier</a> </td>
						<td><a href="employer-delete.php?id=<?= $row['id'];?>" class="btn btn-danger">Supprimer</a></td>

					</tr>
					<?php 
							}
						}
						 else
                                {
                                 ?>
                                 <tr>
                                    <td colspan="5">No record Found</td>
                                 </tr>
                                 <?php  

                                }
                             ?>
					 
					
				</tbody>
			</table>

			</div>
			</nav>



			<br/>
			<br/>
			<br>
			<br>
			<br/>
			<br>
			<br>
			<br>
			<br>
			<br>
				<footer class="bg-primary blockquote-footer">
					<div class="blockquote">
		<p class="m-1 text-center text-white">Copyright &copy; Batoula!  Tous droits réservés<?php echo date("Y"); ?></p>
	</div>
			</footer>

</body>
</html>
