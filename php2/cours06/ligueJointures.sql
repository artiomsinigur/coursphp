CREATE TABLE equipe (
	id INT AUTO_INCREMENT,
	nom varchar(50) NOT NULL,
	ville varchar(50) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE joueur (
	id INT AUTO_INCREMENT,
	nom varchar(50) NOT NULL,
	prenom varchar(50) NOT NULL,
	idEquipe INT,
	PRIMARY KEY(id),
	FOREIGN KEY(idEquipe) references equipe(id)
);

INSERT INTO equipe(nom, ville) VALUES ("Canadiens", "Montréal"), ("Rangers", "New York"),
("Tampa Bay", "Lightning");
INSERT INTO joueur (nom, prenom, idEquipe) VALUES ("Domi", "Max", 1),
("Gallagher", "Brendan", 1), ("Lundqvist", "Henrik", 2), ("Hedman", "Victor", 3),
("Stamkos", "Steven", 3);

-- Requête sur les deux tables sans filtrer par la relation exprimée par la clé étrangère
SELECT * FROM joueur, equipe

-- En filtrant pour garder seulement les rangées dont la clé étrangère dans joueur est égale à la clé primaire dans équipe (FOREIGN KEY(idEquipe) references equipe(id))

SELECT * FROM joueur, equipe
WHERE joueur.idEquipe = equipe.id

-- faire la même chose, mais en ajoutant un filtre pour n'obtenir qu'une seule équipe
SELECT * FROM joueur, equipe
WHERE joueur.idEquipe = equipe.id
AND equipe.nom = "Canadiens"

-- équivalent avec la syntaxe JOIN
SELECT joueur.id, joueur.nom, prenom, idEquipe, equipe.id, equipe.nom, ville
FROM joueur
JOIN equipe
ON joueur.idEquipe = equipe.id

SELECT joueur.nom, prenom, equipe.nom, ville
FROM joueur
JOIN equipe
ON joueur.idEquipe = equipe.id

-- faire la même chose, mais en ajoutant un filtre pour n'obtenir qu'une seule équipe
SELECT joueur.nom AS NomJoueur, prenom, equipe.nom AS NomEquipe, ville
FROM joueur
JOIN equipe
ON joueur.idEquipe = equipe.id
WHERE equipe.nom = "Canadiens"

-- je veux aussi les joueurs qui ne jouent pas dans une équipe et les équipes qui n'ont pas de joueurs 
-- je ne peux pas avoir les deux en même temps en MySQL (FULL OUTER JOIN)
-- commençons par les joueurs qui n'ont pas d'équipe
SELECT joueur.nom, prenom, equipe.nom, ville
FROM joueur LEFT OUTER JOIN equipe
ON joueur.idEquipe = equipe.id

-- équivalent à (on a seulement changé l'ordre des tables)
SELECT joueur.nom, prenom, equipe.nom, ville
FROM equipe RIGHT OUTER JOIN joueur 
ON joueur.idEquipe = equipe.id

-- si je veux les équipes qui n'ont pas de joueurs...
SELECT joueur.nom, prenom, equipe.nom, ville
FROM equipe LEFT OUTER JOIN joueur 
ON joueur.idEquipe = equipe.id





















