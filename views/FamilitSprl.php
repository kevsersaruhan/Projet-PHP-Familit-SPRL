<?php
    ini_set('display_errors','on');
    error_reporting(E_ALL);
	include("../lib/file.php");
	$hostname="localhost";
	$username="adminfamilit";
	$password="196761Ts";
	$dbname="familitsprl";
	
	// Fixation du niveau des messages d'erreur
   include("header.html");
	
	if(isset($_REQUEST["section"]))
	{
		try{
			$dbh=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			
			
			switch($_REQUEST["section"])
			{
                
				
				case "listeMatelas":
                    
					$sql = "SELECT * FROM descriptionsmatelas";
					if(isset($_GET["search"])) $sql .= " WHERE nomMatelas LIKE '%" . $_GET["search"] . "%'";
					$stmt = $dbh->query($sql);
					$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
					
					include("matelas-liste.php");
					break;
					
				case "fiche":
				
					//recherche de la description du matelas et categorie
					
					$requete2="SELECT * FROM descriptionsmatelas WHERE idDescriptionMatelas=".$_REQUEST['id'];
					$stmt= $dbh->query($requete2);
					$desc=$stmt -> fetch(PDO::FETCH_ASSOC);
                    
                    $requete3="SELECT * FROM categoriesmatelas WHERE idCategorie=".$desc["idCategorie"];
                    $stmt= $dbh->query($requete3);
					$desc2=$stmt -> fetch(PDO::FETCH_ASSOC);
                    
					include("matelas-fiche.php");
					break;
				
					
					case "rechercherMatelas":
				
				        include("matelas-recherche.php");

					break;
                    
                case "login";
                    
                        include ("login-result.php");
                    
                    break;
                case "home";
                        $requete ="SELECT * FROM descriptionsmatelas ";
                        $stmt = $dbh->query($requete); 
		                $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

                        include ("shopHomepage.php");
                    
                    break;
                case "register";
                    if(isset($_POST["register"]))
					{
                        $var=md5($_POST["inputPassword"]);
                        $requete =	"INSERT INTO  users 
				        (nom, prenom, email,password) VALUES ('".$_POST["lastName"]."','".$_POST["firstName"]."','".$_POST["inputEmail"]."','".$var."')";
					
	                   $stmt = $dbh->exec($requete); 
				       header('Location: ?section=login');
					} 
					else
					{
						include("register.php");
					}
					
					break;
                    
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		} 
	}
	else
	{
        $dbh=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
        $requete ="SELECT * FROM descriptionsmatelas ";
        $stmt = $dbh->query($requete); 
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
        include("shopHomepage.php");
		//include("views/index.php");
	}

include("footer.html");
?>