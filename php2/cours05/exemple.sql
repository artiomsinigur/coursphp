-- Insertion sans specifier les noms de colonne
INSERT INTO voiture VALUES (null, 'Ford', 'Taurus', 1990);

-- Insertion en specifiant les noms de colonne
INSERT INTO voiture(marque, modele, annee) VALUES ('Porshe', 'Boxter', 2016);

-- Insertion multiples
INSERT INTO voiture(marque, modele, annee) VALUES 
('Porshe', 'Boxter', 2016),
('Opel', 'AStra', 2012),
('Kia', 'Forte', 2018);

-- Mise a jour
UPDATE voiture SET marque='Toyota' WHERE id=2;

-- Suppression
DELETE FROM voiture WHERE id=3;

-- Obtention avec SELECT
SELECT marque, modele FROM voiture

-- Obtenir l'age
SELECT 2019 - annee FROM voiture

-- Obtenir les champs distinctes qui se trouve dans le tableau
SELECT DISTINCT marque FROM voiture

-- Concatenir plusieurs champs
SELECT CONCAT(marque, '-', modele, '-', annee) AS designation FROM voiture

-- Obtenir le nombre des voitures
SELECT COUNT(*) FROM voiture

-- Ordonner plusieurs champs
SELECT * FROM voiture ORDER BY marque DESC, annee ASC


-- Trouver le nombre de voitures dont la marque est Ford ou Chrysler 
-- et dont l'annee est entre 2000 et 2015
SELECT COUNT(*) AS nbVoitures FROM voiture WHERE (marque='Kia' OR marque='Ford') AND annee BETWEEN 2000 AND 2015; 

-- Obtenir la designation des vehicules ainsi que les age en ordre descendant d'age
SELECT modele, 2019 - annee FROM voiture ORDER BY modele DESC
SELECT CONCAT(marque, " ", modele, " ", annee) AS designation, 2019 - annee AS age FROM voiture ORDER BY age DESC;

-- Obtenir la marque et le modele de toutes les voitures dont l'annee est 
-- soit 1990, 1995 ou 2000 en ordre ASC de marque de voiture
SELECT marque, modele FROM voiture WHERE annee IN(1990, 2015, 2018) ORDER BY marque

