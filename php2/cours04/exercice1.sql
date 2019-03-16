CREATE TABLE proprietaire (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50),
    nbPermis CHAR(15) UNIQUE NOT NULL
);

CREATE TABLE voiture (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(20) NOT NULL,
    modele VARCHAR(20) NOT NULL,
    annee SMALLINT NOT NULL
);

CREATE TABLE achat (
    prixAchat DECIMAL(6,2) UNSIGNED NOT NULL,
    dateAchat DATE NOT NULL,
    idVoiture SMALLINT UNSIGNED,
    idProprietaire SMALLINT UNSIGNED,
    FOREIGN KEY (idProprietaire) REFERENCES proprietaire(id),    
    FOREIGN KEY (idVoiture) REFERENCES voiture(id),
    PRIMARY KEY (dateAchat, idVoiture, idProprietaire)
);