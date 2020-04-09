<?php
		include('..\..\..\GestionVoiture\Controller\controllerPersonne.php');
		$ajout= new controllerPersonne();
		if(isset($_GET['b1']))
		{
			if($_GET['z1']=="")
			{
			header('Location:addPersonne.php');
			}
			else
			{
				$nom=$_GET['z1'];
				$prenom=$_GET['z2'];
				$adresse=$_GET['z3'];
				$ajout->addPersonnes($nom,$prenom,$adresse);
				header('Location:showPersonne.php');
				echo $nom;
			}
		}
?>
<html>
	<head>
		<title> Ajout Personne </title>
		<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../public/css/style.css">

	</head>
	<body>
		<form method ="GET" action ="addPersonne.php">
		<table>
		 <tr><td>Nom </td><td> <input type="text" name="z1" class=" form-control"></td></tr>
		 <tr><td>Prenom </td><td><input type="text" name="z2" class="form-control"></td></tr>
		 <tr><td>Adresse </td><td><input type="text" name="z3" class="form-control"></td></tr>
		 <tr><td><input type="submit" name="b1" value="Ajouter" class=" btn btn-primary"></td></tr>
		 </table>
		</form>
			<script src="../../public/js/bootstrap.min.js"></script>
			<script src="../../public/js/jquery-3.3.1.min.js"></script>
			<script src="../../public/js/script.js"></script>	
	</body>
</html>