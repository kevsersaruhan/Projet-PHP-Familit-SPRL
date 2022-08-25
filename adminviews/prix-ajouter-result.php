<?php
 
	$requete = "INSERT INTO matelas (prix,idMesureMatelas,idDescriptionMatelas) VALUES (".$_POST["prix"].",".$_POST["mesureMatelas"].",".$_POST["choixMatelas"].")";
	
	$stmt = $dbh->exec($requete);
    
    ?>