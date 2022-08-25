<?php

	echo "<form method=\"POST\" enctype=\"multipart/form-data\" action='?'>";
	echo "<input type='hidden' name='section' value='modifier'/>";
	echo "<input type='hidden' name='id' value='".$row["idDescriptionMatelas"]."'/>";
	echo "<label>Nom du matelas :</label><input type=\"text\" name=\"nomMatelas\" value='".$row["nomMatelas"]."'></br>";
	echo "<label>Description :</label><input type=\"text\" name=\"descriptionMatelas\" value='".$row["descriptionMatelas"]."'></br>";
	echo "<input type=\"hidden\" name=\"MAX_FILE_TYPE\" value=\"300000\"/>";
	echo "<label>Image :</label>";
	echo "<input name=\"picture\" type=\"file\"/>";
	echo "<input type='text' name='imagesource' value='".$row["imageMatelas"]."'/><br>";
    echo "<label>Categorie :</label>";
    
    echo "<SELECT name='choixCat' size='1'>";
		$requete ="SELECT * FROM categoriesmatelas";
		$stmt = $dbh->query($requete); 
		$row2=$stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($row2 as $row2)
		{
            
			echo "<option value=".$row2["idCategorie"]."";
        
            if($row2["idCategorie"]==$row["idCategorie"]) echo " selected";
               
           
            echo " >".$row2['nomCategorie'];
            
		}
	    echo "</SELECT>";
    
        // trouver la mesure et le prix du matelas
        $requete ="SELECT * FROM matelas WHERE idDescriptionMatelas='".$row["idDescriptionMatelas"]."'";
		$stmt = $dbh->query($requete); 
		$row3=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        
    echo "<label>Mesures :</label>";
    
   
    foreach ($row3 as $row3)
    {
        echo "<SELECT name='choixMesure' size='1'>";
		$requete ="SELECT * FROM mesuresmatelas";
		$stmt = $dbh->query($requete); 
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($row as $row)
		{
            
			echo "<option value=".$row["idMesureMatelas"]."";
        
            if($row["idMesureMatelas"]==$row3["idMesureMatelas"]) echo " selected";
               
           
            echo " >".$row["nomMesureMatelas"];
            
		}
	    echo "</SELECT>";
        echo "<label>Prix :</label>";
        echo "<input type=\"text\" name=\"prixMatelas\" value='".$row3["prix"]."'></br>";
       
    }
    
	echo "<input type=\"submit\" name='BoutonModifier' value=\"Modifier\"/>";
	echo "</form>";


?>