<head>
  <link rel="stylesheet" type="text/css" href="./css/connexion.css">
</head>
	<div id="inscription" class="container">
		<form id="contact" action="?uc=inscription&action=ajouterDemandeur" method="post">
			<h3>Inscription</h3>

					<p class="copyright">	<?php include("vues/v_menu.php") ;?></p>
			<fieldset>
				<input placeholder="Nom" required type="text" id="nom" name="nom" maxlength="50" value="<?php if(isset($_POST['nom'])) { echo htmlentities($_POST['nom']);}?>" size="25" />
			</fieldset>
			<fieldset>
				<input placeholder="Prénom" required type="text" id="prenom" name="prenom" maxlength="50" value="<?php if(isset($_POST['prenom'])) { echo htmlentities($_POST['prenom']);}?>" size="25" />
			</fieldset>
			<fieldset>
				<input placeholder="Email" required type="text" id="email" name="email" maxlength="50" size="25" value="<?php if(isset($_POST['email'])&&(preg_match("#@#",$_POST['email']))) { echo htmlentities($_POST['email']);}?>" /> </fieldset>
			<fieldset>
				<input placeholder="Mot de passe" required type="password" id="mdp" name="mdp" maxlength="50" size="25"/>
			</fieldset>
			<fieldset>
				<input placeholder="Rue" required type="text" id="rue" name="rue" maxlength="50" value="<?php if(isset($_POST['rue'])) { echo htmlentities($_POST['rue']);}?>" size="25" />
			</fieldset>
			<fieldset>
				<input placeholder="Code Postal" required type="text" id="cp" name="cp" maxlength="50" size="25" value="<?php if(isset($_POST['cp'])) { echo htmlentities($_POST['cp']);}?>"/>
			</fieldset>
			<fieldset>
				<input placeholder="Ville" required type="text" id="ville" name="ville" maxlength="50" value="<?php if(isset($_POST['ville'])) { echo htmlentities($_POST['ville']);}?>" size="25" />
			</fieldset>
			<fieldset>
				Date de naissance: <input required type="date" id="datenaissance" name="datenaissance" value="<?php if(isset($_POST['datenaissance'])) { echo htmlentities($_POST['datenaissance']);}?>" />
			</fieldset>
			<fieldset>
				<input placeholder="Licence" required type="text" id="licence" name="licence" maxlength="50" size="25" value="<?php if(isset($_POST['licence']) && is_numeric($_POST['licence'])) { echo htmlentities($_POST['licence']);}?>" />
			</fieldset>
			<fieldset>
				<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Envoyer</button>
			</fieldset>
		</form>
	</div>
