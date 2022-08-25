<?php
    $filename = get_unique_filename($_POST["nomMatelas"],"jpg");
	if(is_uploaded_file($_FILES['picture']['tmp_name']))
	{
		if(move_uploaded_file($_FILES['picture']['tmp_name'],"../data/images/". $filename))
		{
			echo "<div id='content'>Fichier transféré et copié correctement</div>";
		}
	}
	else
	{	
		$filename =$_POST["imagesource"];
	}

	$requete =	"UPDATE descriptionsmatelas 
				SET nomMatelas='".$_POST["nomMatelas"].
				"', descriptionMatelas='".$_POST["descriptionMatelas"].
				"',imageMatelas='".$filename."', idCategorie='".$_POST['choixCat']."' 
				WHERE idDescriptionMatelas='".$_POST["id"]."'";
					
	$stmt = $dbh->exec($requete); 
    
    $req = "UPDATE matelas SET prix='".$_POST["prixMatelas"]."', idMesureMatelas='".$_POST["choixMesure"]."' WHERE idDescriptionMatelas='".$_POST["id"]."'";
    $stmt = $dbh -> exec($req);
?>