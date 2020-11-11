SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `superFindBros` DEFAULT CHARACTER SET utf8 ;
USE `superFindBros` ;

-- -----------------------------------------------------
-- Table `superFindBros`.`personne`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superFindBros`.`personne` (
  `per_num` INT NOT NULL AUTO_INCREMENT,
  `per_prenom` VARCHAR(45) NOT NULL,
  `per_nom` VARCHAR(45) NOT NULL,
  `per_mail` VARCHAR(80) NOT NULL,
  `per_pseudo` VARCHAR(45) NOT NULL,
  `per_mdp` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`per_num`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `superFindBros`.`jeu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superFindBros`.`jeu` (
  `jeu_num` INT NOT NULL AUTO_INCREMENT,
  `jeu_nom` VARCHAR(80) NOT NULL,
  `jeu_annee` YEAR(4) NOT NULL,
  `jeu_editeur` VARCHAR(45) NOT NULL,
  `jeu_description` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`jeu_num`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `superFindBros`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superFindBros`.`type` (
  `typ_num` INT NOT NULL,
  `typ_genre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`typ_num`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `superFindBros`.`estdetype`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superFindBros`.`estdetype` (
  `jeu_num` INT NOT NULL,
  `typ_num` INT NOT NULL,
  PRIMARY KEY (`jeu_num`, `typ_num`),
  INDEX `id_idx` (`typ_num` ASC) VISIBLE,
  CONSTRAINT `id`
    FOREIGN KEY (`typ_num`)
    REFERENCES `superFindBros`.`type` (`typ_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id`
    FOREIGN KEY (`jeu_num`)
    REFERENCES `superFindBros`.`jeu` (`jeu_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `superFindBros`.`possede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`possede` (
  `per_num` INT NOT NULL,
  `jeu_num` INT NOT NULL,
  `tempsdejeumoyen` DECIMAL(1) NOT NULL,
  PRIMARY KEY (`per_num`, `jeu_num`),
  INDEX `id_idx` (`jeu_num` ASC) VISIBLE,
  CONSTRAINT `id`
    FOREIGN KEY (`per_num`)
    REFERENCES `superFindBros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id`
    FOREIGN KEY (`jeu_num`)
    REFERENCES `superFindBros`.`jeu` (`jeu_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `superFindBros`.`ami`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superFindBros`.`ami` (
  `per_num` INT NOT NULL,
  `per_pernum` INT NOT NULL,
  PRIMARY KEY (`per_num`, `per_pernum`),
  INDEX `id_idx` (`per_pernum` ASC) VISIBLE,
  CONSTRAINT `id`
    FOREIGN KEY (`per_num`)
    REFERENCES `superFindBros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id`
    FOREIGN KEY (`per_pernum`)
    REFERENCES `superFindBros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `superFindBros`.`groupe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superFindBros`.`groupe` (
  `grp_num` INT NOT NULL,
  `grp_nom` VARCHAR(50) NULL,
  PRIMARY KEY (`grp_num`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `superFindBros`.`appartient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superFindBros`.`appartient` (
  `per_num` INT NOT NULL,
  `grp_num` INT NOT NULL,
  PRIMARY KEY (`per_num`, `grp_num`),
  INDEX `id_idx` (`grp_num` ASC) VISIBLE,
  CONSTRAINT `id`
    FOREIGN KEY (`per_num`)
    REFERENCES `superFindBros`.`personne` (`per_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id`
    FOREIGN KEY (`grp_num`)
    REFERENCES `superFindBros`.`groupe` (`grp_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `superFindBros`.`joue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `superFindBros`.`joue` (
  `idjeu` INT NOT NULL,
  `idgroupe` INT NOT NULL,
  PRIMARY KEY (`idjeu`, `idgroupe`),
  INDEX `idgroupe_idx` (`idgroupe` ASC) VISIBLE,
  CONSTRAINT `idjeu`
    FOREIGN KEY (`idjeu`)
    REFERENCES `mydb`.`jeu` (`idjeu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idgroupe`
    FOREIGN KEY (`idgroupe`)
    REFERENCES `mydb`.`groupe` (`idgroupe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
