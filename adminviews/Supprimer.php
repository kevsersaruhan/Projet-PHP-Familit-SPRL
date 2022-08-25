<?php

echo "<h2>Liste de prix</h2>
      <div class='table-responsive'>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th>Nom du matelas</th>
              <th>Categorie</th>
              <th>Prix</th>
            </tr>
          </thead>
          <tbody>";

        $sql = "SELECT * FROM descriptionsmatelas";
		$stmt = $dbh->query($sql);
		$record = $stmt->fetchAll(PDO::FETCH_ASSOC);
					
        foreach($record as $record)
        {
              $sql = "SELECT nomCategorie FROM categoriesmatelas WHERE idCategorie=".$record['idCategorie'];
		      $stmt = $dbh->query($sql);
		      $records = $stmt->fetch(PDO::FETCH_ASSOC);
					
             echo "<tr>
                    <td>".$record['nomMatelas']."</td>
                    <td>".$records['nomCategorie']."</td>
                    <td><div class='table-responsive'>
                        <table class='table table-striped table-sm'>
                        <tbody>";
            
                    $sql = "SELECT * FROM matelas WHERE idDescriptionMatelas=".$record['idDescriptionMatelas'];
		            $stmt = $dbh->query($sql);
		            $recordss = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                    foreach ($recordss as $recordss)
                    {
                        $sql = "SELECT * FROM mesuresmatelas WHERE idMesureMatelas=".$recordss['idMesureMatelas'];
		                $stmt = $dbh->query($sql);
		                $mesure = $stmt->fetch(PDO::FETCH_ASSOC);
                          echo "<tr>
                                    <td>".$mesure['nomMesureMatelas']."</td>
                                    <td>".$recordss['prix']."</td>
                                    <td>
                                        <form method=\"POST\" enctype=\"multipart/form-data\" action='?'>
                                        <input type='hidden' name='section' value='effacer'/>
                                        <input type='hidden' name='id' value='".$recordss['idMatelas']."'/>
                                        <input type=\"submit\" class=\"btn btn-primary\" name='ButonSupprimer' value=\"Supprimer\"/>
                                    </td>
                                </tr>";
                
                    }
                    
                echo "</tbody>
                        </table>
                            </div>";
          
            
        }
                
       echo "</tbody>
        </table>
      </div>";
    

    echo "</br><h2>Matelas</h2>
      <div class='table-responsive'>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th>Nom du matelas</th>
              <th>Description</th>
              <th>Image</th>
              <th>Categorie</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>";

        $sql = "SELECT * FROM descriptionsmatelas";
		$stmt = $dbh->query($sql);
		$record = $stmt->fetchAll(PDO::FETCH_ASSOC);
					
        foreach($record as $record)
        {
              $sql = "SELECT nomCategorie FROM categoriesmatelas WHERE idCategorie=".$record['idCategorie'];
		      $stmt = $dbh->query($sql);
		      $records = $stmt->fetch(PDO::FETCH_ASSOC);
					
             echo "<tr>
                    <td>".$record['nomMatelas']."</td>
                    <td>".$record['descriptionMatelas']."</td>
                    <td><div class='card mb-3' style='max-width:540px;'>
                <div class='row no-gutters'>
                    <div class='col-md-4'><img class='card-img-top' src='../data/images/" . $record['imageMatelas']."'/></div></div></div></td>
                    <td>".$records['nomCategorie']."</td>
                  </tr>
                  <td>
                    <form method=\"POST\" enctype=\"multipart/form-data\" action='?'>
                                        <input type='hidden' name='section' value='effacer'/>
                                        <input type='hidden' name='idMatelas' value='".$record['idDescriptionMatelas']."'/>
                                        <input type=\"submit\" class=\"btn btn-primary\" name='ButonSupprimerMatelas' value=\"Supprimer\"/>
                                    </td>";
        }
                
        echo " </tbody>
        </table>
      </div>";
          
?>