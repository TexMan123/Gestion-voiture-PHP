<?php
		include('..\..\..\GestionVoiture\Controller\controllerVoiture.php');
		$ajout= new controllerVoiture();
		session_start();
		
		if(isset($_GET['b1']))
		{
			if($_GET['z1']==""||$_GET['z2']==""||$_GET['z3']=="")
			{
			header('Location:addVoiture.php');
			}
			else
			{
				$idPers=$_SESSION['idPers'];
				$numero=$_GET['z1'];
				$type=$_GET['z2'];
				$marque=$_GET['z3'];
				$ajout->addVoiture($numero,$type,$marque,$idPers);
				session_destroy();
				header('Location:../Personne/showPersonne.php');
			}
		}
		else
		{
			$_SESSION['idPers']=$_GET['idPers'];
		}
?>
<html>
	<head><title> Ajout Voiture</title>
		<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../public/css/style.css">

	 </head>
	<body>
		<form method ="GET" action ="addVoiture.php">
		<table>
		 <tr><td>Numero</td><td> <input type="text" name="z1" class=" form-control"></td></tr>
		 <tr><td>Type </td><td><input type="text" name="z2" class=" form-control"></td></tr>
		 <tr><td>Marque </td><td><input type="text" name="z3" class=" form-control"></td></tr>
		 <tr><td><input type="submit" name="b1" value="Ajouter" class=" btn btn-primary"></td></tr>
		 </table>
		</form>
		<script src="../../public/js/bootstrap.min.js"></script>
		<script src="../../public/js/jquery-3.3.1.min.js"></script>
		<script src="../../public/js/script.js"></script>	
	</body>
</html>