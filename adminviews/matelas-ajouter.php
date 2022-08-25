<?php

    
echo "<main role='main' >

  <div class='album py-5 bg-light'>
    <div class='container' >

      <div class='row'>
        <div class='col-md-4'>";
    echo "<h3>Ajout d'un matelas</h3>";
	echo "<form method=\"POST\" enctype=\"multipart/form-data\" action='?'>";
	echo "<input type='hidden' name='section' value='ajouterMatelas'/>";
    
    echo "<div class='form-group'>
                <label for='nomMatelas'>Nom du matelas :</label>
                <input type=\"text\" name=\"nomMatelas\" id='nomMatelas' class='form-control'>
            </div>";
    echo "<div class='form-group'>
                <label for='descriptionMatelas'>Description :</label>
                <textarea type=\"text\" name=\"descriptionMatelas\" id='descriptionMatelas' class='form-control' row='3'></textarea>
            </div>";
	echo "<input type=\"hidden\" name=\"MAX_FILE_TYPE\" value=\"300000\"/>";
    echo"<div class='custom-file'>
            <label for='customFile'>Image :</label>
            </div>";
    echo"<div class='custom-file'>
            <label for='customFile'>Image :</label>
            <input name=\"picture\" type='file' class='custom-file-input' id='customFile'>
            <label class='custom-file-label' for='customFile'>Image</label> 
            </div>";

echo "<div class='form group'>
      </br><label for='catselect'>Categorie du matelas:</label>
      <select name='categorieMatelas' size='1' class='custom-select' id='catselect' required>
        <option selected disabled value=''>Choose</option>
    ";
   
		$requete ="SELECT * FROM categoriesmatelas";
		$stmt = $dbh->query($requete); 
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($row as $row)
		{
			echo "<option value=".$row["idCategorie"].">".$row["nomCategorie"];
		}
	echo "</SELECT></br>";
	echo "</br><input type=\"submit\" class=\"btn btn-primary\" name='ButonAjouterMatelas' value=\"Créer\"/></div>";
	echo "</form>";
    echo "</br>";
    echo "</div></div></div></div></main>";

?>