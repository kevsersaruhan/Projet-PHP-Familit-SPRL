<?php

$filename = get_unique_filename($_POST["nomMatelas"],"jpg");
if(is_uploaded_file($_FILES['picture']['tmp_name']))
{
	if(move_uploaded_file($_FILES['picture']['tmp_name'],"../data/images/".$filename))
	{
		echo "<div id='content'>Fichier transféré et copié correctement</div>";
	}
}
	//instertion de la description du matelas
	$requete =	"INSERT INTO  descriptionsmatelas 
				(nomMatelas, descriptionMatelas, imageMatelas,idCategorie) VALUES ('".$_POST["nomMatelas"]."','".$_POST["descriptionMatelas"]."','".$filename."','".$_POST["categorieMatelas"]."')";
					
	$stmt = $dbh->exec($requete); 
	$idDescMat = $dbh->lastInsertId();
	
	//lien entre la description et la categorie
 echo "<div class='alert alert-success' role='alert'>
  <h4 class='alert-heading'>Well done!</h4>
  <p>La description du matelas à bien été ajouté</p>
  <hr>
  </div>";
    
?>