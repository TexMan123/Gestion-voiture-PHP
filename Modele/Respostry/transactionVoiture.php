<?php
	include('..\..\..\GestionVoiture\Modele\Entity\voiture.php');
	include('..\..\..\GestionVoiture\Modele\Respostry\Connexion\connexion.php');
	class transactionVoiture extends voiture
	{
		public $nombreVoiture;
		public function transactionVoiture(){}
				
		public function insertion()
		{
			$con=new connexion();
			$numero=$this->getNumero();
			$type=$this->getType();
			$marque=$this->getMarque();
			$idPers=$this->getIdPers();
			$req="insert into voiture(numero,type,marque,idPers) values('$numero','$type','$marque',$idPers)";
			$count=$con->pdoo->exec($req);
			return $this;	
		}
		/*
		public function supprimer()
		{
		  $req="delete from personne where id=".$this->getId();
		  $con=new connexion();
		  $r=mysql_db_query($con->base,$req);
			if($r==false)
			{
				echo "ERREUR sQl";
			}
			mysql_close();
		}
		public function modifier()
		{
			$nom;
			$prenom;
			$adresse;
			$con=new connexion();
			$req="select * from personne where id=".$this->getId();
				$r=mysql_db_query($con->base,$req);
				while($p=mysql_fetch_object($r))
				{
					$nom=$p->nom;
					$prenom=$p->prenom;
					$adresse=$p->adresse;				
				}
				mysql_close();
			if($this->getNom()=="")
			{
				$this->setNom($nom);
			}
			if($this->getPrenom()=="")
			{
				$this->setPrenom($prenom);
			}
			if($this->getAdresse()=="")
			{
				$this->setAdresse($adresse);
			}
			$req="update personne set nom='".$this->getNom()."',prenom='".$this->getPrenom()."',adresse='".$this->getAdresse()."' where id=".$this->getId();
			$con1=new connexion();
			$r=mysql_db_query($con->base,$req);
			if($r==false)
			{
				echo "ERREUR sQl";
			}
			mysql_close();
		}
		*/
		public function afficherParPersonne($idPers)
		{
			$tabVoiture=array();
			$con=new connexion();
			$req="select * from voiture where idPers=".$idPers;
			$liste=$con->pdoo->query($req);
			$i=1;
				while($p=$liste->fetch())
				{
					$tabVoiture['id'][$i]=$p['id'];
					$tabVoiture['numero'][$i]=$p['numero'];
					$tabVoiture['type'][$i]=$p['type'];
					$tabVoiture['marque'][$i]=$p['marque'];
					$i++;					
				}
				return $tabVoiture;
		}
		
		public function count($idPers)
		{
			$con=new connexion();
			$req="select * from voiture where idPers=".$idPers;
			$liste=$con->pdoo->query($req);
			$nombre=0;
			while($p=$liste->fetch())
			{
				$nombre=$nombre+1;
			}
			return $nombre;
			
		}
		public function affichetous()
		{
			$voiture=array();
			$con=new connexion();
			$req="select * from voiture";
			$liste=$con->pdoo->query($req);
			$i=0;
			while($p=$liste->fetch())
			{
				$voiture['id'][$i]=$p['id'];
				$voiture['numero'][$i]=$p['numero'];
				$voiture['type'][$i]=$p['type'];
				$voiture['marque'][$i]=$p['marque'];
				$voiture['idPers'][$i]=$p['idPers'];
				$i++;
			}
			$this->nombreVoiture=$i-1;
			return $voiture;
		}
		
		/*
		function selectId()
		{
			$this->idTab=array();
			$con=new connexion();
			$req="select id from personne";
			$r=mysql_db_query($con->base,$req);
			$i=1;
			while($p=mysql_fetch_object($r))
			{
				$this->idTab[$i]=$p->id;
				$i++;
			}
			mysql_close();
			
		}
	*/
		public function transferer()
		{
			$con=new connexion();
			$idVoiture=$this->getId();
			$idPers=$this->getIdPers();
				$req="update voiture set idPers='$idPers' where id='$idVoiture' ";
				$exec=$con->pdoo->query($req);
				header('Location:../../view/Personne/showPersonne.php');
				
		}
		
}
	    
?>
