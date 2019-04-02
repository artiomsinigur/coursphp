CREATE TABLE equipe
(
    ID smallint unsigned AUTO_INCREMENT,
    nom varchar(50) UNIQUE NOT NULL,
    PRIMARY KEY(ID)
);

CREATE TABLE joueur
(
    ID smallint unsigned AUTO_INCREMENT,
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    idEquipe smallint unsigned,
    salaire int unsigned,
    actif boolean,
    PRIMARY KEY(ID),
    FOREIGN KEY(idEquipe) references equipe(ID)
    ON DELETE SET NULL
);

INSERT INTO equipe(nom) VALUES ("Canadiens"), ("Red Wings");

INSERT INTO joueur(nom, prenom, idEquipe, salaire, actif) VALUES 
("Harvey", "Guillaume", 1, 10000, 1),
("Tremblay", "Marc", 1, 20000, 1),
("Lemieux", "Laurence", 2, 12000, 1),
("Bouchard", "Julie", 1, 10000, 1),
("Harvey", "Michel", 2, 10000, 0);

-- utilisation d'un GROUP BY pour obtenir la masse salariale
-- avec SUM en additionnant les salaires de tous les joueurs 
-- dans chaque équipe
SELECT equipe.nom, SUM(salaire) FROM joueur
JOIN equipe ON joueur.idEquipe = equipe.ID
GROUP BY idEquipe

-- pour observer le résultat d'un GROUP BY sur les différentes colonnes
SELECT equipe.nom, SUM(salaire), joueur.nom, joueur.prenom, idEquipe, salaire, actif
FROM joueur
JOIN equipe ON joueur.idEquipe = equipe.ID
GROUP BY idEquipe

-- utilisation de COUNT pour obtenir le nombre de joueurs dans chaque équipe
-- grouper par equipe.nom est équivalent à grouper par joueur.idEquipe ou par equipe.id
SELECT equipe.nom AS NomEquipe, COUNT(*) AS NbJoueurs FROM joueur
JOIN equipe ON joueur.idEquipe = equipe.ID
GROUP BY equipe.nom

-- obtenir les équipes dont la masse salariale est plus grande que 25 000
SELECT equipe.nom, SUM(salaire) AS MasseSalariale FROM joueur
JOIN equipe ON joueur.idEquipe = equipe.ID
GROUP BY idEquipe
HAVING MasseSalariale > 25000

-- obtenir les équipes dont la masse salariale est plus grande que 25000 en enlevant
-- les joueurs inactifs
-- on utilise la clause where pour enlever les rangées qu'on ne veut pas (joueurs inactifs)
-- on utilise having pour enlever les groupes qu'on ne veut pas (les équipes dont la masse salariale est plus petite ou égale à 25 000)
SELECT equipe.nom, SUM(salaire) AS MasseSalariale FROM joueur
JOIN equipe ON joueur.idEquipe = equipe.ID
WHERE actif = 1
GROUP BY idEquipe
HAVING MasseSalariale > 25000

-- trouver le salaire le plus élevé dans chaque équipe
SELECT equipe.nom, MAX(salaire) FROM joueur
JOIN equipe ON joueur.idEquipe = equipe.ID
GROUP BY idEquipe

-- trouver le salaire le plus élevé dans chaque équipe et afficher son prénom et son nom
-- ÇA NE FONCTIONNE PAS DE CETTE FAÇON
SELECT equipe.nom, MAX(salaire), prenom, joueur.nom FROM joueur
JOIN equipe ON joueur.idEquipe = equipe.ID
GROUP BY idEquipe

-- afficher le prenom et le nom du joueur qui fait le plus d'argent dans toute la ligue
SELECT prenom, nom, salaire
FROM joueur
WHERE salaire = (SELECT MAX(salaire) FROM joueur)

-- afficher le joueur le mieux payé de chaque équipe BONNE FAÇON
SELECT j.prenom, j.nom, equipe.nom, j.salaire
FROM joueur j
JOIN 
(SELECT idEquipe, MAX(salaire) AS SalaireMaxEquipe 
 FROM joueur GROUP BY idEquipe) maxEquipe
ON maxEquipe.SalaireMaxEquipe = j.salaire AND maxEquipe.idEquipe = j.idEquipe
JOIN equipe ON equipe.id = j.idEquipe




























