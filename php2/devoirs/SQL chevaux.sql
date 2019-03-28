CREATE TABLE jockey (
	id smallint unsigned AUTO_INCREMENT,
	prenom varchar(50) NOT NULL,
	nom varchar(50) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE cheval (
	id smallint unsigned AUTO_INCREMENT,
	nom varchar(50) NOT NULL,
	dateNaissance date NOT NULL,
	sexe bit NOT NULL,
	idJockeyProprio smallint unsigned,
	idPere smallint unsigned,
	idMere smallint unsigned,
	PRIMARY KEY(id),
	FOREIGN KEY(idJockeyProprio) references jockey(id),
	FOREIGN KEY(idPere) references cheval(id),
	FOREIGN KEY(idMere) references cheval(id)
);

CREATE TABLE champ (
	id smallint unsigned AUTO_INCREMENT,
	nom varchar(50) NOT NULL,
	ville varchar(50) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE categorie (
	id smallint unsigned AUTO_INCREMENT,
	nom varchar(50) NOT NULL,
	nbTours smallint NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE course (
	id smallint unsigned AUTO_INCREMENT,
	nom varchar(50),
	dateCourse date NOT NULL,
	idCategorie smallint unsigned,
	idChamp smallint unsigned,
	PRIMARY KEY(id),
	FOREIGN KEY(idCategorie) references categorie(id),
	FOREIGN KEY(idChamp) references champ(id)
);

CREATE TABLE accueille (
	idChamp smallint unsigned,
	idCategorie smallint unsigned,
	FOREIGN KEY(idChamp) references champ(id),
	FOREIGN KEY(idCategorie) references categorie(id),
	PRIMARY KEY(idChamp, idCategorie)
);

CREATE TABLE conduit (
	idCourse smallint unsigned,
	idJockey smallint unsigned,
	idCheval smallint unsigned,
	position smallint unsigned,
	FOREIGN KEY(idCourse) references course(id),
	FOREIGN KEY(idJockey) references jockey(id),
	FOREIGN KEY(idCheval) references cheval(id),
	PRIMARY KEY(idCourse, idJockey)
	#,CONSTRAINT unChevalUneCourse UNIQUE(idCourse, idCheval)
);
