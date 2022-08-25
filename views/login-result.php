<?php
     
ini_set('display_errors','on');
error_reporting(E_ALL);
	
$hostname="localhost";
$username="adminfamilit";
$password="196761Ts";
$dbname="familitsprl";


session_start();
ob_start();

if (isset($_SESSION['access']))
{ 
        if(isset($_REQUEST['section']))
        {
            switch($_REQUEST['section'])
            {
                    
                case "out":
                    session_destroy();
                    header ('Location: FamilitSprl.php');
                   
                    
            }
        }
        else
        {
            header ('Location: ../adminviews/administrateur.php');
        }
}

else
{
    if(isset($_POST["login"]))
    {
       
        $dbh=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
        $requete2="SELECT * FROM users WHERE email='".$_POST['email']."'";
        $stmt= $dbh->query($requete2);
        $desc=$stmt -> fetch(PDO::FETCH_ASSOC);
      
        if($desc['email']==$_POST['email'] && $desc['password']==md5($_POST['password']))
        {
            
            $_SESSION['access'] = 'ok';
            header('Location: login-result.php');
        }
        else
        {
            include('login.php');
            
        }
    }
    else
    {
      include ("login.php");
    }
}	

ob_end_flush();

?>