CREATE DATABASE videotheque
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE videotheque;

CREATE TABLE individu (
    id MEDIUMINT unsigned AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL
);
INSERT INTO individu 
VALUES (NULL, 'James', 'Cameron'),
(NULL, 'Peter', 'Jackson'),
(NULL, 'Arnold', 'Schwarzenegger'),
(NULL, 'Linda', 'Hamilton'),
(NULL, 'Leonardo', 'DiCaprio'),
(NULL, 'Kate', 'Winslet'),
(NULL, 'Orlando', 'Bloom'),
(NULL, 'Ian', 'McKellen'),
(NULL, 'Viggo', 'Mortensen'),
(NULL, 'Naomi', 'Watts'),
(NULL, 'Jack', 'Black')


CREATE TABLE film (
    id MEDIUMINT unsigned AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(50) NOT NULL,
    anneeProduction YEAR NOT NULL,
    dureFilm TIME NOT NULL,
    couleur BOOLEAN NOT NULL,
    idGenre SMALLINT unsigned,
    idDistribution MEDIUMINT unsigned,
    idProducteur MEDIUMINT unsigned,
    idRealisateur MEDIUMINT unsigned,
    FOREIGN KEY(idGenre) REFERENCES genre(id),
    FOREIGN KEY(idDistribution) REFERENCES com_distribution(id),
    FOREIGN KEY(idProducteur) REFERENCES film(id),
    FOREIGN KEY(idRealisateur) REFERENCES film(id)
);
INSERT INTO film
VALUES (NULL, 'Terminator 2: Judgment Day', 1991, '02:17:00', 1, 1, 3, 1, 1),
(NULL, 'Titanic', 1997, '03:14:00', 1, 5, 2, 1, 1),
(NULL, 'The Lord of the Rings: The Fellowship of the Ring', 2000, '02:58:00', 1, 4, 1, 2, 2),
(NULL, 'King Kong', 1995, '03:07:00', 1, 2, 2, 2, 2)


CREATE TABLE joue (
    idindividu MEDIUMINT unsigned,
    idFilm MEDIUMINT unsigned,
    FOREIGN KEY(idindividu) REFERENCES individu(id),
    FOREIGN KEY(idFilm) REFERENCES film(id)
);
INSERT INTO joue
VALUES (3, 1), (4, 1), (5, 2), (6, 2), (7, 3), (8, 3), (9, 3), (10, 4), (11, 4)


CREATE TABLE genre (
    id SMALLINT unsigned AUTO_INCREMENT PRIMARY KEY,
    typeGenre VARCHAR(50) NOT NULL
);
INSERT INTO 
VALUES (NULL, 'Action'),
(NULL, 'Sci-Fi'),
(NULL, 'Adventure'),
(NULL, 'Fantasy'),
(NULL, 'Drama')


CREATE TABLE com_distribution (
    id MEDIUMINT unsigned AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    noCivique MEDIUMINT(4) NOT NULL,
    rue VARCHAR(150) NOT NULL,
    ville VARCHAR(50) NOT NULL,
    province VARCHAR(50) NOT NULL,
    codePostal VARCHAR(6) NOT NULL
);
INSERT INTO com_distribution 
VALUES (NULL, 'Warner Bros', 152, 'Valley Street', 'Camden', 'NJ', '08104'),
(NULL, 'Paramount Pictures', 4235, 'Tenmile Road', 'Bedford', 'MA', '01730'),
(NULL, 'New Line Cinema', 3548, 'Benson Street', 'Los Angeles', 'CA', '90017')


CREATE TABLE exemplaire (
    nrSerie MEDIUMINT unsigned AUTO_INCREMENT PRIMARY KEY,
    etat VARCHAR(20),
    idFilm MEDIUMINT unsigned,
    idFormat MEDIUMINT unsigned,
    FOREIGN KEY(idFilm) REFERENCES film(id),
    FOREIGN KEY(idFormat) REFERENCES format(id)
);
INSERT INTO exemplaire
VALUES (0001, 'Mauvais', 1, 1),
(0002, 'Bon', 2, 1),
(0003, 'Moyen', 3, 2),
(0004, 'Excellent', 4, 2),
(0005, 'Bon', 3, 2),
(0006, 'Excellent', 3, 2),
(0007, 'Mauvais', 2, 1),
(0008, 'Bon', 2, 1),
(0009, 'Excellent', 2, 1),
(0010, 'Bon', 1, 1)


CREATE TABLE format (
(0007, 'Moyen', 3, 2),
    id MEDIUMINT unsigned AUTO_INCREMENT PRIMARY KEY,
    typeFormat VARCHAR(20) NOT NULL
);
INSERT INTO format 
VALUES (NULL, 'DVD'),
(NULL, 'Blu-Ray')


CREATE TABLE emprunt (
    dateEmprunt DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dateRetour DATE NOT NULL,
    idClient MEDIUMINT unsigned,
    idExemplaire MEDIUMINT unsigned,
    PRIMARY KEY(idClient, idExemplaire),
    FOREIGN KEY(idClient) REFERENCES client(id),
    FOREIGN KEY(idExemplaire) REFERENCES exemplaire(nrSerie)
);
INSERT INTO emprunt
VALUES ('2019-3-01', '2019-3-10', 1, 0001),
('2019-3-11', '2019-3-15', 1, 0002),
('2019-3-11', '2019-3-13', 1, 0005),
('2019-3-15', '2019-3-20', 1, 0006),
('2019-3-02', '2019-3-03', 2, 0001),
('2019-3-02', '2019-3-10', 2, 0009),
('2019-3-18', '2019-3-25', 3, 0006),
('2019-3-25', '2019-3-29', 3, 0007),
('2019-3-30', '2019-4-03', 3, 0010),
('2019-3-03', '2019-3-25', 4, 0001),
('2019-3-16', '2019-3-19', 4, 0004)


CREATE TABLE client (
    id MEDIUMINT unsigned AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    noCivique MEDIUMINT(4) NOT NULL,
    rue VARCHAR(150) NOT NULL,
    ville VARCHAR(50) NOT NULL,
    province VARCHAR(50) NOT NULL,
    codePostal VARCHAR(6) NOT NULL,
    noTelephone VARCHAR(12) NULL,
);
INSERT INTO client
VALUES (NULL, 'Slainie', 'Lanctot', 696, 'Blvd Edmonton', 'Edmonton' 'AB', 'T6H1J5', NULL),
(NULL, 'Brice', 'Cailot', 2149, 'St London', 'London', 'ON', 'N683L5', '519-281-6309'),
(NULL, 'Onfroi', 'Blanchard', 4042, 'rue Saint-Antoine', 'Drummondville', 'QC', 'J2B1G6', '819-818-8399'),
(NULL, 'Franck', 'Chouinard', 1193, 'Islington Ave', 'Toronto', 'ON', 'M8V3B6', NULL)

-- Requêtes ==================//
-- 1.
SELECT COUNT(*) AS nrFilms, 