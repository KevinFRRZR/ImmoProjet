USE ImmoProjet;

-- Table Utilisateur
CREATE TABLE Utilisateur (
    ID_Utilisateur INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nom VARCHAR(100) NOT NULL,
    Prenom VARCHAR(100) NOT NULL,
    Email VARCHAR(254) UNIQUE NOT NULL,
    MotDePasse VARCHAR(60) NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table Adresse
CREATE TABLE Adresse (
    ID_Adresse INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Rue VARCHAR(30) NOT NULL,
    Ville VARCHAR(30) NOT NULL,
    CodePostal VARCHAR(12) NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table Agence
CREATE TABLE Agence (
    ID_Agence INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Adresse_ID INT(11),
    Nom VARCHAR(100) NOT NULL,
    NumeroTelephone VARCHAR(15) NOT NULL,
    Email VARCHAR(254) NOT NULL,
    FOREIGN KEY (Adresse_ID) REFERENCES Adresse(ID_Adresse)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table Type
CREATE TABLE Type (
    ID_Type INT(11) PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table Immobilier
CREATE TABLE Immobilier (
    ID_Immobilier INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Agence_ID INT(11),
    Type_ID INT(11),
    Prix DECIMAL(18, 2) NOT NULL,
    Description TEXT,
    FOREIGN KEY (Agence_ID) REFERENCES Agence(ID_Agence),
    FOREIGN KEY (Type_ID) REFERENCES Type(ID_Type)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table Favoris
CREATE TABLE Favoris (
    ID_Favoris INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Utilisateur_ID INT(11)NOT NULL,
    Immobilier_ID INT(11) NOT NULL,
    FOREIGN KEY (Utilisateur_ID) REFERENCES Utilisateur(ID_Utilisateur),
    FOREIGN KEY (Immobilier_ID) REFERENCES Immobilier(ID_Immobilier)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table Appartement
CREATE TABLE Appartement (
    ID_Appartement INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Type_ID INT(11),
    Surface DECIMAL(10, 2) NOT NULL,
    NombrePieces INT(11) NOT NULL,
    FOREIGN KEY (Type_ID) REFERENCES Type(ID_Type)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table Maison
CREATE TABLE Maison (
    ID_Maison INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Type_ID INT(11),
    Surface DECIMAL(10, 2) NOT NULL,
    NombrePieces INT(11) NOT NULL,
    FOREIGN KEY (Type_ID) REFERENCES Type(ID_Type)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table Terrain
CREATE TABLE Terrain (
    ID_Terrain INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Type_ID INT(11),
    Superficie DECIMAL(10, 2) NOT NULL,
    Constructible BOOLEAN NOT NULL,
    FOREIGN KEY (Type_ID) REFERENCES Type(ID_Type)
)ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;