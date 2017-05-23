<head>
  <link rel="stylesheet" type="text/css" href="./css/connexion.css" />
</head>
<div id="connexion" class="container">
  <form id="contact" action="?uc=connexion&action=connexion" method="post">
    <h3>Authentification</h3>
			<p class="copyright"> <?php if(isset($message)) echo $message ?></p>
			<p class="copyright">	<?php include("vues/v_menu.php") ;?></p>
    <fieldset>
      <input placeholder="Email" id="email" type="email" name="email" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Mot de passe" id="mdp" type="password" name="mdp" tabindex="1" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Envoyer</button>
    </fieldset>

  </form>
</div>
