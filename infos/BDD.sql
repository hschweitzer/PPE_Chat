-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.14 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour domaineduverger
DROP DATABASE IF EXISTS `domaineduverger`;
CREATE DATABASE IF NOT EXISTS `domaineduverger` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `domaineduverger`;

-- Export de la structure de la table domaineduverger. admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table domaineduverger.admin : ~1 rows (environ)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`nom`, `mdp`) VALUES
	('toto', 'toto');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Export de la structure de la table domaineduverger. dog
DROP TABLE IF EXISTS `dog`;
CREATE TABLE IF NOT EXISTS `dog` (
  `tattoo_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `lof_number` varchar(50) DEFAULT NULL,
  `vaccine_date` date DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `race` varchar(50) DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`tattoo_id`),
  KEY `FK_dog_race` (`race`),
  KEY `FK_dog_member` (`id_owner`),
  CONSTRAINT `FK_dog_member` FOREIGN KEY (`id_owner`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dog_race` FOREIGN KEY (`race`) REFERENCES `race` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table domaineduverger.dog : ~7 rows (environ)
/*!40000 ALTER TABLE `dog` DISABLE KEYS */;
INSERT INTO `dog` (`tattoo_id`, `name`, `birthdate`, `lof_number`, `vaccine_date`, `photo`, `race`, `id_owner`) VALUES
	('A09', 'Odin', '2017-08-07', 'f47zfzf784', '2017-10-03', NULL, 'Husky sibérien', 0),
	('A27', 'Bobby', '2016-10-04', '6946984cgfy', '2015-10-04', 'images/bobby.jpg', 'Bichon à poil frisé', 1),
	('B015', 'Billy', '2014-10-26', NULL, NULL, NULL, NULL, 3),
	('C109', 'Medor', '2009-08-09', '4a8e87a48', NULL, NULL, 'Labrador', 5),
	('G48', 'Charles', '2008-07-08', 'zf45z8f7z', '2017-09-04', NULL, 'Cavalier King Charles', 0),
	('G98', 'Nasus', '2014-10-12', '47z45z487zf', '2017-10-12', NULL, 'Shiba Inu', 2),
	('J12', 'Jeanine', '2014-10-04', NULL, '2017-06-27', NULL, NULL, 1);
/*!40000 ALTER TABLE `dog` ENABLE KEYS */;

-- Export de la structure de la table domaineduverger. member
DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `token_for_family` char(6) DEFAULT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table domaineduverger.member : ~6 rows (environ)
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id`, `first_name`, `last_name`, `birthdate`, `address`, `zip_code`, `city`, `phone`, `email`, `password`, `token_for_family`, `valide`) VALUES
	(0, 'Michel', 'Dupont', '1963-02-12', '5, rue des vergers', '55000', 'Chienville', '', 'michel.dupont@hotmail.com', 'toto', 'ad815c', 1),
	(1, 'Caroline', 'Bergerac', '1996-04-28', '18, rue des chats', '55150', 'Chatville', '', 'caroline.bergerac@orange.fr', 'toto', 'ad8ad5', 0),
	(2, 'Maxime', 'Richier', '1999-02-02', '4f4efefef', '47884', 'fuhnjzff', '', 'maxime.c.richier@gmail.com', 'toto', 'gr8g4c', 0),
	(3, 'Toto', 'Toto', '1982-02-19', NULL, NULL, NULL, '0629184859', 'toto', NULL, 'dd8c54', 0),
	(4, 'titi', 'toto', '1988-08-08', NULL, NULL, NULL, '0807456644', 'titi', NULL, NULL, 0),
	(5, 'tata', 'Toto', '1980-12-01', NULL, NULL, NULL, '0875475123', 'tata', NULL, '3a9857', 0);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Export de la structure de la table domaineduverger. membership
DROP TABLE IF EXISTS `membership`;
CREATE TABLE IF NOT EXISTS `membership` (
  `id_owner` int(11) NOT NULL,
  `id_dog` varchar(50) NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_owner` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_owner`,`id_dog`),
  KEY `FK_membership_dog` (`id_dog`),
  CONSTRAINT `FK_membership_dog` FOREIGN KEY (`id_dog`) REFERENCES `dog` (`tattoo_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_membership_member` FOREIGN KEY (`id_owner`) REFERENCES `member` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table domaineduverger.membership : ~8 rows (environ)
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
INSERT INTO `membership` (`id_owner`, `id_dog`, `end_date`, `is_owner`) VALUES
	(0, 'A09', '2017-10-12', 1),
	(0, 'G48', '2018-10-12', 1),
	(1, 'A27', '2017-10-12', 1),
	(1, 'J12', '2017-10-12', 1),
	(2, 'G98', '2018-10-12', 1),
	(3, 'B015', '2017-10-15', 1),
	(4, 'B015', '2017-10-15', 0),
	(5, 'C109', '2017-10-15', 1);
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;

-- Export de la structure de la table domaineduverger. race
DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `name` varchar(50) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table domaineduverger.race : ~305 rows (environ)
/*!40000 ALTER TABLE `race` DISABLE KEYS */;
INSERT INTO `race` (`name`, `photo`) VALUES
	('Affenpinscher', '/home/commun/images_chiens/Affenpinscher.jpg'),
	('Airedale Terrier', '/home/commun/images_chiens/Airedale Terrier.jpg'),
	('Akita américain', '/home/commun/images_chiens/Akita américain.jpg'),
	('Akita inu', '/home/commun/images_chiens/Akita inu.jpg'),
	('American staffordshire', '/home/commun/images_chiens/American staffordshire.jpg'),
	('Ariégeois', '/home/commun/images_chiens/Ariégeois.jpg'),
	('Azawakh', '/home/commun/images_chiens/Azawakh.jpg'),
	('Barbet', '/home/commun/images_chiens/Barbet.jpg'),
	('Barbu tchèque', '/home/commun/images_chiens/Barbu tchèque.jpg'),
	('Barzoï', '/home/commun/images_chiens/Barzoï.jpg'),
	('Basenji', '/home/commun/images_chiens/Basenji.jpg'),
	('Basset artésien normand', '/home/commun/images_chiens/Basset artésien normand.jpg'),
	('Basset de Westphalie', '/home/commun/images_chiens/Basset de Westphalie.jpg'),
	('Basset des Alpes', '/home/commun/images_chiens/Basset des Alpes.jpg'),
	('Basset fauve de Bretagne', '/home/commun/images_chiens/Basset fauve de Bretagne.jpg'),
	('Basset hound', '/home/commun/images_chiens/Basset hound.jpg'),
	('Beagle', '/home/commun/images_chiens/Beagle.jpg'),
	('Beagle-harrier', '/home/commun/images_chiens/Beagle-harrier.jpg'),
	('Bearded collie', '/home/commun/images_chiens/Bearded collie.jpg'),
	('Beauceron', '/home/commun/images_chiens/Beauceron.jpg'),
	('Bedlington terrier', '/home/commun/images_chiens/Bedlington terrier.jpg'),
	('Berger Allemand', '/home/commun/images_chiens/Berger Allemand.jpg'),
	('Berger Australien', '/home/commun/images_chiens/Berger Australien.jpg'),
	('Berger belge Malinois', '/home/commun/images_chiens/Berger belge Malinois.jpg'),
	('Berger blanc suisse', '/home/commun/images_chiens/Berger blanc suisse.jpg'),
	('Berger catalan', '/home/commun/images_chiens/Berger catalan.jpg'),
	('Berger d&rsquo;Anatolie', '/home/commun/images_chiens/Berger d&rsquo;Anatolie.jpg'),
	('Berger d&rsquo;Asie centrale', '/home/commun/images_chiens/Berger d&rsquo;Asie centrale.jpg'),
	('Berger d&rsquo;Islande', '/home/commun/images_chiens/Berger d&rsquo;Islande.jpg'),
	('Berger de Bergame', '/home/commun/images_chiens/Berger de Bergame.jpg'),
	('Berger de Brie', '/home/commun/images_chiens/Berger de Brie.jpg'),
	('Berger de l’Atlas', '/home/commun/images_chiens/Berger de l’Atlas.jpg'),
	('Berger de Marenne et des Abruzzes', '/home/commun/images_chiens/Berger de Marenne et des Abruzzes.jpg'),
	('Berger de Russie', '/home/commun/images_chiens/Berger de Russie.jpg'),
	('Berger des Pyrénées', '/home/commun/images_chiens/Berger des Pyrénées.jpg'),
	('Berger des Shetland', '/home/commun/images_chiens/Berger des Shetland.jpg'),
	('Berger du Caucase', '/home/commun/images_chiens/Berger du Caucase.jpg'),
	('Berger du Karst', '/home/commun/images_chiens/Berger du Karst.jpg'),
	('Berger finnois de Laponie', '/home/commun/images_chiens/Berger finnois de Laponie.jpg'),
	('Berger Hollandais', '/home/commun/images_chiens/Berger Hollandais.jpg'),
	('Berger Picard', '/home/commun/images_chiens/Berger Picard.jpg'),
	('Berger polonais de plaine', '/home/commun/images_chiens/Berger polonais de plaine.jpg'),
	('Berger polonais de Podhale', '/home/commun/images_chiens/Berger polonais de Podhale.jpg'),
	('Berger portugais', '/home/commun/images_chiens/Berger portugais.jpg'),
	('Berger yougoslave', '/home/commun/images_chiens/Berger yougoslave.jpg'),
	('Bichon à poil frisé', '/home/commun/images_chiens/Bichon à poil frisé.jpg'),
	('Bichon bolonais', '/home/commun/images_chiens/Bichon bolonais.jpg'),
	('Bichon havanais', '/home/commun/images_chiens/Bichon havanais.jpg'),
	('Bichon maltais', '/home/commun/images_chiens/Bichon maltais.jpg'),
	('Billy', '/home/commun/images_chiens/Billy.jpg'),
	('Black and tan coonhound', '/home/commun/images_chiens/Black and tan coonhound.jpg'),
	('Bobtail', '/home/commun/images_chiens/Bobtail.jpg'),
	('Border collie', '/home/commun/images_chiens/Border collie.jpg'),
	('Border terrier', '/home/commun/images_chiens/Border terrier.jpg'),
	('Boston Terrier', '/home/commun/images_chiens/Boston Terrier.jpg'),
	('Bouledogue français', '/home/commun/images_chiens/Bouledogue français.jpg'),
	('Bouvier bernois', '/home/commun/images_chiens/Bouvier bernois.jpg'),
	('Bouvier d&rsquo;Appenzell', '/home/commun/images_chiens/Bouvier d&rsquo;Appenzell.jpg'),
	('Bouvier de l&rsquo;Entlebuch', '/home/commun/images_chiens/Bouvier de l&rsquo;Entlebuch.jpg'),
	('Bouvier des Ardennes', '/home/commun/images_chiens/Bouvier des Ardennes.jpg'),
	('Bouvier des Flandres', '/home/commun/images_chiens/Bouvier des Flandres.jpg'),
	('Bouvier d’Australie', '/home/commun/images_chiens/Bouvier d’Australie.jpg'),
	('Boxer', '/home/commun/images_chiens/Boxer.jpg'),
	('Brachet allemand', '/home/commun/images_chiens/Brachet allemand.jpg'),
	('Brachet autrichien', '/home/commun/images_chiens/Brachet autrichien.jpg'),
	('Brachet de Styrie à poil dur', '/home/commun/images_chiens/Brachet de Styrie à poil dur.jpg'),
	('Brachet polonais', '/home/commun/images_chiens/Brachet polonais.jpg'),
	('Brachet tyrolien', '/home/commun/images_chiens/Brachet tyrolien.jpg'),
	('Braque allemand à poil court', '/home/commun/images_chiens/Braque allemand à poil court.jpg'),
	('Braque allemand à poil dur', '/home/commun/images_chiens/Braque allemand à poil dur.jpg'),
	('Braque allemand à poil raide', '/home/commun/images_chiens/Braque allemand à poil raide.jpg'),
	('Braque d&rsquo;Auvergne', '/home/commun/images_chiens/Braque d&rsquo;Auvergne.jpg'),
	('Braque de Burgos', '/home/commun/images_chiens/Braque de Burgos.jpg'),
	('Braque de l&rsquo;Ariège', '/home/commun/images_chiens/Braque de l&rsquo;Ariège.jpg'),
	('Braque de Weimar', '/home/commun/images_chiens/Braque de Weimar.jpg'),
	('Braque du Bourbonnais', '/home/commun/images_chiens/Braque du Bourbonnais.jpg'),
	('Braque français', '/home/commun/images_chiens/Braque français.jpg'),
	('Braque hongrois à poil court', '/home/commun/images_chiens/Braque hongrois à poil court.jpg'),
	('Braque hongrois à poil dur', '/home/commun/images_chiens/Braque hongrois à poil dur.jpg'),
	('Braque italien', '/home/commun/images_chiens/Braque italien.jpg'),
	('Braque Saint-Germain', '/home/commun/images_chiens/Braque Saint-Germain.jpg'),
	('Braque slovaque à poil dur', '/home/commun/images_chiens/Braque slovaque à poil dur.jpg'),
	('Briquet griffon vendéen', '/home/commun/images_chiens/Briquet griffon vendéen.jpg'),
	('Broholmer', '/home/commun/images_chiens/Broholmer.jpg'),
	('Buhund norvégien', '/home/commun/images_chiens/Buhund norvégien.jpg'),
	('Bull terrier', '/home/commun/images_chiens/Bull terrier.jpg'),
	('Bulldog anglais', '/home/commun/images_chiens/Bulldog anglais.jpg'),
	('Bullmastiff', '/home/commun/images_chiens/Bullmastiff.jpg'),
	('Cairn terrier', '/home/commun/images_chiens/Cairn terrier.jpg'),
	('Cane corso', '/home/commun/images_chiens/Cane corso.jpg'),
	('Caniche', '/home/commun/images_chiens/Caniche.jpg'),
	('Cao fila de São Miguel', '/home/commun/images_chiens/Cao fila de São Miguel.jpg'),
	('Carlin', '/home/commun/images_chiens/Carlin.jpg'),
	('Cavalier King Charles', '/home/commun/images_chiens/Cavalier King Charles.jpg'),
	('Chesapeake Bay Retriever', '/home/commun/images_chiens/Chesapeake Bay Retriever.jpg'),
	('Chien chinois à crête', '/home/commun/images_chiens/Chien chinois à crête.jpg'),
	('Chien courant de Bosnie à poil dur', '/home/commun/images_chiens/Chien courant de Bosnie à poil dur.jpg'),
	('Chien courant de Halden', '/home/commun/images_chiens/Chien courant de Halden.jpg'),
	('Chien courant de Hygen', '/home/commun/images_chiens/Chien courant de Hygen.jpg'),
	('Chien courant de Posavatz', '/home/commun/images_chiens/Chien courant de Posavatz.jpg'),
	('Chien courant de Transylvanie', '/home/commun/images_chiens/Chien courant de Transylvanie.jpg'),
	('Chien courant d’Istrie à poil dur', '/home/commun/images_chiens/Chien courant d’Istrie à poil dur.jpg'),
	('Chien courant d’Istrie à poil ras', '/home/commun/images_chiens/Chien courant d’Istrie à poil ras.jpg'),
	('Chien courant espagnol', '/home/commun/images_chiens/Chien courant espagnol.jpg'),
	('Chien courant finlandais', '/home/commun/images_chiens/Chien courant finlandais.jpg'),
	('Chien courant grec', '/home/commun/images_chiens/Chien courant grec.jpg'),
	('Chien courant italien à poil dur', '/home/commun/images_chiens/Chien courant italien à poil dur.jpg'),
	('Chien courant italien à poil ras', '/home/commun/images_chiens/Chien courant italien à poil ras.jpg'),
	('Chien courant serbe', '/home/commun/images_chiens/Chien courant serbe.jpg'),
	('Chien courant slovaque', '/home/commun/images_chiens/Chien courant slovaque.jpg'),
	('Chien courant suisse', '/home/commun/images_chiens/Chien courant suisse.jpg'),
	('Chien courant yougoslave de montagne', '/home/commun/images_chiens/Chien courant yougoslave de montagne.jpg'),
	('Chien courant yougoslave tricolore', '/home/commun/images_chiens/Chien courant yougoslave tricolore.jpg'),
	('Chien d&rsquo;arrêt allemand à poil long', '/home/commun/images_chiens/Chien d&rsquo;arrêt allemand à poil long.jpg'),
	('Chien d&rsquo;arrêt portugais', '/home/commun/images_chiens/Chien d&rsquo;arrêt portugais.jpg'),
	('Chien d&rsquo;Artois', '/home/commun/images_chiens/Chien d&rsquo;Artois.jpg'),
	('Chien d&rsquo;eau américain', '/home/commun/images_chiens/Chien d&rsquo;eau américain.jpg'),
	('Chien d&rsquo;eau espagnol', '/home/commun/images_chiens/Chien d&rsquo;eau espagnol.jpg'),
	('Chien d&rsquo;eau frison', '/home/commun/images_chiens/Chien d&rsquo;eau frison.jpg'),
	('Chien d&rsquo;eau irlandais', '/home/commun/images_chiens/Chien d&rsquo;eau irlandais.jpg'),
	('Chien d&rsquo;eau portugais', '/home/commun/images_chiens/Chien d&rsquo;eau portugais.jpg'),
	('Chien d&rsquo;eau romagnol', '/home/commun/images_chiens/Chien d&rsquo;eau romagnol.jpg'),
	('Chien d&rsquo;élan norvégien', '/home/commun/images_chiens/Chien d&rsquo;élan norvégien.jpg'),
	('Chien de berger de Croatie', '/home/commun/images_chiens/Chien de berger de Croatie.jpg'),
	('Chien de berger de Majorque', '/home/commun/images_chiens/Chien de berger de Majorque.jpg'),
	('Chien de Canaan', '/home/commun/images_chiens/Chien de Canaan.jpg'),
	('Chien de Castro Laboreiro', '/home/commun/images_chiens/Chien de Castro Laboreiro.jpg'),
	('Chien de montagne des Pyrénées', '/home/commun/images_chiens/Chien de montagne des Pyrénées.jpg'),
	('Chien de montagne portugais', '/home/commun/images_chiens/Chien de montagne portugais.jpg'),
	('Chien de Saint-Hubert', '/home/commun/images_chiens/Chien de Saint-Hubert.jpg'),
	('Chien de Taïwan', '/home/commun/images_chiens/Chien de Taïwan.jpg'),
	('Chien du Groenland', '/home/commun/images_chiens/Chien du Groenland.jpg'),
	('Chien du pharaon', '/home/commun/images_chiens/Chien du pharaon.jpg'),
	('Chien d’élan suédois', '/home/commun/images_chiens/Chien d’élan suédois.jpg'),
	('Chien d’ours de Carélie', '/home/commun/images_chiens/Chien d’ours de Carélie.jpg'),
	('Chien d’Oysel', '/home/commun/images_chiens/Chien d’Oysel.jpg'),
	('Chien finnois de Laponie', '/home/commun/images_chiens/Chien finnois de Laponie.jpg'),
	('Chien norvégien de Macareux', '/home/commun/images_chiens/Chien norvégien de Macareux.jpg'),
	('Chien nu du Pérou', '/home/commun/images_chiens/Chien nu du Pérou.jpg'),
	('Chien nu mexicain', '/home/commun/images_chiens/Chien nu mexicain.jpg'),
	('Chien rouge de Bavière', '/home/commun/images_chiens/Chien rouge de Bavière.jpg'),
	('Chien rouge de Hanovre', '/home/commun/images_chiens/Chien rouge de Hanovre.jpg'),
	('Chien suédois de Laponie', '/home/commun/images_chiens/Chien suédois de Laponie.jpg'),
	('Chien thaïlandais', '/home/commun/images_chiens/Chien thaïlandais.jpg'),
	('Chien-loup de Saarloos', '/home/commun/images_chiens/Chien-loup de Saarloos.jpg'),
	('Chien-loup tchèque', '/home/commun/images_chiens/Chien-loup tchèque.jpg'),
	('Chihuahua', '/home/commun/images_chiens/Chihuahua.jpg'),
	('Chow-chow', '/home/commun/images_chiens/Chow-chow.jpg'),
	('Cirneco de l&rsquo;Etna', '/home/commun/images_chiens/Cirneco de l&rsquo;Etna.jpg'),
	('Clumber Spaniel', '/home/commun/images_chiens/Clumber Spaniel.jpg'),
	('Cocker américain', '/home/commun/images_chiens/Cocker américain.jpg'),
	('Cocker spaniel anglais', '/home/commun/images_chiens/Cocker spaniel anglais.jpg'),
	('Colley à poil court', '/home/commun/images_chiens/Colley à poil court.jpg'),
	('Colley à poil long  &#8211; Collie rough', '/home/commun/images_chiens/Colley à poil long  &#8211; Collie rough.jpg'),
	('Coton de Tuléar', '/home/commun/images_chiens/Coton de Tuléar.jpg'),
	('Dalmatien', '/home/commun/images_chiens/Dalmatien.jpg'),
	('Dandie Dinmont Terrier', '/home/commun/images_chiens/Dandie Dinmont Terrier.jpg'),
	('Dobermann', '/home/commun/images_chiens/Dobermann.jpg'),
	('Dogo Canario', '/home/commun/images_chiens/Dogo Canario.jpg'),
	('Dogue allemand', '/home/commun/images_chiens/Dogue allemand.jpg'),
	('Dogue argentin', '/home/commun/images_chiens/Dogue argentin.jpg'),
	('Dogue de Bordeaux', '/home/commun/images_chiens/Dogue de Bordeaux.jpg'),
	('Dogue de Majorque', '/home/commun/images_chiens/Dogue de Majorque.jpg'),
	('Dogue du Tibet', '/home/commun/images_chiens/Dogue du Tibet.jpg'),
	('Drever', '/home/commun/images_chiens/Drever.jpg'),
	('Dunker', '/home/commun/images_chiens/Dunker.jpg'),
	('Epagneul à perdrix de Drente', '/home/commun/images_chiens/Epagneul à perdrix de Drente.jpg'),
	('Epagneul bleu de Picardie', '/home/commun/images_chiens/Epagneul bleu de Picardie.jpg'),
	('Epagneul breton', '/home/commun/images_chiens/Epagneul breton.jpg'),
	('Epagneul de Pont-Audemer', '/home/commun/images_chiens/Epagneul de Pont-Audemer.jpg'),
	('Epagneul français', '/home/commun/images_chiens/Epagneul français.jpg'),
	('Epagneul japonais', '/home/commun/images_chiens/Epagneul japonais.jpg'),
	('Epagneul nain continental', '/home/commun/images_chiens/Epagneul nain continental.jpg'),
	('Epagneul picard', '/home/commun/images_chiens/Epagneul picard.jpg'),
	('Epagneul tibétain', '/home/commun/images_chiens/Epagneul tibétain.jpg'),
	('Eurasier', '/home/commun/images_chiens/Eurasier.jpg'),
	('Field Spaniel', '/home/commun/images_chiens/Field Spaniel.jpg'),
	('Fila Brasileiro', '/home/commun/images_chiens/Fila Brasileiro.jpg'),
	('Flat-Coated Retriever', '/home/commun/images_chiens/Flat-Coated Retriever.jpg'),
	('Fox-Terrier', '/home/commun/images_chiens/Fox-Terrier.jpg'),
	('Foxhound américain', '/home/commun/images_chiens/Foxhound américain.jpg'),
	('Foxhound anglais', '/home/commun/images_chiens/Foxhound anglais.jpg'),
	('Français blanc et noir', '/home/commun/images_chiens/Français blanc et noir.jpg'),
	('Français tricolore', '/home/commun/images_chiens/Français tricolore.jpg'),
	('Golden Retriever', '/home/commun/images_chiens/Golden Retriever.jpg'),
	('Grand Anglo-Français blanc et noir', '/home/commun/images_chiens/Grand Anglo-Français blanc et noir.jpg'),
	('Grand Anglo-Français blanc et orange', '/home/commun/images_chiens/Grand Anglo-Français blanc et orange.jpg'),
	('Grand Anglo-Français tricolore', '/home/commun/images_chiens/Grand Anglo-Français tricolore.jpg'),
	('Grand Basset Griffon vendéen', '/home/commun/images_chiens/Grand Basset Griffon vendéen.jpg'),
	('Grand bleu de Gascogne', '/home/commun/images_chiens/Grand bleu de Gascogne.jpg'),
	('Grand bouvier suisse', '/home/commun/images_chiens/Grand bouvier suisse.jpg'),
	('Grand épagneul de Münster', '/home/commun/images_chiens/Grand épagneul de Münster.jpg'),
	('Grand Griffon vendéen', '/home/commun/images_chiens/Grand Griffon vendéen.jpg'),
	('Greyhound', '/home/commun/images_chiens/Greyhound.jpg'),
	('Griffon à poil dur Korthals', '/home/commun/images_chiens/Griffon à poil dur Korthals.jpg'),
	('Griffon belge', '/home/commun/images_chiens/Griffon belge.jpg'),
	('Griffon bruxellois', '/home/commun/images_chiens/Griffon bruxellois.jpg'),
	('Griffon fauve de Bretagne', '/home/commun/images_chiens/Griffon fauve de Bretagne.jpg'),
	('Griffon nivernais', '/home/commun/images_chiens/Griffon nivernais.jpg'),
	('Hamilton stövare', '/home/commun/images_chiens/Hamilton stövare.jpg'),
	('Harrier', '/home/commun/images_chiens/Harrier.jpg'),
	('Hokkaido Ken', '/home/commun/images_chiens/Hokkaido Ken.jpg'),
	('Hovawart', '/home/commun/images_chiens/Hovawart.jpg'),
	('Husky sibérien', '/home/commun/images_chiens/Husky sibérien.jpg'),
	('Jack Russel', '/home/commun/images_chiens/Jack Russel.jpg'),
	('Jagdterrier', '/home/commun/images_chiens/Jagdterrier.jpg'),
	('Jindo coréen', '/home/commun/images_chiens/Jindo coréen.jpg'),
	('Kai', '/home/commun/images_chiens/Kai.jpg'),
	('Kelpie australien', '/home/commun/images_chiens/Kelpie australien.jpg'),
	('Kerry Blue Terrier', '/home/commun/images_chiens/Kerry Blue Terrier.jpg'),
	('Kishu', '/home/commun/images_chiens/Kishu.jpg'),
	('Komondor', '/home/commun/images_chiens/Komondor.jpg'),
	('Kromfohrländer', '/home/commun/images_chiens/Kromfohrländer.jpg'),
	('Kuvasz', '/home/commun/images_chiens/Kuvasz.jpg'),
	('Labrador', '/home/commun/images_chiens/Labrador.jpg'),
	('Laïka de Sibérie occidentale', '/home/commun/images_chiens/Laïka de Sibérie occidentale.jpg'),
	('Laïka de Sibérie orientale', '/home/commun/images_chiens/Laïka de Sibérie orientale.jpg'),
	('Lakeland Terrier', '/home/commun/images_chiens/Lakeland Terrier.jpg'),
	('Landseer', '/home/commun/images_chiens/Landseer.jpg'),
	('Léonberg', '/home/commun/images_chiens/Léonberg.jpg'),
	('Lévrier afghan', '/home/commun/images_chiens/Lévrier afghan.jpg'),
	('Lévrier écossais', '/home/commun/images_chiens/Lévrier écossais.jpg'),
	('Lévrier espagnol', '/home/commun/images_chiens/Lévrier espagnol.jpg'),
	('Lévrier hongrois', '/home/commun/images_chiens/Lévrier hongrois.jpg'),
	('Lévrier irlandais', '/home/commun/images_chiens/Lévrier irlandais.jpg'),
	('Lévrier polonais', '/home/commun/images_chiens/Lévrier polonais.jpg'),
	('Lhassa Apso', '/home/commun/images_chiens/Lhassa Apso.jpg'),
	('Malamute de l&rsquo;Alaska', '/home/commun/images_chiens/Malamute de l&rsquo;Alaska.jpg'),
	('Manchester terrier', '/home/commun/images_chiens/Manchester terrier.jpg'),
	('Mastiff anglais', '/home/commun/images_chiens/Mastiff anglais.jpg'),
	('Mâtin de Naples', '/home/commun/images_chiens/Mâtin de Naples.jpg'),
	('Mâtin espagnol', '/home/commun/images_chiens/Mâtin espagnol.jpg'),
	('Mudi', '/home/commun/images_chiens/Mudi.jpg'),
	('Norfolk Terrier', '/home/commun/images_chiens/Norfolk Terrier.jpg'),
	('Norwich Terrier', '/home/commun/images_chiens/Norwich Terrier.jpg'),
	('Otterhound', '/home/commun/images_chiens/Otterhound.jpg'),
	('Parson Russell Terrier', '/home/commun/images_chiens/Parson Russell Terrier.jpg'),
	('Pékinois', '/home/commun/images_chiens/Pékinois.jpg'),
	('Petit Basset Griffon Vendéen', '/home/commun/images_chiens/Petit Basset Griffon Vendéen.jpg'),
	('Petit bleu de Gascogne', '/home/commun/images_chiens/Petit bleu de Gascogne.jpg'),
	('Petit brabançon', '/home/commun/images_chiens/Petit brabançon.jpg'),
	('Petit chien courant suisse', '/home/commun/images_chiens/Petit chien courant suisse.jpg'),
	('Petit chien hollandais de chasse au gibier d&rsquo', '/home/commun/images_chiens/Petit chien hollandais de chasse au gibier d&rsquo;eau.jpg'),
	('Petit chien lion', '/home/commun/images_chiens/Petit chien lion.jpg'),
	('Petit Lévrier italien', '/home/commun/images_chiens/Petit Lévrier italien.jpg'),
	('Petit Münsterländer', '/home/commun/images_chiens/Petit Münsterländer.jpg'),
	('Pinscher', '/home/commun/images_chiens/Pinscher.jpg'),
	('Pinscher autrichien à poil court', '/home/commun/images_chiens/Pinscher autrichien à poil court.jpg'),
	('Pitbull ou American pitbull terrier', '/home/commun/images_chiens/Pitbull ou American pitbull terrier.jpg'),
	('Podenco canario', '/home/commun/images_chiens/Podenco canario.jpg'),
	('Podenco ibicenco', '/home/commun/images_chiens/Podenco ibicenco.jpg'),
	('Podenco portugais', '/home/commun/images_chiens/Podenco portugais.jpg'),
	('Pointer anglais', '/home/commun/images_chiens/Pointer anglais.jpg'),
	('Poitevin', '/home/commun/images_chiens/Poitevin.jpg'),
	('Pomsky', '/home/commun/images_chiens/Pomsky.jpg'),
	('Porcelaine', '/home/commun/images_chiens/Porcelaine.jpg'),
	('Pudelpointer', '/home/commun/images_chiens/Pudelpointer.jpg'),
	('Puli', '/home/commun/images_chiens/Puli.jpg'),
	('Pumi', '/home/commun/images_chiens/Pumi.jpg'),
	('Rafeiro do Alentejo', '/home/commun/images_chiens/Rafeiro do Alentejo.jpg'),
	('Retriever de la Nouvelle-Écosse', '/home/commun/images_chiens/Retriever de la Nouvelle-Écosse.jpg'),
	('Rhodesian Ridgeback', '/home/commun/images_chiens/Rhodesian Ridgeback.jpg'),
	('Rottweiler', '/home/commun/images_chiens/Rottweiler.jpg'),
	('Russkiy Toy', '/home/commun/images_chiens/Russkiy Toy.jpg'),
	('Saint-Bernard', '/home/commun/images_chiens/Saint-Bernard.jpg'),
	('Saluki', '/home/commun/images_chiens/Saluki.jpg'),
	('Samoyède', '/home/commun/images_chiens/Samoyède.jpg'),
	('Schnauzer', '/home/commun/images_chiens/Schnauzer.jpg'),
	('Setter anglais', '/home/commun/images_chiens/Setter anglais.jpg'),
	('Setter Gordon', '/home/commun/images_chiens/Setter Gordon.jpg'),
	('Setter irlandais rouge', '/home/commun/images_chiens/Setter irlandais rouge.jpg'),
	('Setter irlandais rouge et blanc', '/home/commun/images_chiens/Setter irlandais rouge et blanc.jpg'),
	('Shar Pei', '/home/commun/images_chiens/Shar Pei.jpg'),
	('Shiba Inu', '/home/commun/images_chiens/Shiba Inu.jpg'),
	('Shih Tzu', '/home/commun/images_chiens/Shih Tzu.jpg'),
	('Shikoku Ken', '/home/commun/images_chiens/Shikoku Ken.jpg'),
	('Silky Terrier', '/home/commun/images_chiens/Silky Terrier.jpg'),
	('Skye Terrier', '/home/commun/images_chiens/Skye Terrier.jpg'),
	('Sloughi', '/home/commun/images_chiens/Sloughi.jpg'),
	('Slovensky cuvac', '/home/commun/images_chiens/Slovensky cuvac.jpg'),
	('Smous des Pays-Bas', '/home/commun/images_chiens/Smous des Pays-Bas.jpg'),
	('Spinone', '/home/commun/images_chiens/Spinone.jpg'),
	('Spitz allemand', '/home/commun/images_chiens/Spitz allemand.jpg'),
	('Spitz de Norbotten', '/home/commun/images_chiens/Spitz de Norbotten.jpg'),
	('Spitz des Wisigoths', '/home/commun/images_chiens/Spitz des Wisigoths.jpg'),
	('Spitz Finlandais', '/home/commun/images_chiens/Spitz Finlandais.jpg'),
	('Spitz japonais', '/home/commun/images_chiens/Spitz japonais.jpg'),
	('Spitz nain', '/home/commun/images_chiens/Spitz nain.jpg'),
	('Springer anglais', '/home/commun/images_chiens/Springer anglais.jpg'),
	('Stabyhoun', '/home/commun/images_chiens/Stabyhoun.jpg'),
	('Staffordshire Bull Terrier', '/home/commun/images_chiens/Staffordshire Bull Terrier.jpg'),
	('Sussex Spaniel', '/home/commun/images_chiens/Sussex Spaniel.jpg'),
	('Terre-neuve', '/home/commun/images_chiens/Terre-neuve.jpg'),
	('Terrier Irlandais', '/home/commun/images_chiens/Terrier Irlandais.jpg'),
	('Terrier Irlandais à poil doux', '/home/commun/images_chiens/Terrier Irlandais à poil doux.jpg'),
	('Terrier Irlandais Glen of Imaal', '/home/commun/images_chiens/Terrier Irlandais Glen of Imaal.jpg'),
	('Terrier japonais', '/home/commun/images_chiens/Terrier japonais.jpg'),
	('Terrier noir russe', '/home/commun/images_chiens/Terrier noir russe.jpg'),
	('Terrier tibétain', '/home/commun/images_chiens/Terrier tibétain.jpg'),
	('Tosa', '/home/commun/images_chiens/Tosa.jpg'),
	('Welsh Corgi', '/home/commun/images_chiens/Welsh Corgi.jpg'),
	('Welsh Springer Spaniel', '/home/commun/images_chiens/Welsh Springer Spaniel.jpg'),
	('Welsh Terrier', '/home/commun/images_chiens/Welsh Terrier.jpg'),
	('Whippet', '/home/commun/images_chiens/Whippet.jpg'),
	('Yorkshire terrier', '/home/commun/images_chiens/Yorkshire terrier.jpg');
/*!40000 ALTER TABLE `race` ENABLE KEYS */;

-- Export de la structure de la table domaineduverger. second
DROP TABLE IF EXISTS `second`;
CREATE TABLE IF NOT EXISTS `second` (
  `id_member` int(11) DEFAULT NULL,
  `id_membership` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table domaineduverger.second : ~0 rows (environ)
/*!40000 ALTER TABLE `second` DISABLE KEYS */;
/*!40000 ALTER TABLE `second` ENABLE KEYS */;

-- Export de la structure de la table domaineduverger. validation
DROP TABLE IF EXISTS `validation`;
CREATE TABLE IF NOT EXISTS `validation` (
  `token` varchar(16) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  CONSTRAINT `FK_validation_member` FOREIGN KEY (`id_user`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table domaineduverger.validation : ~0 rows (environ)
/*!40000 ALTER TABLE `validation` DISABLE KEYS */;
/*!40000 ALTER TABLE `validation` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
