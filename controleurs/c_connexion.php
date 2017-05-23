<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirConnexion':
	{//Appel de la vue
		include('vues/v_connexion.php');
		break;
	}

	case 'connexion':
	{
		//Valeurs prennent les saisies d'authentification
			$email = $_REQUEST['email'];
			$mdp = $_REQUEST['mdp'];


			$utilisateur = $pdo->getUtilisateur($email, $mdp);

			//Si l'utilisateur correspond aux logins sur la base de données affiche les lignes frais
			if($utilisateur)
			{
				$_SESSION["mail"] = $utilisateur["ADRESSE_MAIL"];
				header("Location:index.php?uc=compte&action=consultation");
			}
			//Sinon les identifiants sont faux et retourne à la vue de connexion
			else
			{
				$message = "Erreur les identifiant sont éronnés";
				include('vues/v_connexion.php');
			}
		break;
	}


}
