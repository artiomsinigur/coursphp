-- CHEVAUX!!!

CREATE TABLE Cheval
(
	ID INT PRIMARY KEY,
	Nom VARCHAR(50) NOT NULL,
	IDPere INT,
	FOREIGN KEY(IDPere) REFERENCES Cheval(ID)
);

CREATE TABLE Course
(
	ID INT PRIMARY KEY,
	Nom VARCHAR(50) NOT NULL,
	Ville VARCHAR(50) NOT NULL
);

CREATE TABLE Resultats
(
	IdCourse INT NOT NULL,
	IdCheval INT NOT NULL,
	Position INT NOT NULL,
	PRIMARY KEY(IdCourse, IdCheval),
	FOREIGN KEY(IdCourse) REFERENCES Course(ID),
	FOREIGN KEY(IdCheval) REFERENCES Cheval(ID)
);
INSERT INTO Cheval VALUES (1, "Starbuck", NULL), (2, "Piquette", 1), (3, "Caramel", 2), 
(4, "Red", 1);
INSERT INTO Course VALUES (1, "Omnium", "Montréal"), (2, "Omnium", "Toronto"), 
(3, "Grand Prix", "Vancouver");
INSERT INTO Resultats VALUES (1,1,1), (1,2,3), (1, 3, 4), (1,4,2), (2,2,1), (2,1,2), (2,3,3),
(2,4,4), (3,1,1), (3,2,4), (3,3,2), (3,4,3);

-- a) Trouver le nom de tous les chevaux dont le père s'appelle Starbuck
SELECT fils.nom
FROM Cheval fils
JOIN Cheval pere ON fils.IDPere = pere.ID
WHERE pere.nom = "Starbuck";
-- Trouver le nom de tous les chevaux ainsi que le nom de leur père (même s'ils n'ont pas de père)
SELECT fils.nom AS nom, pere.nom AS nomPere
FROM Cheval fils
LEFT OUTER JOIN Cheval pere ON fils.IDPere = pere.ID

-- b) Afficher le nom et la position de tous les chevaux qui ont participé à la course
-- nommée Omnium à Montréal
SELECT Cheval.Nom, Resultats.position
FROM Resultats
JOIN Course ON Course.ID = Resultats.IdCourse
JOIN Cheval ON Cheval.ID = Resultats.IdCheval
WHERE Course.Nom = "Omnium" AND Course.Ville = "Montréal"
ORDER BY Resultats.position
-- c) Afficher le nom et la ville des courses gagnées par Starbuck.
SELECT Course.Nom, Course.Ville
FROM Resultats
JOIN Course ON Course.ID = Resultats.IdCourse
JOIN Cheval ON Cheval.ID = Resultats.IdCheval
WHERE Cheval.Nom = "Starbuck" AND Resultats.Position = 1
-- d) Afficher le nom du cheval, sa position ainsi que le nom de la course et la ville de
-- chacune des courses où un cheval dont le père est Starbuck a participé. WOW!
SELECT fils.Nom, Resultats.position, Course.nom, Course.ville
FROM Cheval fils
JOIN Cheval pere ON fils.IDPere = pere.ID
JOIN Resultats ON fils.ID = Resultats.IDCheval
JOIN Course ON Course.ID = Resultats.IDCourse
WHERE pere.Nom = "Starbuck";

-- pour avoir tous les résultats de tous les chevaux dans toutes les courses, ainsi que les infos de leur père

SELECT *
FROM Cheval fils
LEFT OUTER JOIN Cheval pere ON fils.IDPere = pere.ID
JOIN Resultats ON fils.ID = Resultats.IDCheval
JOIN Course ON Course.ID = Resultats.IDCourse






