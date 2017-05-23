<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirInscription':
	{
		//Affichage de la vue d'inscription
		include('vues/v_inscription.php');
		break;
	}

	case 'ajouterDemandeur':
	{
			$nom = $_REQUEST['nom'];
			$prenom = $_REQUEST['prenom'];
			$email=$_REQUEST['email'];
			$mdp=$_REQUEST['mdp'];
			$rue=$_REQUEST['rue'];
			$cp=$_REQUEST['cp'];
			$ville=$_REQUEST['ville'];
			$date_naissance=$_REQUEST['datenaissance'];
			$licence=$_REQUEST['licence'];

			$pdo->newDemandeur($email, $nom, $prenom, $rue, $cp, $ville, $date_naissance, $mdp, $licence);
			//Inscrit l'utilisateur avec ses informations saisies et affiche l'authentification
			header("Location:index.php?uc=connexion&action=voirConnexion");

		break;
	}

}
