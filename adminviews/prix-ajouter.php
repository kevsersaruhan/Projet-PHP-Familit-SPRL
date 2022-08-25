<?php
echo "<main role='main' >

        <div class='album py-5 bg-light'>
        <div class='container' >
        <div class='row'>
        <div class='col-md-4'>";

    echo "<h3>Ajout d'un prix</h3>";
	echo "<form method=\"POST\" enctype=\"multipart/form-data\" action='?'>";
	echo "<input type='hidden' name='section' value='ajouterPrix'/>";
    echo "<div class='form group'>
      </br> <label for='selectMatelas'>Sélection du matelas :</label>
      <select id='selectMatelas' name='choixMatelas' size='1' class='custom-select' required>
    <option selected disabled value=''>Choose</option>
    ";
		$requete ="SELECT * FROM descriptionsmatelas";
		$stmt = $dbh->query($requete); 
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($row as $row)
		{
			echo "<option value=".$row["idDescriptionMatelas"].">".$row["nomMatelas"];
		}
	    echo "</SELECT>";
 
    echo "<div class='form group'>
      </br> <label for='selectMesure'>Sélection de la mesure :</label>
      <select id='selectMesure' name='mesureMatelas' size='1' class='custom-select'  required>
        <option selected disabled value=''>Choose</option>";
        
		$requete ="SELECT * FROM mesuresmatelas";
		$stmt = $dbh->query($requete); 
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($row as $row)
		{
			echo "<option value=".$row["idMesureMatelas"].">".$row["nomMesureMatelas"];
		}
	echo "</SELECT>";
	
	 echo "<div class='form-group'>
                <label for='prixMatelas'>Prix du matelas :</label>
                <input type=\"text\" name=\"prix\" id='nomMatelas' class='form-control'>
            </div>";
echo "</br><input type=\"submit\" class=\"btn btn-primary\" name='ButonAjouter' value=\"Ajouter\"/></div>";
	
	echo "</form>";
     echo "</br>";
    echo "</div></div></div></div></main>";

    ?>