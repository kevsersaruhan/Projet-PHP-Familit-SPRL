  <h2>Matelas</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nom du matelas</th>
              <th>Description</th>
              <th>Image</th>
              <th>Categorie</th>
            </tr>
          </thead>
          <tbody>
     <?php 
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
                  </tr>";
        }
                
        ?>
          </tbody>
        </table>
      </div>