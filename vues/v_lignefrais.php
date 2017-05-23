<?php


if(!isset($_SESSION["mail"]))
{
echo "Vous n\êtes pas autorisé à acceder à cette zone";
include("index.php?uc=compte&action=deconnexion");
}



?>
<html>
<head>

	<title>Lignes de frais</title>

</head>

<body>
<div class="container">
		<table class="table table-striped custab">
		<thead>
				<tr>
					<th class="text-center">Date</th>
					<th class="text-center">Motif</th>
					<th class="text-center">Trajet</th>
					<th class="text-center">Kms parcourus</th>
					<th class="text-center">Coût trajet</th>
					<th class="text-center">Péages</th>
					<th class="text-center">Repas</th>
					<th class="text-center">Hébergement</th>
					<th class="text-center">Total</th>
					<th class="text-center">Actions</th>

				</tr>
		</thead>
				<tbody class="table-hover">

		<?php
			$totalfrais = 0;
		foreach($lignesFrais as $uneLigne)
		 {
			if(isset($_SESSION['mail']))
			{
			$adresse = $_SESSION['mail'];


			$idfrais = $uneLigne['IDFRAIS'];

			$lignesMotif = $pdo->getMotif($uneLigne['NUM_MOTIF']);
			$libelle = $lignesMotif['LIBELLE'];

			$datefrais = $uneLigne['DATEFRAIS'];

			$trajet = $uneLigne['TRAJET'];

			$km = $uneLigne['KM'];

			$cout_peage = $uneLigne['COUT_PEAGE'];


			$cout_repas = $uneLigne['COUT_REPAS'];


			$cout_hebergement = $uneLigne['COUT_HEBERGEMENT'];


			$coutTrajet = 0;
			$coutTrajet += $km / $Tarifkm['KM'];
			$coutTrajet = floor(round($coutTrajet, 3));

			$total = 0;
			$total += $cout_peage;
			$total += $cout_repas;
			$total += $cout_hebergement;
			$total += $coutTrajet;

			$totalfrais += $total;
			echo '<tr><td>' . $datefrais . ' </td>';
			echo '<td>' . $libelle . ' </td>';
			echo '<td>' . $trajet . ' </td>';
			echo '<td>' . $km . ' </td>';
			echo '<td>' . $coutTrajet . ' €</td>';
			echo '<td>' . $cout_peage . ' €</td>';
			echo '<td>' . $cout_repas . ' €</td>';
			echo '<td>' . $cout_hebergement . ' €</td>';
			echo '<td>'.$total.' €</td>';
			echo '<td><a class="modif btn btn-info btn-xs" href="index.php?uc=compte&action=modifier&idfrais=' . $idfrais . '">Modifier <span class="glyphicon glyphicon-edit"></span></a>';
			echo '  	<a class="supp btn btn-danger btn-xs" href="index.php?uc=compte&action=supprimer&idfrais=' . $idfrais . '">Supprimer <span class="glyphicon glyphicon-remove"></span></a></td>';
			echo '</tr>';


			}
		}
		echo '<tr class="primary"><td colspan = 8 valign=center> Montant total des frais de déplacement </td><td>' . $totalfrais . ' €</td><td><a class="btn btn-primary" href="index.php?uc=compte&action=voirAjout">Ajouter <span class="glyphicon glyphicon-plus"></a></td></tr>';

		?>

			</tbody>
		</table>
	</div>
</div>
</body>
</html>
