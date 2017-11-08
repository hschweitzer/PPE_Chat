<?php
function lancement_finalisation_inscription($Pdo, $idUser, $emailUser, $nomUser) {
  $token = substr((string)md5(uniqid($emailUser, true)), 0, 16);
  $Pdo->insertToken($token, $idUser);
  sendConfirmationMail($nomUser, $emailUser, $token);
}

function renouvelerAbonnement($Pdo, $idUser, $idChien) {
  $abo = $Pdo->getAbonnement($idUser, $idChien);
  $nvDateFin = date('Y-m-d', strtotime('+1 year', strtotime($abo["end_date"])) );
  $dansUnAn = date('Y-m-d', strtotime('+1 year'));
  if (strtotime($dansUnAn) > strtotime($nvDateFin)) {
    $Pdo->updateEndDate($idUser, $dansUnAn);
  }
  else {
    $Pdo->updateEndDate($idUser, $nvDateFin);
  }
}

function ajouterChien($idUser, $tattooChien, $nom, $lof, $dateNaiss, $race, $idUser)
{
  insertChien($tattooChien, $nom, $lof, $dateNaiss, $race, $idUser);
  insertMembership($idUser, $tattooChien);
}

function ajouterUtilisateur($Pdo, $prenom, $nom, $dateNaiss, $email, $tel, $nomChien, $race, $dateNaissChien, $tatouage, $lof)
{
  $id = $Pdo->getNextId();
  $Pdo->insertUtilisateur($id, $prenom, $nom, $dateNaiss, $email, $tel);
  $Pdo->insertChien($tatouage, $nomChien, $lof, $dateNaissChien, $race, $id);
  $Pdo->insertMembership($id, $tatouage);
  echo "Inscription d'un utilisateur et de son chien terminée.<br>Vous recevrez un e-mail dans les prochains jours, après validation de votre inscription par un administrateur.";
}

function ajouterUtilisateurSansLof($Pdo, $prenom, $nom, $dateNaiss, $email, $tel, $nomChien, $dateNaissChien, $tatouage)
{
  $id = $Pdo->getNextId();
  $Pdo->insertUtilisateur($id, $prenom, $nom, $dateNaiss, $email, $tel);
  $Pdo->insertChienSansLof($tatouage, $nomChien, $dateNaissChien, $id);
  $Pdo->insertMembership($id, $tatouage);
  echo "Inscription d'un utilisateur avec un chien non lof terminée.<br>Vous recevrez un e-mail dans les prochains jours, après validation de votre inscription par un administrateur.";
}

function ajouterUtilisateurFamille($Pdo, $prenom, $nom, $dateNaiss, $email, $tel, $token)
{
  $id = $Pdo->getNextId();
  $Pdo->insertUtilisateurFamille($id, $prenom, $nom, $dateNaiss, $email, $tel);
  $chiens = $Pdo->getTousLesChiensParTokenFamille($token);
  foreach ($chiens as $c)
  {
    $Pdo->insertMembershipNonOwner($id, $c["tattoo_id"]);
  }
  echo "Inscription d'un membre de la famille terminée.<br>Vous recevrez un e-mail dans les prochains jours, après validation de votre inscription par un administrateur.";
}

/* Tente la connexion de l'utilisateur avec un email et un mot de passe
* retourne :
* 0 si les informations ne sont pas reconnues (email non enregistré)
* 1 si la connexion a réussie
* 2 si l'email est reconnu mais que l'utilisateur n'est pas validé
*/
function connexionUtilisateur($Pdo, $email, $mdp)
{
  $valide = $Pdo->checkValide($email);
  $ligne = $Pdo->connexionUtilisateur($email, $mdp);
  if ($valide["valide"] == "0") return 2;
  else if ($ligne["nb"] == "1") { $_SESSION["id_user"] = $ligne["id"]; return 1; }
  else return 0;
}

function connexionChat($email,$Pdo)
{
  $exists = $Pdo->testChatmember($email);
    if(!$exists)
    {
      $Pdo->insertChatmember($email);
    }
    $_SESSION['chat_user'] = $email;
}
?>