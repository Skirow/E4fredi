<?php
if(isset($_SESSION['mail'])AND isset($laLignesFrais['IDFRAIS']))
{
			$laLigne = $pdo->getLaLignesFraisDemandeur($idfrais, $_SESSION['mail']);
			$i=1;
?>
<html>
<head>

	<title>Lignes de frais</title>

	<link rel="stylesheet" type="text/css" href="./css/connexion.css" />

</head>

<body>
<div class="container">
<form name="modification" id="contact" method="POST" action ="index.php?uc=compte&action=execModifier&idfrais=<?php echo $laLigne['IDFRAIS'];?>">
	<center><h3>Modification</h3></center>

			<fieldset>
				Date
				<?php
				echo '<input type="date" size="11" name="datefrais" class="zone" value="'. $laLigne["DATEFRAIS"] .'" />';
				?>
			</fieldset>

			<fieldset>
				Motif
				<select name="libelle">
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
				Trajet
				<?php echo '<input type="text" size="10" name="trajet" class="zone" value="'. $laLigne["TRAJET"] .'" />';?>
			</fieldset>

			<fieldset>
				Kms parcourus
				<?php echo '<input type="text" size="3" name="km" class="zone" value="'. $laLigne["KM"] .'" />';?>
			</fieldset>

			<fieldset>
				Péages
				<?php echo '<input type="text" size="3" name="cout_peage" class="zone" value="'. $laLigne["COUT_PEAGE"] .'" placeholder="€"/>';?>
			</fieldset>

			<fieldset>
				Repas
				<?php echo '<input type="text" size="3" name="cout_repas" class="zone" value="'. $laLigne["COUT_REPAS"] .'" placeholder="€"/>';?>
			</fieldset>

			<fieldset>
				Hébergement
				<?php echo '<input type="text" size="3" name="cout_hebergement" class="zone" value="'. $laLigne["COUT_HEBERGEMENT"] .'" placeholder="€"/>';?>
			</fieldset>





<?php
}
else {
	include("index.php?uc=compte&action=deconnexion");
}
?>

	</tbody>
</table>
<center><input type="submit" name="sauvegarder" value="Sauvegarder"/></center>
</form>

</body>
</html>
