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
SELECT	chevaux.nom AS "Nom cheval"
FROM cheval AS pere
JOIN cheval AS chevaux ON pere.ID = chevaux.IDPere
WHERE pere.nom = "Starbuck";

-- Trouver le nom de tous les chevaux ainsi que le nom de leur père (même s'ils n'ont pas de père)
SELECT 	chevaux.nom AS "Nom cheval",
				pere.nom AS "Son pere"
FROM cheval AS pere 
RIGHT OUTER JOIN cheval AS chevaux ON pere.ID = chevaux.IDPere

-- b) Afficher le nom et la position de tous les chevaux qui ont participé à la course
-- nommée Omnium à Montréal
SELECT 	cheval.nom AS "Nom cheval",
				resultats.position
FROM cheval
JOIN resultats ON resultats.IdCheval = cheval.ID
JOIN course ON resultats.IdCourse = course.ID
WHERE course.nom = "Omnium"

-- c) Afficher le nom et la ville des courses gagnées par Starbuck.
SELECT 	c.nom AS "Nom course",
				c.ville
FROM course c
JOIN resultats r ON r.IdCourse = c.ID
JOIN cheval cvl ON r.IdCheval = cvl.ID
WHERE cvl.nom = "Starbuck"

-- d) Afficher le nom du cheval, sa position ainsi que le nom de la course et la ville de
-- chacune des courses où un cheval dont le père est Starbuck a participé. WOW!
SELECT 	cvl.nom AS "Nom cheval",
				r.position,
				c.nom AS "Nom course",
				c.ville
FROM cheval cvl
JOIN resultats r ON r.IdCheval = cvl.ID
JOIN course c ON r.IdCourse = c.ID
JOIN cheval AS pere
JOIN cheval AS chevaux ON pere.ID = chevaux.ID
WHERE pere.nom = "Starbuck"
