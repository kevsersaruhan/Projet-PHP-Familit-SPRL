<?php

	
    foreach ($row as $row)
    {
         $req = "SELECT * FROM matelas WHERE idDescriptionMatelas=".$row["idDescriptionMatelas"];
	     $stmt2 = $dbh ->query($req);
	     $row2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
         echo "<div class='col-lg-4 col-md-6 mb-4'> 
                <div class='card h-100'>
                    <a href='#'>
                        <img class='card-img-top' src='../data/images/".$row["imageMatelas"]."' alt=''>
                    </a>

                <div class='card-body'>
                    <h4 class='card-title'>
                        <a href='#'>".$row["nomMatelas"]."</a></h4><p class='card-text'>".$row["descriptionMatelas"]."</p>
              </div>
              <div class='card-footer'>
                <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>" ; 
    }

      





?>