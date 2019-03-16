--==================//
-- Base de données
--==================//
-- Créer un base de données
CREATE DATABASE nomBaseDeDonnées
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

-- Supprimer une base de données
DROP DATABASE nom


--==================//
-- Table et Champs
--==================//
-- Créer une table
USE nomBaseDeDonnées; -- Activer la table
CREATE TABLE nomTable(
        id               Int  Auto_increment  NOT NULL ,
        nom              Varchar (50) NOT NULL,
        email            Varchar (250) NOT NULL,
        password         Varchar (65) NOT NULL,
        date_naissance   Date NOT NULL
)ENGINE=InnoDB;

-- Montrer comment créer une table
SHOW CREATE TABLE nomTable;

-- Supprimer une table
DROP TABLE nomTable

-- Ajouter un champ
ALTER TABLE nomTable ADD nomChamp VARCHAR(255) NOT NULL

-- Supprimer un champ
ALTER TABLE nomTable DROP nomChamp

-- Modifier le nom de champ
ALTER TABLE nomTable CHANGE ancienNom nouveauNom VARCHAR(50) NOT NULL

-- Modifier le type de champ
ALTER TABLE nomTable MODIFY nomChamp DATETIME NOT NULL


--==================//
-- Insérer des données
--==================//
-- Insertion simple
INSERT INTO nomTable (champ1, champ2) VALUES ('valeur1', 'valeur2')

-- Insertion multiple
INSERT INTO nomTable (champ1, champ2) 
VALUES ('valeur1', 'valeur2'),
('valeur1', 'valeur2'),
('valeur1', 'valeur2');

-- Syntaxe alternative (propre à mysql)
INSERT INTO nomTable SET champ1="valeur1", champ2="valeur2"


--==================//
-- Supprimer des données
--==================//
-- Suppression simple
DELETE FROM nomTable WHERE conditions

-- Limiter le nombre de champ à supprimer
DELETE FROM nomTable WHERE champ1="valeur1" LIMIT 1

-- Supprimer tous les champs, sauf que les id ne se réinitialise pas
DELETE FROM nomTable

-- Supprimer tous les champs ainsi que réinitialiser les id
TRUNCATE TABLE nomTable


--==================//
-- Modifier des données
--==================//
-- Modification simple
UPDATE nomTable SET champ1="valeur1" WHERE condition

-- Modifier plusieurs champs/colonnes dans une rangée
UPDATE nomTable SET champ1="valuer1", champ2="valeur2" WHERE id=1


--==================//
-- Sélectionner des données
--==================//
-- Sélection simple
SELECT champ1, champ2 FROM nomTable WHERE condition

-- Sélectio d'un nombre défini des rangées
SELECT champ1, champ2 FROM nomTable LIMIT 0, 2

-- Sélection plus complexe avec des operateurs(AND, OR, IN, !=, <>, >, <, >=, <=)
-- Référence: https://dev.mysql.com/doc/refman/8.0/en/non-typed-operators.html
SELECT * FROM nomTable WHERE nomChamp1 OR nomChamp2
SELECT * FROM nomTable WHERE nomChamp1="valeur1" AND (nomChamp3="valeur3" OR nomChamp4="valeur4")
-- Ex. SELECT * FROM nomTable WHERE date_naissance > "1980-01-01"

-- Sélectionner plusier champs avec IN en place de OR
SELECT * FROM nomTable WHERE nomChamp IN ("valeur1", "valeur2")

-- Récherche partiel LIKE
SELECT * FROM nomTable WHERE nomChamp LIKE "vale%"
SELECT * FROM nomTable WHERE nomChamp LIKE "%aleu%"

-- Réorganiser par ordre croissant(ASC) ou descendant(DESC)
SELECT champ FROM nomTable ORDER BY champ ASC -- par default
SELECT champ FROM nomTable ORDER BY champ DESC

-- Trier selon plusieurs champs
SELECT * FROM nomTable ORDER BY champ2 DESC, champ2 ASC

-- Compter le nombre d'enregistrement
SELECT COUNT(*) FROM nomTable

-- Nommer(as nouveauNomChamp) le champ à la volé afin de le récupérer plus facilement en PHP
SELECT COUNT(*) as nouveauChamp FROM nomTable

-- Grouper le résultat par le nom de champ
SELECT COUNT(*) as nouveauChamp, pourCeChamp FROM nomTable GROUP BY nomChamp
-- Ex. SELECT COUNT(ville) as nombreVilles, ville FROM utilisateur GROUP BY ville

-- MAX(), MIN(), AVG() Sélectionner la valeur maximal, minimal et average
SELECT MAX(nomChamp) from nomTable


--==================//
-- Fonctions numériques(ABS(), ROUND(), CEIL() FLOOR(), TRUNCATE(1.12345,2), MOD(8,6))
-- Référence: https://dev.mysql.com/doc/refman/8.0/en/numeric-functions.html
--==================//
SELECT *, CEIL(1.3) FROM nomTable


--==================//
-- Fonctions sur les chaines de caractères
-- Référence: https://dev.mysql.com/doc/refman/8.0/en/string-functions.html
--==================//
-- Concatener des champs
SELECT *, CONCAT(champ1, ' ', champ2) as nouveauChamp FROM nomTable

-- Récuperer la taille d'une chaine de caractère
SELECT *, LENGTH(champ) FROM nomTable

-- Convertir une chaine de caractère en minuscule ou majuscule
SELECT *, LOWER(champ) FROM nomTable
SELECT *, UPPER(champ) FROM nomTable

-- Récuperer le nombre des caractères
SELECT *, SUBSTR(nomChamp,1,3) FROM nomTable

-- Rémplacer une chaine de caractèrepar une autre
SELECT *, REPLACE(nomChamp, 'ancienValeur', 'nouveauValeur') FROM nomTable

-- Et autres REVERSE(), TRIM(), MATCH(), etc


--==================//
-- Fonctions pour les dates
-- Référence: https://dev.mysql.com/doc/refman/8.0/en/date-and-time-functions.html
--==================//
-- Ajouter des jours (DATE_ADD et DATE_SUB sont similaire)
SELECT *, ADDDATE(nomChamp, 10) FROM nomTable WHERE 1

-- Ajouter des années, des heures, des minutes
SELECT *, ADDDATE(nomChamp, INTERVAL 1 YEAR) FROM nomTable WHERE 1

-- Substraire des heures, des minutes, des années
SELECT *, SUBDATE(nomChamp, INTERVAL 10 DAY) FROM nomTable WHERE 1

-- Ajouter le temps
SELECT *, ADDTIME(nomChamp, INTERVAL '1:0:0') FROM nomTable WHERE 1

-- Substraire le temps
SELECT *, SUBTIME(nomChamp, INTERVAL '1:0:0') FROM nomTable WHERE 1

-- Selectionner des utilisateurs de plus de 5 ans
SELECT * FROM nomTable WHERE nomChamp < SUBDATE(nomChamp, INTERVAL 10 YEAR)

-- Récuperer le timestamp (la date et le temps)
SELECT *, NOW() FROM nomTable 

-- Récuperer la date
SELECT *, CURDATE() FROM nomTable 

-- Récuperer la temps
SELECT *, CURTIME() FROM nomTable 

-- Formater une date
-- https://dev.mysql.com/doc/refman/8.0/en/date-and-time-functions.html#function_date-format
SELECT *, DATE_FORMAT(nomChamp, '%W %d %M') FROM nomTable

-- Formater une date automatique
SELECT *, DATE_FORMAT(nomChamp, GET_FORMAT(DATE,'EUR')) FROM nomTable

-- Récuperer l'année, le mois, le jour, etc
SELECT *, YEAR(nomChamp) FROM nomTable

-- Récuperer tous les utilisateurs nées après une date précis
SELECT * FROM nomTable WHERE YEAR(nomChamp) > 1980 

-- Récuperer tous les utilisateurs par année, par mois et les grouper
SELECT
        COUNT(*),
        YEAR(nomChamp) as année,
        MONTH(nomChamp) as mois
FROM nomTable
GROUP BY
        YEAR(nomChamp),
        MONTH(nomChamp)
