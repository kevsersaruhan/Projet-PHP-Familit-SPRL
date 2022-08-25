<?php
foreach($records as $record)
	{
	echo "<a href='?section=fiche&id=" . $record["idDescriptionMatelas"] . "'>";
	echo $record["nomMatelas"];
	echo "</a>";
	echo " - <a href='?section=effacer&id=" . $record["idDescriptionMatelas"] . "'>supprimer</a>";
	echo " - <a href='?section=modifier&id=" . $record["idDescriptionMatelas"] . "'>modifier</a>";
	echo " - <a href='?section=fiche&id=" . $record["idDescriptionMatelas"] . "'>consulter</a>";
	echo "<br/>";
	}
	
?>