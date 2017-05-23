<?php
//Reception de l'action
$action = $_REQUEST['action'];
//Verifie si la session est constituée du Mail sinon renvoie à la connexion
if (isset($_SESSION['mail']))
    include("vues/v_menuCompte.php");
else
    header("Location:index.php?uc=connexion&action=voirConnexion");

    //En Fonction de l'action
switch ($action) {
    case 'consultation': {
        $lignesFrais = $pdo->getLignesFraisDemandeur($_SESSION['mail']);
        $Tarifkm     = $pdo->getKm();
        //Affichage de la vue des lignes frais
        include("vues/v_lignefrais.php");
        break;
    }

    case 'voirAjout': {
        $lesMotifs = $pdo->getLesMotifs();
        //Affichage de la vue ajout de lignes frais
        include("vues/v_newfrais.php");
        break;
    }

    case 'ajouter': {

        //Réception des informations saisies
        $email = $_SESSION['mail'];
        if (isset($_POST['datefrais'])) {
            $datefrais = $_POST['datefrais'];
        }

        if (isset($_POST['motif'])) {
            $motif = $_POST['motif'];
        }


        if (isset($_POST['villeD'])) {
            $villeD = $_POST['villeD'];
        } else {
					$villeD = "";
				}


        if (isset($_POST['villeA'])) {
            $villeA = $_POST['villeA'];
        } else
          {  $villeA = "";}

        if ($_POST['kilometre']!=null) {
            $km = $_POST['kilometre'];
        } else
            {$km = 0;}

        if ($_POST['peage']!=null) {
            $peage = $_POST['peage'];
        } else
            {$peage = 0;}

        if ($_POST['repas']!=null) {
            $repas = $_POST['repas'];
        } else
            {$repas = 0;}

        if ($_POST['hebergement']!=null) {
            $hebergement = $_POST['hebergement'];
        } else
            {$hebergement = 0;}

        $trajet = $villeD . " - " . $villeA;
        //Appel de la fonction permettant d'ajouter la ligne frais
        $pdo->newLignefrais($email, $motif, $datefrais, $trajet, $km, $peage, $repas, $hebergement);

    }

    case 'supprimer': {
      //Réception de l'id frais et suppression de la ligne
        $idfrais = $_REQUEST["idfrais"];
        $pdo->deleteLignefrais($idfrais);
        $lignesFrais = $pdo->getLignesFraisDemandeur($_SESSION['mail']);
        $Tarifkm     = $pdo->getKm();
        header("Location:index.php?uc=compte&action=consultation");
        break;
    }

    case 'modifier': {
      //Modification de la ligne
        $idfrais       = $_REQUEST["idfrais"];
        $laLignesFrais = $pdo->getLaLignesFraisDemandeur($idfrais, $_SESSION['mail']);
        $Tarifkm       = $pdo->getKm();
        $lesMotifs     = $pdo->getLesMotifs();
        include("vues/v_modiflignefrais.php");


        break;
    }

    case 'execModifier': {
      //Execution des modifications
        if (isset($_POST['datefrais']))
            $datefrais = $_POST['datefrais'];

        if (isset($_POST['libelle']))
            $motif = $_POST['libelle'];

        if (isset($_POST['km']))
            $km = $_POST['km'];

        if (isset($_POST['trajet']))
            $trajet = $_POST['trajet'];

        if (isset($_POST['cout_peage']))
            $cout_peage = $_POST['cout_peage'];


        if (isset($_POST['cout_repas']))
            $cout_repas = $_POST['cout_repas'];


        if (isset($_POST['cout_hebergement']))
            $cout_hebergement = $_POST['cout_hebergement'];

        $pdo->updateLigneFrais($_REQUEST["idfrais"], $motif, $datefrais, $trajet, $km, $cout_peage, $cout_repas, $cout_hebergement);
        $message = "La ligne de frais a bien été modifié";
        include("vues/v_message.php");
        $lignesFrais = $pdo->getLignesFraisDemandeur($_SESSION['mail']);
        $Tarifkm     = $pdo->getKm();
        //Appel de la vue après les modifications enregistrées
        include("vues/v_lignefrais.php");
        break;
    }



    case 'deconnexion': {
      //Deconnexion de l'utilisateur
        $pdo->deconnexion();
        header("Location:index.php?uc=connexion&action=voirConnexion");

        break;
    }
}
?>
