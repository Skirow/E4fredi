<?php
//Controleur Principal du site
session_start();
require_once("modeles/class.pdoFredi.inc.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];
// Création d'une instance d'accès à la base de données //
$pdo = PdoFredi::getPdoFredi();
switch($uc)
{
	case 'accueil':
	{
		include("vues/v_connexion.php");break;
	}

	case 'connexion' :
	{
		include("controleurs/c_connexion.php");break;
	}
	case 'inscription' :
	{
		include("controleurs/c_inscription.php");break;
	}
	case 'compte' :
	{
		include("controleurs/c_compte.php"); break;
	}

}

?>
