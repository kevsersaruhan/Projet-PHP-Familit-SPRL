<?php
echo "<main role='main' >

        <div class='album py-5 bg-light'>
        <div class='container' >
        <div class='row'>
        <div class='col-md-4'>";

    echo "<h3>Modifier matelas</h3>";
	echo "<form method=\"POST\" enctype=\"multipart/form-data\" action='?'>";
	echo "<input type='hidden' name='section' value='modifier'/>";
    echo "<div class='form group'>
      </br><label for='selectMatelas'>Sélection du matelas :</label>
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
    echo "</br><input type=\"submit\" class=\"btn btn-primary\" name='ButonModif' value=\"Modifier\"/></div>";
	
echo "</form>";
echo "</br>";
    echo "</div></div></div></div></main>";

if(isset($_POST["ButonModif"]))
{
    	$requete ="SELECT * FROM descriptionsmatelas WHERE idDescriptionMatelas=".$_POST['choixMatelas'];
		$stmt = $dbh->query($requete); 
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
    
    include ("matelas-modifier.php");
}
    

    ?>