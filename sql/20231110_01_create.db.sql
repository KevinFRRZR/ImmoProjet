CREATE DATABASE ImmoProjetDb;

USE ImmoProjet;

CREATE TABLE Adresse (
    AdresseID INT PRIMARY KEY,
    Rue VARCHAR(255),
    Ville VARCHAR(255),
    CodePostal VARCHAR(10)
);

CREATE TABLE Proprietaire (
    ProprietaireID INT PRIMARY KEY,
    Nom VARCHAR(255),
    NumeroContact VARCHAR(20),
    Email VARCHAR(255)
);

CREATE TABLE AgenceImmobiliere (
    AgenceID INT PRIMARY KEY,
    Nom VARCHAR(255),
    AdresseID INT,
    NumeroTelephone VARCHAR(20),
    Email VARCHAR(255),
    FOREIGN KEY (AdresseID) REFERENCES Adresse(AdresseID)
);

CREATE TABLE TypeImmeuble (
    TypeID INT PRIMARY KEY,
    NomType VARCHAR(255)
);

CREATE TABLE Utilisateur (
    UtilisateurID INT PRIMARY KEY,
    NomUtilisateur VARCHAR(255),
    MotDePasse VARCHAR(255),
    PRIMARY KEY (UtilisateurID)
);

CREATE TABLE Immeuble (
    ImmeubleID INT PRIMARY KEY,
    Nom VARCHAR(255),
    PrixAchat DECIMAL(10,2),
    PrixLocation DECIMAL(10,2),
    EnFavoris BOOLEAN,
    LiensPhotos TEXT, 
    NumeroContactProprietaire VARCHAR(20),
    AdresseID INT,
    AgenceID INT,
    TypeID INT,
    ProprietaireID INT,
    NombrePieces INT,
    NombreSallesDeBain INT,
    NombreChambres INT,
    TailleM2 DECIMAL(10,2),
    EstAVendre BOOLEAN,
    EstALouer BOOLEAN,
    FOREIGN KEY (AdresseID) REFERENCES Adresse(AdresseID),
    FOREIGN KEY (AgenceID) REFERENCES AgenceImmobiliere(AgenceID),
    FOREIGN KEY (TypeID) REFERENCES TypeImmeuble(TypeID),
    FOREIGN KEY (ProprietaireID) REFERENCES Proprietaire(ProprietaireID)
);

CREATE TABLE ImmeubleFavoris (
    UtilisateurID INT,
    ImmeubleID INT,
    PRIMARY KEY (UtilisateurID, ImmeubleID),
    FOREIGN KEY (UtilisateurID) REFERENCES Utilisateur(UtilisateurID),
    FOREIGN KEY (ImmeubleID) REFERENCES Immeuble(ImmeubleID)
);
