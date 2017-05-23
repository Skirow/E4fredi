<?php
if(isset($_SESSION['mail']))
{
$i = 1;
?>
<html>
<head>

	<title>Lignes de frais</title>
	<link rel="stylesheet" type="text/css" href="./css/connexion.css" />

</head>
<div class="container">
<form id="contact" name="modification" method="POST" action ="index.php?uc=compte&action=ajouter">
	<center><h3>Ajout</h3></center>
			<fieldset>
				Date
				<input type="date"  id="datefrais" name="datefrais"/>
			</fieldset>
			<fieldset>
				Motif
				<select  id="motif" name="motif" class="zone" >
					<option>--Motif--</option>
					<?php
					foreach($lesMotifs as $unMotif)
					{
						echo '<option name="motif" value="'.$i.'"> '.$unMotif["LIBELLE"].'</option>';
						$i++;
					}

					?>
				</select>
			</fieldset>
			<fieldset>
				<input type="text" name="villeD"  id="villeD" placeholder="Ville Départ" />
			</fieldset>
			<fieldset>
				<input type="text" name="villeA" id="villeA" placeholder="Ville Arrivée" />
			</fieldset>
			<fieldset>
				<input placeholder="Kms parcourus" type="text" name="kilometre" id="km"  />
			</fieldset>
			<fieldset>
				<input type="text" name="peage" id="peage" placeholder="Coût Péages " />
			</fieldset>
			<fieldset>
				<input type="text" name="repas" id="repas" placeholder="Coût Repas" />
			</fieldset>
			<fieldset>
				<input type="text" name="hebergement" id="hebergement" placeholder="Coût Hébergement" />
			</fieldset>
			<fieldset>
				<button name="submit" type="submit" name="valider" id="contact-submit" data-submit="...Sending">Envoyer</button>

			</fieldset>

		</tbody>
</table>
</form>
</div>
<?php

}
else {
	echo "Vous n\êtes pas autorisé à acceder à cette zone";
	include("index.php?uc=compte&action=deconnexion");
}

?>
