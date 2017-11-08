<?php
class PdoAssoc
{
  private static $bdd='dbname=domaineduverger';
  /*Docker*/
  private static $serveur='mysql:host=172.17.0.6';
  private static $user='anthony';
  private static $mdp='btssio';

  /*Local
  private static $serveur='mysql:host=127.0.0.1';
  private static $user='root';
  private static $mdp='';*/
  private static $Pdo;
  private static $_PdoAssoc = null;

  private function __construct()
  {
    PdoAssoc::$Pdo = new PDO(PdoAssoc::$serveur.';'.PdoAssoc::$bdd, PdoAssoc::$user, PdoAssoc::$mdp);
    PdoAssoc::$Pdo->query("SET CHARACTER SET utf8");
    PdoAssoc::$Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    PdoAssoc::$Pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }
  public function __destruct(){
    PdoAssoc::$Pdo = null;
  }

  public static function getPdoAssoc()
  {
    if(PdoAssoc::$_PdoAssoc == null)
    {
      PdoAssoc::$_PdoAssoc = new PdoAssoc();
    }
    return PdoAssoc::$_PdoAssoc;
  }

  //CONNEXION
  public function connexion_admin($id, $mdp)
  {
    $req = 'SELECT COUNT(admin.nom) as nb FROM admin WHERE admin.nom="'.$id.'" AND admin.mdp="'.$mdp.'"';
		$res = PdoAssoc::$Pdo->query($req);
		$ligne = $res->fetch();
		if ($ligne["nb"] == "1") return true;
    return false;
  }

  public function checkValide($email) {
    $req = 'SELECT valide FROM member WHERE member.email="'.$email.'"';
		$res = PdoAssoc::$Pdo->query($req);
		$ligne = $res->fetch();
    return $ligne;
  }
  public function connexionUtilisateur($email, $mdp)
  {
    $req = 'SELECT COUNT(id) as nb, id FROM member WHERE member.email="'.$email.'" AND member.password="'.$mdp.'"';
		$res = PdoAssoc::$Pdo->query($req);
		$ligne = $res->fetch();
    return $ligne;
  }

  /*
  *SELECT
  */
  public function getAbonnement($idUser, $idChien) {
    $req = "SELECT * FROM membership WHERE id_owner = " . $idUser . ' AND id_dog = "' . $idChien . '"';
    $res = PdoAssoc::$Pdo->query($req);
    return $res->fetch();
  }
  public function getUtilisateurParId($id)  {
    $req = "SELECT * FROM member WHERE id = " . $id;
    $res = PdoAssoc::$Pdo->query($req);
    return $res->fetch();
  }

  public function getUtilisateurParToken($token)
  {
    $req = 'SELECT * FROM member WHERE token = ' . $token;
    $res = PdoAssoc::$Pdo->query($req);
    return $res->fetch();
  }

  public function getUtilisateurParTokenFamille($token)
  {
    $req = 'SELECT member.*, membership.* FROM member INNER JOIN membership ON membership.id_user = member.id WHERE token = "' . $token . '"';
    $res = PdoAssoc::$Pdo->query($req);
    return $res->fetch();
  }

  public function getTousLesChiensDunUtilisateur($idUser)
  { //TODO : table second
    $req = "SELECT dog.*, member.first_name as owner_first_name, member.last_name as owner_last_name FROM dog, member, membership WHERE dog.tattoo_id = membership.id_dog AND member.id = membership.id_owner and membership.id_owner = " . $idUser;
    $res = PdoAssoc::$Pdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }
  public function getTousLesChiens()
  {
    $req = "SELECT dog.*, member.first_name as owner_first_name, member.last_name as owner_last_name FROM dog, member, membership WHERE dog.tattoo_id = membership.id_dog AND member.id = membership.id_owner";
		$res = PdoAssoc::$Pdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
  }
  public function getTousLesChiensParTokenFamille($token)
  {
    $req = 'SELECT dog.* FROM membership, member, dog WHERE is_owner=1 AND token_for_family = "'.$token.'" AND membership.id_owner = member.id AND membership.id_dog = dog.tattoo_id;';
    $res = PdoAssoc::$Pdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
  }

  public function getTousLesUtilisateursValides()  {
    $req = "SELECT end_date, dog.tattoo_id, dog.name, dog.photo, member.* FROM dog, member, membership WHERE dog.tattoo_id = membership.id_dog AND member.id = membership.id_owner AND member.valide=1 ORDER BY member.id";
		$res = PdoAssoc::$Pdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
  }
 //TODO : problème duplicata
  public function getTouslesProfilsAValider()  {
    $req = "SELECT member.* FROM member WHERE member.valide=0";
    $res = PdoAssoc::$Pdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
  }

  public function getToutesLesRaces() {
    $req = "SELECT race.name FROM race;";
    $res = PdoAssoc::$Pdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
  }

  public function getChienParId($id) {
    $req = 'SELECT dog.* FROM dog WHERE tattoo_id="' . $id . '"';
    $res = PdoAssoc::$Pdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
  }

  public function getTousLesChiensParUtilisateur($idUser) {
    $req = "SELECT dog.*, end_date FROM dog INNER JOIN membership ON dog.tatto_id = membership.id_dog WHERE membership.id_owner=" . $idUser;
    $res = PdoAssoc::$Pdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function hasModifyRightOnDog($idUser, $tattooChien) {
    $req = 'SELECT COUNT(membership.idOwner) as nb FROM membership INNER JOIN member on membership.id_owner = "' . $idUser . '" INNER JOIN dog on membership.id_dog = "' . $tattooChien . '"';
    $res = PdoAssoc::$Pdo->query($req);
		$ligne = $res->fetch();
		if ($ligne["nb"] == "1") return true;
    return false;
  }

  public function getFinAbonnements($idUser) {
    $req = "SELECT dog.*, end_date FROM dog INNER JOIN membership ON dog.tattoo_id = membership.id_dog WHERE membership.id_owner=" . $idUser;
    $res = PdoAssoc::$Pdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function getNextId() {
    $req = "SELECT MAX(id) as last FROM member";
    $res = PdoAssoc::$Pdo->query($req);
    $ligne = $res->fetch();
    return $ligne["last"] + 1;
  }
  /*
  * INSERT
  */
    public function insertChien($tattooChien, $nom, $lof, $dateNaiss, $race, $idUser) {
      $req = 'INSERT INTO dog (tattoo_id, name, birthdate, race, LOF_number, id_owner)
      VALUES ("' .$tattooChien. '", "'.$nom.'", "'.$dateNaiss.'", "'.$race.'", "'.$lof.'", "'.$idUser.'")';
      PdoAssoc::$Pdo->exec($req);
    }
    public function insertChienSansLof($tattooChien, $nom, $dateNaiss, $idUser) {
      $req = 'INSERT INTO dog (tattoo_id, name, birthdate, id_owner)
      VALUES ("' .$tattooChien. '", "'.$nom.'", "'.$dateNaiss.'", "'.$idUser.'")';
      PdoAssoc::$Pdo->exec($req);
    }

    public function insertMembership($idUser, $idChien) {
      $req = 'INSERT INTO membership (id_owner, id_dog, end_date) VALUES ('.$idUser.', "'.$idChien.'", curdate())';
      PdoAssoc::$Pdo->exec($req);
    }
    public function insertMembershipNonOwner($idUser, $idChien) {
      $req = 'INSERT INTO membership (id_owner, id_dog, end_date, is_owner) VALUES ('.$idUser.', "'.$idChien.'", curdate(), 0)';
      PdoAssoc::$Pdo->exec($req);
    }

    public function insertToken($token, $idUser) {
      $req = 'INSERT INTO validation (id_user, token) VALUES ("'.$idUser.'", "'.$token.'")';
      PdoAssoc::$Pdo->exec($req);
    }

    public function insertUtilisateur($id, $prenom, $nom, $dateNaiss, $email, $tel)
    {
      $token = substr((string)md5(uniqid(mt_rand(), true)), 0, 6);
      $token =
      $req = 'INSERT INTO member (id, first_name, last_name, birthdate, email, phone, token_for_family) VALUES ('.$id.', "'.$prenom.'", "'.$nom.'", "'.$dateNaiss.'", "'.$email.'", "'.$tel.'", "'.$token.'")';
      PdoAssoc::$Pdo->exec($req);
    }

    public function insertUtilisateurFamille($id, $prenom, $nom, $dateNaiss, $email, $tel)
    {
      $req = 'INSERT INTO member (id, first_name, last_name, birthdate, email, phone) VALUES ('.$id.', "'.$prenom.'", "'.$nom.'", "'.$dateNaiss.'", "'.$email.'", "'.$tel.'")';
      PdoAssoc::$Pdo->exec($req);
    }

    public function insertChatmember($email)
    {
      $req = 'INSERT INTO chatmember (email) VALUES ("'.$email.'")';
      PdoAssoc::$Pdo->exec($req);
    }
  /*
  * UPDATE
  */
    public function genererTokenFamille($idUser) {
      $token = substr(md5(uniqid(mt_rand(), true)), 6);
      $req = 'UPDATE member SET token_for_family="'.$token.'" WHERE id='.$idUser;
      PdoAssoc::$Pdo->exec($req);
    }
    public function validerUtilisateur($id)
    {
      $req = "UPDATE member SET valide=1 WHERE id=".$id;
      PdoAssoc::$Pdo->exec($req);
    }
    public function updateUtilisateur($id, $prenom, $nom, $dateNaiss, $adresse, $cp, $city, $phone, $email, $password) {
      $req = 'UPDATE member SET
      first_name = "'.$prenom.'",
      last_name = "'.$nom.'",
      birthdate = "'.$dateNaiss.'",
      address = "'.$adresse.'",
      zip_code = "'.$cp.'",
      city = "'.$city.'",
      phone = "'.$phone.'",
      email = "'.$email.'",
      password = "'.$password.'"
      WHERE id = '.$id;
      PdoAssoc::$Pdo->exec($req);
    }

    public function updateMotDePasse($idUser, $mdp)
    {
      $req = 'UPDATE member SET password="'.$mdp.'" WHERE id='.$idUser;
      PdoAssoc::$Pdo->exec($req);
    }

    public function updateEndDate($idUser, $endDate)
    {
      $req = 'UPDATE membership SET end_date="'.$endDate.'" WHERE id_owner='.$idUser;
      PdoAssoc::$Pdo->exec($req);
    }

    /*Summary
    * idUser - utilisateur qui fait la modification
    * les autres informations concernent toutes le chien
    */
   public function updateChien($idUser, $tattooChien, $nom, $dateNaiss, $race, $LOF, $dateVaccin, $photo) {
     if (hasModifyRightOnDog($idUser, $tattooChien)) {
       $req = 'UPDATE dog SET name = "'.$nom.'", birthdate = "'.$dateNaiss.'", race = "'.$race.'", LOF_number = "'.$LOF.'", vaccine_date = "'.$dateVaccin.'", photo = "'.$photo.'" WHERE tattoo_id = "' .$tattooChien. '"';
       PdoAssoc::$Pdo->exec($req);
       return true;
     }
     else return false;
   }
  /*
  * DELETE
  */
  public function deleteChien($idUser, $idChien) {
    if (hasModifyRightOnDog($idUser, $idChien)) {
      $req = "DELETE FROM dog WHERE tattoo_id=".$id;
      PdoAssoc::$Pdo->exec($req);
    }
  }

  public function deleteUtilisateur($id) {
    $req = "DELETE FROM member WHERE id=".$id;
    PdoAssoc::$Pdo->exec($req);
  }

  public function deleteValidation($token) {
    $req = 'DELETE FROM validation WHERE token = "' . $token . '"';
    PdoAssoc::$Pdo->exec($req);
  }

  /*
  *TEST
  */
  public function testChatmember($email)
  {
    $req = 'SELECT id FROM chatmember WHERE email = "'.$email.'"';
    $res = PdoAssoc::$Pdo->query($req);
    return $res->fetch();
  }
}
