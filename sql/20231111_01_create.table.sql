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
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table bien
--

DROP TABLE IF EXISTS `bien`;
CREATE TABLE `bien` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `prix` DECIMAL(18, 2) NOT NULL,
    `description` TEXT NOT NULL,
    `logement_id` INT(11),
    `terrain_id` INT(11),
    `agence_id` INT(11) NOT NULL,
    CONSTRAINT `bien_FK_logement` FOREIGN KEY (`logement_id`) REFERENCES `logement`(`id`),
    CONSTRAINT `favoris_FK_terrain` FOREIGN KEY (`terrain_id`) REFERENCES `terrain`(`id`),
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Ajout d'exemples d'utilisateurs
INSERT INTO utilisateur (nom, prenom, email, motDePasse, favoris_id) VALUES
    ('Doe', 'John', 'john.doe@example.com', 'motdepasse123', 1),
    ('Smith', 'Jane', 'jane.smith@example.com', 'password456', 2),
    ('Johnson', 'Bob', 'bob.johnson@example.com', 'securepass789', 3),
    ('Williams', 'Alice', 'alice.williams@example.com', 'strongpassword', 4),
    ('Brown', 'Chris', 'chris.brown@example.com', 'mypassword123', 5);

-- Ajout d'exemples de biens
INSERT INTO bien (prix, logement_id, terrain_id, description, agence_id) VALUES
    (100000.00, 1, NULL, 'Maison spacieuse avec jardin', 1),
    (50000.00, NULL, 2, 'Terrain constructible avec vue panoramique', 2),
    (75000.00, 3, NULL, 'Appartement lumineux avec balcon', 3),
    (120000.00, NULL, 4, 'Terrain avec vue sur la montagne', 4),
    (90000.00, 5, NULL, 'Maison de ville avec cour privée', 5);

-- Ajout d'exemples de logements
INSERT INTO logement (nom, surface, nombreDePiece, bien_id) VALUES
    ('Maison familiale', 150.00, 5, 1),
    ('Appartement moderne', 80.00, 3, 3);

-- Ajout d'exemples de terrains
INSERT INTO terrain (nom, superficie, constructible, bien_id) VALUES
    ('Terrain résidentiel', 500.00, TRUE, 2),
    ('Terrain agricole', 1000.00, TRUE, 4);

-- Ajout d'exemples d'agences
INSERT INTO agence (nom, numeroTelephone, email, adresse, bien_id) VALUES
    ('Agence immobilière A', '123-456-7890', 'agenceA@example.com', '123 Main St', 1),
    ('Agence immobilière B', '987-654-3210', 'agenceB@example.com', '456 Oak St', 2),
    ('Agence immobilière C', '555-123-4567', 'agenceC@example.com', '789 Pine St', 3),
    ('Agence immobilière D', '999-888-7777', 'agenceD@example.com', '321 Elm St', 4),
    ('Agence immobilière E', '111-222-3333', 'agenceE@example.com', '555 Maple St', 5);

-- Ajout d'exemples de favoris
INSERT INTO favoris (utilisateur_id, bien_id) VALUES
    (1, 2),
    (2, 5),
    (3, 1),
    (4, 4),
    (5, 3);

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;