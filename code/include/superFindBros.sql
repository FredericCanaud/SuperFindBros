SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema super_find_bros
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `super_find_bros` DEFAULT CHARACTER SET utf8 ;

USE `super_find_bros` ;

-- -----------------------------------------------------
-- Table `super_find_bros`.`personne`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`personne` (
  `per_num` INT NOT NULL AUTO_INCREMENT,
  `per_prenom` VARCHAR(45),
  `per_nom` VARCHAR(45),
  `per_age` INT(3),
  `per_mail` VARCHAR(80) NOT NULL,
  `per_pseudo` VARCHAR(45) NOT NULL,
  `per_mdp` VARCHAR(50) NOT NULL,
  `per_avatar` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`per_num`))
ENGINE = InnoDB;

INSERT INTO `personne` (`per_num`, `per_prenom`, `per_nom`, `per_age`, `per_mail`, `per_pseudo`, `per_mdp`, `per_avatar`) VALUES
(1,'Caroline',NULL,26,'caroline@gmail.com','caroLaBoss','f1ddfc6dc0d8a0efbf1f03c4f7c7679eb45a7002','1.jpg'),
(2,'Roger','Sanchez',42,'roger@gmail.com','rogerLaBoss','b79daf85e1ac6328c8d038f56b36cd738def2daa','2.jpg'),
(3,'Emmanuel','Moman',31,'moman@gmail.com','momanus','5b13bf52015603d3af7b450dd2f8daefded88c08','3.jpg'),
(4,'Delphine','Belle',24,'delphine@xnxx.com','belleDelphine','0b07b07cea5bcd7d6d411e7bd683282ce8bd996a','4.jpg'),
(5,'Timeo',NULL,7,'timeo@hotmail.fr','XxDarkSasukexX','33f842745fe47b771aa51c89206666de11ed34a8','5.jpg'),
(6,'Manon',NULL,21,'manon@gmail.com','superManon','316555c8cadb8a55e6108eb60ae6e28dbe63194e','6.jpg'),
(7,'Xavier','Dang',40,'mistermv@lefigaro.fr','mistermv','ce76adfc5ae41ff34edc3f1999672665b9e4ee45','7.png');

-- -----------------------------------------------------
-- Table `super_find_bros`.`jeu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`jeu` (
  `jeu_num` INT NOT NULL AUTO_INCREMENT,
  `jeu_nom` VARCHAR(80) NOT NULL,
  `jeu_annee` YEAR(4) NOT NULL,
  `jeu_editeur` VARCHAR(45) NOT NULL,
  `jeu_description` VARCHAR(500) NOT NULL,
  `jeu_image` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`jeu_num`))
ENGINE = InnoDB;

INSERT INTO `jeu` (`jeu_num`, `jeu_nom`, `jeu_annee`, `jeu_editeur`, `jeu_description`, `jeu_image`) VALUES
(1,'Among Us',2018,'InnerSloth','Chaque joueur incarne un des membres de l''équipage d''un vaisseau spatial, chacun pouvant être soit un équipier, soit un imposteur', 'amongUs.png'),
(2,'Fall Guys: Ultimate Knockout',2020,'Devolver Digital','Jeu vidéo multijoueur fortement inspiré des jeux télévisés de course d''obstacles comme Takeshi Castle', 'fallGuys.png'),
(3,'Super Smash Bros.',2018,'Nintendo','Jeu de combat multijoueur, crossover des différents univers de Nintendo', 'superSmashBros.png'),
(4,'Rocket League',2015,'Psyonix','Jeu vidéo de sport où les joueurs, conduisant des voitures, doivent frapper un ballon afin de marquer dans le but adverse. Les voitures sont équipées de boost et peuvent sauter, permettant de jouer le ballon dans les airs.', 'rocketLeague.jpg'),
(5,'Counter-Strike: Global Offensive',2012,'Valve Corporation','Les anti-terroristes et les terroristes s''affrontent dans différents modes de jeu avec une trentaine d''armes différentes, sans compter les grenades. Un mode entraînement permet aux joueurs de s''habituer aux commandes.', 'csgo.png'),
(6,'Civilisation VI',2016,'2K Games','Comme pour les précédents jeux de la série Civilization, le joueur est convié à diriger une « civilisation » (en réalité une nation ou un empire) de ses humbles débuts de chasseurs-cueilleurs jusqu''à un avenir technologique caractérisé notamment par une course à l''exploration spatiale.', 'civ6.png'),
(7,'League Of Legends',2009,'Riot Games','Le joueur contrôle un champion aux compétences uniques dont la puissance augmente au fil de la partie se battant contre une équipe de joueurs en temps réel la plupart du temps. L''objectif d''une partie est, dans la quasi-totalité des modes de jeu, de détruire le « Nexus » ennemi', 'leagueOfLegends.png'),
(8,'Animal Crossing: New Horizons',2020,'Nintendo','Abandonnés à eux-même sur une île perdue par Tom Nook dans le cadre d''un programme nommé "Formule Évasion", les joueurs font connaissance avec toutes sortes d''animaux avec lesquels ils peuvent sympathiser. Il faut ensuite s''établir en s''aidant des conseils d''un outil d''assistance (le NookPhone)', 'acnh.png');

-- -----------------------------------------------------
-- Table `super_find_bros`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`type` (
  `typ_num` INT NOT NULL,
  `typ_genre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`typ_num`))
ENGINE = InnoDB;

INSERT INTO `type` (`typ_num`, `typ_genre`) VALUES
(1,'FPS'),
(2,'Simulation'),
(3,'Stratégie'),
(4,'Combat'),
(5,'Course'),
(6,'Party');

-- -----------------------------------------------------
-- Table `super_find_bros`.`estdetype`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`estdetype` (
  `jeu_num` INT NOT NULL,
  `typ_num` INT NOT NULL,
  PRIMARY KEY (`jeu_num`, `typ_num`),
  FOREIGN KEY (`typ_num`) REFERENCES `super_find_bros`.`type` (`typ_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (`jeu_num`) REFERENCES `super_find_bros`.`jeu` (`jeu_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `estdetype` (`jeu_num`, `typ_num`) VALUES
(1,3),
(1,6),
(2,5),
(2,6),
(3,4),
(4,5),
(5,1),
(6,3),
(7,3),
(8,6);

-- -----------------------------------------------------
-- Table `super_find_bros`.`possede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`possede` (
  `per_num` INT NOT NULL,
  `jeu_num` INT NOT NULL,
  `tempsdejeumoyen` DECIMAL(5) NOT NULL,
  PRIMARY KEY (`per_num`, `jeu_num`),
  FOREIGN KEY (`per_num`) REFERENCES `super_find_bros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (`jeu_num`) REFERENCES `super_find_bros`.`jeu` (`jeu_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `possede` (`per_num`, `jeu_num`, `tempsdejeumoyen`) VALUES
(1,2,10),
(1,8,20),
(2,5,850),
(3,1,100),
(3,2,400),
(3,5,1),
(3,6,10),
(4,7,300),
(4,8,50),
(5,4,1500),
(5,7,1000),
(6,1,10),
(7,1,200),
(7,2,100),
(7,3,75),
(7,4,100),
(7,5,10),
(7,6,10),
(7,7,20),
(7,8,15);

-- -----------------------------------------------------
-- Table `super_find_bros`.`ami`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`ami` (
  `per_num` INT NOT NULL,
  `per_pernum` INT NOT NULL,
  PRIMARY KEY (`per_num`, `per_pernum`),
  FOREIGN KEY (`per_num`) REFERENCES `super_find_bros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (`per_pernum`) REFERENCES `super_find_bros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `ami` (`per_num`, `per_pernum`) VALUES
(1,4),
(1,6),
(2,3),
(2,6),
(3,2),
(3,6),
(4,1),
(4,6),
(5,7),
(6,1),
(6,4),
(7,2),
(7,3),
(7,5);

-- -----------------------------------------------------
-- Table `super_find_bros`.`groupe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`groupe` (
  `grp_num` INT NOT NULL,
  `grp_nom` VARCHAR(50) NULL,
  PRIMARY KEY (`grp_num`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `super_find_bros`.`appartient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`appartient` (
  `per_num` INT NOT NULL,
  `grp_num` INT NOT NULL,
  PRIMARY KEY (`per_num`, `grp_num`),
  FOREIGN KEY (`per_num`)
    REFERENCES `super_find_bros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (`grp_num`)
    REFERENCES `super_find_bros`.`groupe` (`grp_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `super_find_bros`.`joue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_find_bros`.`joue` (
  `jeu_num` INT NOT NULL,
  `grp_num` INT NOT NULL,
  PRIMARY KEY (`jeu_num`, `grp_num`),
  FOREIGN KEY (`jeu_num`)
    REFERENCES `super_find_bros`.`jeu` (`jeu_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (`grp_num`)
    REFERENCES `super_find_bros`.`groupe` (`grp_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `super_find_bros`.`tchat`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `super_find_bros`.`tchat` (
  `message_num` INT NOT NULL AUTO_INCREMENT,
  `exped_num` INT NOT NULL,
  `desti_num` INT NOT NULL,
  `message` VARCHAR(1000) NOT NULL,
  `date` DATETIME NOT NULL,
  FOREIGN KEY (`exped_num`) REFERENCES `super_find_bros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (`desti_num`) REFERENCES `super_find_bros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    PRIMARY KEY (`message_num`))
  ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

