<?php
	 include('..\..\..\GestionVoiture\Controller\controllerVoiture.php');
	if(isset($_GET['b1']))
	{
		header('Location: ../Personne/showPersonne.php');
	}
	else
	{
		$ajout= new controllerVoiture();
		$idPers=$_GET['idPers'];
		$ajout->selectVoiture($idPers);
		$resultat=array();
		$resultat=$ajout->tabVoiture;
		$nombres=$ajout->nombre;
	}
?>
<html>
<head><title> aceuil </title>
	<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
	<form method="GET" action="showVoiturePersonne.php">
		<input type="submit" name="b1" value="Retour" class="btn btn-secondary"><br>
	</form>
	<table id='tab' class='display'>
			<thead>
				<tr>
					<td>Id</td>
					<td> Numero</td>
					<td>Type</td>
					<td>Marque</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$i=1;
				while($i<=$nombres)
				{
					$id=$resultat['id'][$i];
					$numero=$resultat['numero'][$i];
					$type=$resultat['type'][$i];
					$marque=$resultat['marque'][$i];
					echo "<tr>
							<td>  $id </td>
							<td>  $numero </td>
							<td>  $type </td>
							<td>  $marque </td>
							<td>  <a href=\"./TransferVoiture.php?id=$id\" class='btn btn-warning'>Transférer</a> </td>
						  </tr>" ;
					$i++;		
				}
					
			?>
			</tbody>
	</table>
	<script src="../../public/js/bootstrap.min.js"></script>
	<script src="../../public/js/jquery-3.3.1.min.js"></script>
	<script src="../../public/js/script.js"></script>		
</body>
</html>
    <script type="text/javascript" src='../DataTables/media/js/jquery.js'></script>
    <script type="text/javascript" src="../DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../tableau.js"></script>
    <link rel="stylesheet" type="text/css" href="../DataTables/media/css/jquery.dataTables.min.css">
