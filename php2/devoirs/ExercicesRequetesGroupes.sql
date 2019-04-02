CREATE TABLE Fournisseur (
    	id int primary key not null,
    	nom varchar(50) not null
    );

CREATE TABLE Produit (
    	code int primary key not null,
    	nom varchar(50) not null,
    	prix int not null,
    	idFournisseur int not null,
    	FOREIGN KEY (idFournisseur) references Fournisseur(id)    
    );

INSERT INTO Fournisseur (id, nom)
VALUES (1, 'CocaCola'), (2, 'Fanta'), (3, 'Pepsi');

INSERT INTO Produit (code, nom, prix, idFournisseur)
VALUES (1, 'Cola Light', 15, 1), 
(2, 'Cola Zero', 18, 1), 
(3, 'Fanta Now', 8, 2), 
(4, 'Pepsi Star', 12, 3)

-- a) Afficher le nom du produit, le prix du produit ainsi que le nom de son fournisseur pour tous les produits.
SELECT p.nom AS "Nom produit", p.prix, f.nom AS "Nom fournisseur"
FROM Produit p
JOIN Fournisseur f ON p.idFournisseur = f.id

-- b) Afficher le prix moyen des produits de chaque fournisseur ainsi que son ID (sans le join).
SELECT AVG(p.prix) AS "Prix moyen", f.id AS "Id fournisseur"
FROM Produit p
JOIN Fournisseur f ON p.idFournisseur = f.id
GROUP BY f.id 

-- c) Afficher le prix moyen des produits de chaque fournisseur ainsi que le nom du fournisseur
SELECT AVG(p.prix)AS "Prix moyen", f.nom AS "Id fournisseur"
FROM Produit p
JOIN Fournisseur f ON p.idFournisseur = f.id
GROUP BY f.nom 

-- d) Afficher le nom des fournisseurs dont le prix moyen de leurs produits est plus grand que 100$.
SELECT f.nom AS "Nom fournisseur", AVG(p.prix) AS PrixMoyen
FROM Produit p 
JOIN Fournisseur f ON p.idFournisseur = f.id
WHERE (SELECT AVG(p.prix) FROM Produit) > 10 -- ou faire similaire avec HAVING PrixMoyen > 10
GROUP BY f.nom

-- e) Afficher le nom des fournisseurs dont le nombre de produits est plus grand que 1.
SELECT f.nom AS nomFournisseur
FROM Produit p
JOIN Fournisseur f ON p.idFournisseur = f.id
GROUP BY f.nom
HAVING COUNT(p.code) > 1

-- f) Afficher le nom des fournisseurs dont le nombre de produits d'un prix de plus de 100$ est plus grand que 1
SELECT f.nom AS nomFournisseur
FROM Produit p
JOIN (SELECT prix AS prixProduit FROM Produit) 
ON prixProduit.Produit > 10
JOIN Fournisseur f ON p.idFournisseur > 1



-- g) Afficher le nom de chaque fournisseur ainsi que le nom et le prix de leur produit le plus dispendieux. C’est pas une facile!!! ;)
SELECT f.nom AS nomFournisseur, p.nom AS nomProduit, p.prix AS prixProduit
FROM Produit p
JOIN (SELECT code, MAX(prix) AS maxPrix
FROM Produit) maxProduit
ON maxProduit.maxPrix = p.prix
JOIN Fournisseur f ON p.idFournisseur = f.id