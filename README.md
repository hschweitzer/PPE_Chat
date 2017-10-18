# PPE_Chat
Ce PPE est basé sur une copie de https://github.com/hschweitzer/PPE_PIO
Version docker connexion bdd :

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
  
  Version locale connexion bdd :
  
    private static $bdd='dbname=domaineduverger';
  /*Docker
  private static $serveur='mysql:host=172.17.0.10';
  private static $user='maxime';
  private static $mdp='btssio';*/

  //Local
  private static $serveur='mysql:host=127.0.0.1';
  private static $user='root';
  private static $mdp='';
  private static $Pdo;
  private static $_PdoAssoc = null;
