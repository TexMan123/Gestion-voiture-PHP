<?php
	 include('..\..\..\GestionVoiture\Controller\controllerVoiture.php');
	$voitures= new controllerVoiture();
	$voitures->allVoiture();
	$resultat=array();
	$resultat=$voitures->tousVoiture;
	$nombres=$voitures->nombre;
	echo $nombres;

	if(isset($_GET['b2'])){
		header('Location: ../../index.php');
	}
?>
<html>
<head><title> aceuil </title>
	<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
	<form method="GET" action="">
		<input type="submit" name="b2" value="Acceuil" class="btn btn-primary" id="b2">
	</form>
	<table id='tab' class='display'>
			<thead>
				<tr>
					<td>Id</td>
					<td>Numero</td>
					<td>Type</td>
					<td>Marque</td>
					<td>IdPers</td>
					<td>Action Voiture</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$ii=0;
				while($ii<=$nombres)
				{
					$ids=$voitures->tousVoiture['id'][$ii];
					$numeros=$voitures->tousVoiture['numero'][$ii];
					$types=$voitures->tousVoiture['type'][$ii];
					$marques=$voitures->tousVoiture['marque'][$ii];
					$idPerss=$voitures->tousVoiture['idPers'][$ii];
					
					echo "<tr>
							<td>  $ids </td>
							<td>  $numeros </td>
							<td>  $types </td>
							<td>  $marques </td>
							<td>  $idPerss </td>
							
						  </tr>" ;
					$ii++;		
				}
					
			?>
			</tbody>
	</table>	
</body>
</html>
    <script type="text/javascript" src='../DataTables/media/js/jquery.js'></script>
    <script type="text/javascript" src="../DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../tableau.js"></script>
    <link rel="stylesheet" type="text/css" href="../DataTables/media/css/jquery.dataTables.min.css">
