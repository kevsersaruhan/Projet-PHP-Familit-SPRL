<?php

	echo "<table>";

	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) //tant que tu reçoit une ligne client tu affiche le resultat
	{
		echo "<tr>";
		echo "<td><a href='?section=fiche&id=".$row["idDescriptionMatelas"]."'>".$row["nomMatelas"]."</a></td>";
		echo "<td>".$row["descriptionMatelas"]."</td>";
		echo "<td><a href='?section=effacer&id=".$row["idDescriptionMatelas"]."'>effacer</a></td>";
		echo "<td><a href='?section=modifier&id=".$row["idDescriptionMatelas"]."'>modifier</a></td>";
		echo"</tr>";
	}
	echo "</table>";
	

?>