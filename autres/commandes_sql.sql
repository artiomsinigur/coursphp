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
USE nomBaseDeDonnées;
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
INSERT INTO nomTable (champ1, champ2) VALUES (valeur1, valeur2)

-- Insertion multiple
INSERT INTO nomTable (champ1, champ2) 
VALUES (valeur1, valeur2),
(valeur1, valeur2),
(valeur1, valeur2);

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
-- Selectionner des données
--==================//
