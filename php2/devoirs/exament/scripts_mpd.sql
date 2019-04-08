CREATE TABLE chanteurs (
	id int unsigned AUTO_INCREMENT,
	nom varchar(50) NOT NULL,
	prenom varchar(50) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE albums (
	id smallint unsigned AUTO_INCREMENT,
	titre varchar(50) NOT NULL,
	annee int NOT NULL,
    ventes int unsigned,
    idChanteur int unsigned,
	PRIMARY KEY(id),
	FOREIGN KEY(idChanteur) references chanteurs(id)
);

CREATE TABLE chansons (
	id int unsigned AUTO_INCREMENT,
	titre varchar(50) NOT NULL,
	numeroPiste smallint unsigned NOT NULL,
    idAlbum smallint unsigned,
	PRIMARY KEY(id),
	FOREIGN KEY(idAlbum) references albums(id)
);

-- 1)
INSERT INTO albums (titre, annee, ventes) 
VALUES ('Watermark', 1988, 5500, 1)

-- 2)
SELECT c.nom AS Chanteur, a.ventes
FROM chanteurs c
JOIN albums a ON a.idChanteur = c.id
WHERE a.ventes > 5000
ORDER BY a.titre DESC

--3)
SELECT c.titre, c.numeroPiste
FROM albums a
JOIN chansons c ON c.idAlbum = a.id
WHERE a.titre = "Watermark"
ORDER BY c.numeroPiste

--4)
SELECT a.titre, c.nom
FROM chanteurs c
JOIN albums a ON a.idChanteur = c.id
WHERE c.nom LIKE "%a"

--5)
SELECT c.titre, a.titre AS Album
FROM albums a
JOIN chansons c ON c.idAlbum = a.id
WHERE a.titre = "Shepherd Moons" AND a.ventes > 1000000

--6)
SELECT COUNT(*) AS nrAlbum, ventes
FROM albums
WHERE annee >= 2000 AND ventes > 100000