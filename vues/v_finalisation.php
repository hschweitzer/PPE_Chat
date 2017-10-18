<div>
  <?php //utilise les infos de $profil , retourné par getutilisateurParToken().?>
    <form action="index.php?uc=utilisateur&action=finalisation&token=<?php echo $_GET["token"]; ?>" method="post">
      <input type="password" name="mdp" placeholder="Mot de passe">
      <input type="password" name="repeter-mdp" placeholder="Répéter mot de passe">
      <input type="submit" name="validerMotDePasse" value="Envoyer">
    </form>
</div>
