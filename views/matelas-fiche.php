<?php
	
	
	echo "<h1>".$desc["nomMatelas"]."</h1>";
	echo "<h2>".$desc["descriptionMatelas"]."</h2>";
	echo "<img src='../data/images/" . $desc["imageMatelas"] ."'/><br>";
	echo "<h2>".$desc2["nomCategorie"]."</h2>";
	echo "<p>".$desc2["descriptionCategorie"]."</p>";
		
	
	$req = "SELECT * FROM matelas WHERE idDescriptionMatelas=".$_REQUEST["id"];
	$stmt2 = $dbh ->query($req);
	$row = $stmt2->fetchAll(PDO::FETCH_ASSOC);
	
	
	echo "<table>";

	foreach ($row as $row)
	{
	
		//Recherche de la mesure du matelas
		$req3 = "SELECT * FROM mesuresmatelas WHERE idMesureMatelas =".$row["idMesureMatelas"];
		$stmt4 = $dbh ->query($req3);
		$row2 = $stmt4->fetch(PDO::FETCH_ASSOC);
						
		echo "<tr>";
		echo "<td>".$row2["nomMesureMatelas"]."</td>";
		echo "<td>".$row["prix"]."euros</td>";
		echo "</tr>";
	}
	echo "</table>";
	
			
?>