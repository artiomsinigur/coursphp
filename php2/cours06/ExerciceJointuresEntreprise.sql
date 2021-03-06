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

INSERT INTO Bureau VALUES (1, "Montréal"), (2, "Québec");
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
SELECT Nom FROM Departement WHERE Budget < 30000;

-- b) Afficher le nom et le prénom de tous les employés dont le nom commence par la lettre "T"
SELECT Nom, Prenom FROM Employe WHERE Nom LIKE "T%";

-- c) Afficher les noms de familles diffÈrents de vos employés.
SELECT DISTINCT nom FROM Employe

-- d) Afficher le NAS des employés du département nommÈ "IT"
SELECT nas AS NasDuEmployes, Departement.nom
FROM Employe 
JOIN Departement ON Employe.IdDepartement = Departement.code
WHERE Departement.nom = "IT";

-- e) Afficher le budget du département où travaille un employé nommé "Guillaume Harvey"
SELECT budget AS "Budget du departement", e.nom, e.prenom
FROM Departement d 
JOIN Employe e ON e.IdDepartement = d.Code
WHERE e.nom = "Harvey" AND e.prenom = "Guillaume";

-- Difficiles
-- a) Afficher le NAS de tous les employés (même si ils ne sont pas dans un département), 
-- ainsi que le nom de leur département, en ordre alphabétique de nom de département
SELECT nas, d.nom AS "Nom du departement"
FROM Employe e LEFT OUTER JOIN Departement d
ON e.IdDepartement = d.code
ORDER BY d.nom ASC;

-- b) Afficher le nom complet concatÈnÈ et le nom du dÈpartement des employÈs dont le dÈpartement a un budget de plus de 100000
SELECT CONCAT(e.nom, " ", e.prenom) AS "Nom et prenom", d.nom AS Departement
FROM Employe e 
JOIN Departement d ON e.IdDepartement = d.code
WHERE budget > 100000;


-- joindre les trois tables
SELECT * FROM Employe
JOIN Departement ON Employe.IDDepartement = Departement.Code
JOIN Bureau ON Departement.IDBureau = Bureau.ID

-- on peut désigner un nom plus courts à nos tables
SELECT e.Prenom, e.Nom, d.Nom, b.Ville FROM Employe e
JOIN Departement d ON d.Code = e.IDDepartement
JOIN Bureau b ON d.IDBureau = b.ID


-- trouver le nom et le prénom concaténé de tous les employés qui travaillent
-- à Montréal ainsi que leur nom de département
SELECT CONCAT(e.nom, " ", e.prenom) AS Employes, d.nom AS Departement
FROM Employe e 
JOIN Departement d ON e.IdDepartement = d.code 
JOIN Bureau b ON d.IdBureau = b.ID
WHERE b.ville = "Montreal"
ORDER BY Departement ASC;

-- trouver le nombre d'employés qui travaillent à Québec
SELECT COUNT(e.nom) AS "Nb d'employes"
FROM Employe e 
JOIN Departement d ON e.IdDepartement = d.code   
JOIN Bureau b ON d.IdBureau = b.ID
WHERE b.ville = "Quebec";

-- trouver le nombre de départements qu'il y a à Montréal
SELECT COUNT(*) AS "Nb de departements"
FROM Departement d 
JOIN Bureau b ON d.IdBureau = b.ID
WHERE b.ville = "Montreal"; 


