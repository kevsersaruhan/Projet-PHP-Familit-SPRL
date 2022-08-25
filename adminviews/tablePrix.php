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
                                </tr>";
                
                    }
                    
                echo "</tbody>
                        </table>
                            </div>";
          
            
        }
                
       echo "</tbody>
        </table>
      </div>";
          

?>