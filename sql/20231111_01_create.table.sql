SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

USE ImmoProjet;

-- 
-- Table favoris
-- 

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE `favoris` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `utilisateur_id` INT(11) NOT NULL,
    `bien_id` INT(11) NOT NULL,
    CONSTRAINT `favoris_FK_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur`(`id`),
    CONSTRAINT `favoris_FK_bien` FOREIGN KEY (`bien_id`) REFERENCES `bien`(`id`),
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table utilisateur
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `prenom` VARCHAR(100) NOT NULL,
    `email` VARCHAR(254) UNIQUE NOT NULL,
    `motDePasse` VARCHAR(60) NOT NULL,
    `favoris_id` INT(11) NOT NULL,
    CONSTRAINT `utilisateur_FK` FOREIGN KEY (`favoris_id`) REFERENCES `favoris`(`id`),
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table agence
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE `agence` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `numeroTelephone` VARCHAR(15) NOT NULL,
    `email` VARCHAR(254) NOT NULL,
    `adresse` VARCHAR(200),
    `bien_id` INT(11) NOT NULL,
    CONSTRAINT `agence_FK` FOREIGN KEY (`bien_id`) REFERENCES `bien`(`id`),
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table bien
--

DROP TABLE IF EXISTS `bien`;
CREATE TABLE `bien` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `prix` DECIMAL(18, 2) NOT NULL,
    `logement_id` INT(11),
    `terrain_id` INT(11),
    `description` TEXT NOT NULL,
    CONSTRAINT `bien_FK_logement` FOREIGN KEY (`logement_id`) REFERENCES `logement`(`id`),
    CONSTRAINT `favoris_FK_terrain` FOREIGN KEY (`terrain_id`) REFERENCES `terrain`(`id`),
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table logement
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE `logement` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `surface` DECIMAL(10, 2) NOT NULL,
    `nombreDePiece` INT(11) NOT NULL,
    `bien_id` INT(11) NOT NULL,
    CONSTRAINT `logement_FK_bien` FOREIGN KEY (`bien_id`) REFERENCES `bien`(`id`),
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table terrain
--

DROP TABLE IF EXISTS `terrain`;
CREATE TABLE `terrain` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `superficie` DECIMAL(10, 2) NOT NULL,
    `constructible` BOOLEAN NOT NULL,
    `bien_id` INT(11) NOT NULL,
    CONSTRAINT `terrain_FK` FOREIGN KEY (`bien_id`) REFERENCES `bien`(`id`),
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;