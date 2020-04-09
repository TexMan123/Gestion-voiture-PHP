<?php
	include('..\..\..\GestionVoiture\Controller\controllerVoiture.php');
	//include('..\..\..\GestionVoiture\Modele\Respostry\Connexion\connexion.php');
	$con=new connexion();
	$voiture=new controllerVoiture();
	
	
	if(isset($_GET['pers'])){	
		$idV=$_GET['txt1'];
		$idPers=$_GET['pers'];	
		$req="select id from personne where nom='$idPers'";	
		$res=$con->pdoo->query($req);
		$idP=$res->fetch();
		$idPersonne=$idP['id'];		
		$voiture->transfert($idV,$idPersonne);
		
	}
	
	
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head><title> Transfert </title>
<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
<link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
	

	<form method="GET" action="TransferVoiture.php">

    <select name="pers" class="form form-control" style="width:500px">
     
      	<?php
      		$con=new connexion();
      		$req="select * from personne";
      		$liste=$con->pdoo->query($req);
      		while($p=$liste->fetch()){
      			echo "<option>" .$p['nom']. "</option>";
      		}  		
      	?>
    </select>
  	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="txt1">
    <input type="submit" name="b1" value="Transférer" class="btn btn-primary" style="margin-top:20px">
</form>



	<script src="../../public/js/bootstrap.min.js"></script>
	<script src="../../public/js/jquery-3.3.1.min.js"></script>
	<script src="../../public/js/script.js"></script>	
</body>
</html>