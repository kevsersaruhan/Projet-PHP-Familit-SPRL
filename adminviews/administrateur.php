<?php
    ini_set('display_errors','on');
    error_reporting(E_ALL);
	include("../lib/file.php");
	$hostname="localhost";
	$username="adminfamilit";
	$password="196761Ts";
	$dbname="familitsprl";
	
	// Fixation du niveau des messages d'erreur
   include("adminheader.php");
   include ('navbaradmin.php');
	if(isset($_REQUEST["section"]))
	{
		try{
			$dbh=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			
			
			switch($_REQUEST["section"])
			{
               
                
				case "ajouterMatelas":
					
					if(isset($_POST["ButonAjouterMatelas"]))
					{
                        
						include("matelas-inserer-result.php");
                        include("table.php");
                       
                        
					} 
					else
					{
						include("matelas-ajouter.php");
                        include("table.php");
                        
					}
					
					break;
                    
                case "ajouterPrix":
					
					if(isset($_POST["ButonAjouter"]))
					{
                        
						include("prix-ajouter-result.php");
                        include("prix-ajouter.php");
                        include("tablePrix.php");
					} 
					else
					{
						include("prix-ajouter.php");
                        include("tablePrix.php");
                        
					}
					
					break;
               
				case "listeMatelas":
                    
					$sql = "SELECT * FROM descriptionsmatelas";
					if(isset($_GET["search"])) $sql .= " WHERE nomMatelas LIKE '%" . $_GET["search"] . "%'";
					$stmt = $dbh->query($sql);
					$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
					
                        include("../views/matelas-liste.php");
                    
					
					break;
					
				case "fiche":
				
					//recherche de la description du matelas et categorie
					$requete2="SELECT * FROM descriptionsmatelas WHERE idDescriptionMatelas=".$_REQUEST['id'];
					$stmt= $dbh->query($requete2);
					$desc=$stmt -> fetch(PDO::FETCH_ASSOC);
                    
                    $requete3="SELECT * FROM categoriesmatelas WHERE idCategorie=".$desc["idCategorie"];
                    $stmt= $dbh->query($requete3);
					$desc2=$stmt -> fetch(PDO::FETCH_ASSOC);
                    
					include("../views/matelas-fiche.php");
					break;
					
				case "effacer":
				
                    if (isset($_POST["ButonSupprimer"]))
                    {
                        $requete ="DELETE FROM matelas WHERE idMatelas='".$_POST["id"]."'";
					    $stmt = $dbh->exec($requete);
                        header("Location: ?section=effacer");
                    }
                    if (isset($_POST["ButonSupprimerMatelas"]))
                    {
                        $requete ="DELETE FROM matelas WHERE idDescriptionMatelas='".$_POST["idMatelas"]."'";
					    $stmt = $dbh->exec($requete);
                        $requete ="DELETE FROM descriptionsmatelas WHERE idDescriptionMatelas='".$_POST["idMatelas"]."'";
					    $stmt = $dbh->exec($requete);
                        header("Location: ?section=effacer");
                    }
                    else
                    {
                         include('Supprimer.php');
                    }
					
					break;
					
				case "modifier";
				
					if(isset($_POST["BoutonModifier"]))
					{
						include("../views/matelas-modifier-result.php");
						header("Location: ?section=listeMatelas");
					} 
					else
					{ 
                        // trouver la description du matelas
						
                       include("modifier.php");
					}
					
					break;
					
				
					case "rechercherMatelas":
				
				        include("../views/matelas-recherche.php");

					break;
                    
                case "home";
                        $requete ="SELECT * FROM descriptionsmatelas ";
                        $stmt = $dbh->query($requete); 
		                $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
                        include ("../views/shopHomepage.php");
                    
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
    
        include("dashboard.php");
		//include("views/index.php");
	}
include ("footerscript.html");

?>