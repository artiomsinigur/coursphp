-- Exercice départements et employés
CREATE TABLE Bureau
(
    ID INTEGER PRIMARY KEY,
    Ville VARCHAR(50)
);

CREATE TABLE Departement
(
	Code INTEGER PRIMARY KEY,
	Nom VARCHAR(50) UNIQUE,
	Budget INTEGER NOT NULL,
    IdBureau INTEGER NOT NULL,
    FOREIGN KEY(IdBureau) REFERENCES Bureau(ID)
);

CREATE TABLE Employe
(
	NAS INTEGER PRIMARY KEY,
	Nom VARCHAR(50) NOT NULL,
	Prenom VARCHAR(50) NOT NULL,
	IdDepartement INTEGER NULL,
	FOREIGN KEY (IdDepartement) references Departement(Code) 
);

INSERT INTO Bureau VALUES (1, "Montréal"),
(2, "Québec");
INSERT INTO Departement VALUES (101, "Recherche et Développement", 100000, 1),
	(201, "Ressources humaines", 20000, 1),
	(301, "IT", 30000, 2);

INSERT INTO Employe VALUES (282222000, "Harvey", "Guillaume", 101),
	(282212033, "Lefebvre", "Philippe", 101),
	(282244440, "Tremblay", "Valérie", 201),
	(233330400, "Groleau", "Amélie", 301),
	(282256600, "Foisy", "Natan", 301),
	(244222000, "Tremblay", "Jean", 201);

-- Faciles
-- a) Afficher le nom des départements dont le budget est plus petit que 30000
SELECT nom, budget
FROM Departement
WHERE budget < 30000

-- b) Afficher le nom et le prénom de tous les employés dont le nom commence par la lettre "T"
SELECT nom, Prenom 
FROM Employe
WHERE nom LIKE "T%"

-- c) Afficher les noms de familles diffÈrents de vos employés.
SELECT DISTINCT nom 
FROM Employe

-- d) Afficher le NAS des employés du département nommÈ "IT"
SELECT Employe.nas, IdDepartement 
FROM Employe JOIN Departement
ON Employe.IdDepartement = Departement.Code
WHERE Departement.code = 301

-- e) Afficher le budget du département où travaille un employé nommé "Guillaume Harvey"
SELECT budget
FROM Employe JOIN Departement
ON Employe.IdDepartement = Departement.Code
WHERE Employe.Prenom = "Guillaume" AND Employe.nom 

-- Difficiles
-- a) Afficher le NAS de tous les employés (même si ils ne sont pas dans un département), 
-- ainsi que le nom de leur département, en ordre alphabétique de nom de département
SELECT nas, Departement.nom AS NomDepartement
FROM Employe LEFT OUTER JOIN Departement
ON Departement.Code = Employe.IdDepartement
ORDER BY NomDepartement ASC;

-- b) Afficher le nom complet concatÈnÈ et le nom du dÈpartement des employÈs 
-- dont le dÈpartement a un budget de plus de 100000
-- Joindre trois tables
SELECT * FROM Employe
JOIN Departement ON Departement.Code = Employe.IdDepartement
JOIN Bureau ON Departement.IdBureau = Bureau.ID

-- On peut designer un nom plus courts a nos tables
SELECT e.prenom, e.nom, d.nom, b.ville FROM Employe e
JOIN Departement d ON d.Code = e.IdDepartement
JOIN Bureau b ON d.IdBureau = b.ID

-- 1) trouver le nom et le prenom concatener de tous les employes qui travaillent
-- a Montreal ainsi que leur nom de departement
SELECT CONCAT(Employe.nom, " ", Employe.prenom) AS NomComplet, Departement.nom
FROM Employe 
JOIN Departement ON Employe.IdDepartement = Departement.code
JOIN Bureau ON Bureau.ID = Departement.IdBureau
WHERE Bureau.ville = "Montreal"

-- 2) trouver le nombre d'employes qui travaillent a Quebec

SELECT * FROM Employe 
JOIN Departement ON Employe.IdDepartement = Departement.code
JOIN Bureau ON Bureau.ID = Departement.IdBureau
Pas terminer
-- 3) trouver le nombre de departement qu'il y a a Quebec


























