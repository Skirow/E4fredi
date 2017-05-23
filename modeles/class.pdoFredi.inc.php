<?php
/**
 * Classe d'accès aux données.
 * Utilise les services de la classe PDO
 * pour l'application Fredi
 * Les attributs sont tous statiques,
 * $monPdo de type PDO
 * $monPdoFredi qui contiendra l'unique instance de la classe
 *
 * @package default
 * @version    1.0

 */

class PdoFredi
{
    private static $monPdo;
	private static $monPdoFredi = null;
  /**
  	 * Fonction qui crée le PdoFredi
     *@return $monPdoFredi
     *
  	 */
	private function __construct()
	{
    	PdoFredi::$monPdo = new PDO('mysql:host=localhost;dbname=fredi', 'root', '46C4ki7m*');
		PdoFredi::$monPdo->query("SET CHARACTER SET utf8");
	}
  /**
  	 * Fonction qui supprime le Pdo
     *
  	 */
	public function _destruct(){
		PdoFredi::$monPdo = null;
	}
  /**
  	 * Fonction qui crée le PdoFredi
     *@return $monPdoFredi
     *
  	 */
	public  static function getPdoFredi()
	{
		if(PdoFredi::$monPdoFredi== null)
		{
			PdoFredi::$monPdoFredi= new PdoFredi();
		}
		return PdoFredi::$monPdoFredi;
	}
  /**
  * Fonction qui permet d'obtenir l'utilisateur
  *
  *@param $email : Adresse Email
  *@param $mdp : Mot de Passe
  *@return $laLigne : Retourne les informations de l'utilisateur
  **/
	public function getUtilisateur($email, $mdp)
	{
		$req = "select * from demandeurs where ADRESSE_MAIL = '".$email."' and mdp = '".$mdp."'";
		$res = PdoFredi::$monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne;
	}
  /**
     * Fonction qui permet d'ajouter un utilisateur
  	 * @param $email
  	 * @param $motif
  	 * @param $datefrais
  	 * @param $trajet
  	 * @param $km
  	 * @param $cout_peage
  	 * @param $cout_repas
  	 * @param $cout_hebergement
  	 */
	public function newDemandeur($email, $nom, $prenom, $rue, $cp, $ville, $date_naissance, $mdp, $licence)
	{
		$req = "INSERT INTO demandeurs VALUES('$email', '$nom', '$prenom', '$rue', '$cp', '$ville', '$date_naissance', '','$mdp')";
		PdoFredi::$monPdo->exec($req)or die ('Erreur dans les champs saisies');
		$req = "INSERT INTO lien VALUES('$licence', '$email')";
		PdoFredi::$monPdo->exec($req) or die ('Erreur dans les champs saisies');
	}
  /**
     * Fonction qui permet d'ajouter une ligne de frais
  	 * @param $email
  	 * @param $motif
  	 * @param $datefrais
  	 * @param $trajet
  	 * @param $km
  	 * @param $cout_peage
  	 * @param $cout_repas
  	 * @param $cout_hebergement
  	 **/

	public function newLigneFrais($email,$motif,$datefrais,$trajet,$km,$cout_peage,$cout_repas,$cout_hebergement)
	{
		$reqInsert = "INSERT INTO lignes_frais(ADRESSE_MAIL,NUM_MOTIF, DATEFRAIS,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT)
		VALUES('$email','$motif', '$datefrais','$trajet', '$km', $cout_peage, $cout_repas, $cout_hebergement)";
		PdoFredi::$monPdo->exec($reqInsert)or die($reqInsert);
	}
  /**
  * Fonction qui permet de modifier la ligne de frais
  *
  *@param $idfrais : ID de la ligne
  *@param $num_motif : Num du Motif
  *@param $date : Date de la ligne
  *@param $trajet : Libelle du trajet
  *@param $km : Nombres de Km
  *@param $cout_peage : Cout du péage
  *@param $cout_repas : Cout du repas
  *@param $cout_hebergement : Cout de l'hebergement
  **/
	public function updateLigneFrais($idfrais, $num_motif,$date, $trajet, $km,$cout_peage,$cout_repas,$cout_hebergement)
	{
		$reqUpdate= "UPDATE lignes_frais
						SET NUM_MOTIF = '$num_motif', DATEFRAIS = '$date', TRAJET='$trajet', KM='$km', COUT_PEAGE= '$cout_peage', COUT_REPAS = '$cout_repas',COUT_HEBERGEMENT = '$cout_hebergement'
						WHERE IDFRAIS = '$idfrais'";
		PdoFredi::$monPdo->exec($reqUpdate)or die("Erreur dans les données saisies");
	}
  /**
  * Fonction qui permet de supprimer la ligne de frais
  *
  *@param $idfrais : ID de la ligne de frais
  **/
	public function deleteLigneFrais($idfrais)
	{
		$reqDel= "Delete from lignes_frais WHERE IDFRAIS= '".$idfrais."'";
		PdoFredi::$monPdo->exec($reqDel);
	}
  /**
  * Fonction qui permet d'obtenir les lignes de frais de l'utilisateur
  *
  *@param $mail : Adresse Mail de l'utilisateur
  *@return $lesLignes : Retourne les lignes de frais de l'utilisateur
  **/
	public function getLignesFraisDemandeur($mail)
	{
		$reqlignesfrais = 'SELECT * FROM lignes_frais WHERE ADRESSE_MAIL= "'.$mail.'"  ORDER BY DATEFRAIS';
		$res = PdoFredi::$monPdo->query($reqlignesfrais) or die("Erreur mail");
		$lesLignes = $res->fetchAll();
		return $lesLignes;


	}
  /**
  * Fonction qui permet d'obtenir la ligne de frais
  *@param $idfrais : ID de  la lignes_frais
  *@param $mail : Adresse Mail de l'utilisateur
  *@return $laLigne : Retourne la liste de frais choisie
  **/
	public function getLaLignesFraisDemandeur($idfrais, $mail)
	{
		$reqlignesfrais = 'SELECT * FROM lignes_frais WHERE IDFRAIS= "'.$idfrais.'" AND  ADRESSE_MAIL= "'.$mail.'" ';
		$res = PdoFredi::$monPdo->query($reqlignesfrais) or die("Erreur mail");
		$laLigne = $res->fetch();
		return $laLigne;


	}
  /**
  * Fonction qui permet d'obtenir la constante KM
  *@return $ligneKM
  **/
	public function getKm()
	{
		$reqKM = 'SELECT * From kilometres';
		$resKM = PdoFredi::$monPdo->query($reqKM);
		$ligneKM= $resKM->fetch();
		return $ligneKM;
	}

  /**
  * Fonction qui permet d'obtenir un Motif
  *@param $NUM_MOTIF : Numero du motif
  *@return $lignesMotif : Retourne le libelle du Motif
  **/
	public function getMotif($NUM_MOTIF)
	{
		$reqMotif = "SELECT LIBELLE FROM motifs WHERE NUM_MOTIF = '".$NUM_MOTIF."'";
		$resMotif = PdoFredi::$monPdo->query($reqMotif) or die ("Erreur N°2");
		$lignesMotif = $resMotif->fetch();

		return $lignesMotif;
	}
  /**
  * Fonction qui permet de retourner les motifs'
  *
  *@return $lesMotifs
  **/
		public function getLesMotifs()
	{
		$reqMotif = "SELECT LIBELLE FROM motifs";
		$resMotif = PdoFredi::$monPdo->query($reqMotif) or die ("Erreur N°2");
		$lesMotifs = $resMotif->fetchAll();

		return $lesMotifs;
	}
  /**
  * Fonction qui permet de déconnecter l'utilisateur
  *
  **/
	function deconnexion()
	{
	unset($_SESSION['mail']);
	}




}
?>
