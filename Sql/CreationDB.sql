CREATE DATABASE if not EXISTS GestionEcole;
USE GestionEcole;

CREATE TABLE Section(
	IdSection int  AUTO_INCREMENT PRIMARY KEY,
    Designation varchar(40)not null
);
CREATE TABLE Classe(
    IdCl int AUTO_INCREMENT PRIMARY KEY,
    Designation varchar(10) not null,
    IdSect int ,
    CONSTRAINT FKopt FOREIGN KEY (IdSect) REFERENCES Section (IdSection) on DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Cours(
	IdCours int AUTO_INCREMENT PRIMARY KEY,
    DesigCours varchar(20) not null UNIQUE
);
CREATE TABLE Eleve(
	IdEleve int AUTO_INCREMENT PRIMARY KEY,
    Nom varchar(30) not null,
    PostNom varchar(30) not null,
    Prenom varchar(30) not null,
    Sexe varchar(15) not null,
    NomPere varchar(70) not null,
    NomMere varchar(70) not null,
    LieuNaiss varchar(30) not null,
    DateNaiss DAte not null,
    Adresse varchar(70) not null,
    NumResp varchar(30) not null
);
CREATE TABLE Inscrire(
    IdInscrip VARCHAR(20) PRIMARY KEY,
    IdEl int ,
    IdCl int ,
    DateInscrip DATETIME  NOT null,
    AnneeInscrip VARCHAR(15) ,
    CONSTRAINT FKEleve FOREIGN KEY (IdEl) REFERENCES Eleve (IdEleve) on DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FKClass FOREIGN KEY (IdCl) REFERENCES Classe (IdCl) on DELETE CASCADE ON UPDATE CASCADE
    );
    
  CREATE TABLE Evaluer(
    	IdEvaluer int AUTO_INCREMENT PRIMARY KEY,
    	IdInscrip varchar(20) ,
        IdCours int,
      	Periode varchar(30) NOT NULL,
        Cotes float not null,
      	CoteMax float not null,
        DateEv DATETIME not null DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT FKiDiNS1 FOREIGN KEY (IdInscrip) REFERENCES Inscrire (IdInscrip) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT FKiCours FOREIGN KEY (IdCours) REFERENCES Cours (IdCours) ON DELETE CASCADE ON UPDATE CASCADE

    );
    CREATE TABLE Paiement(
    	IdPaie int AUTO_INCREMENT PRIMARY KEY,
        IdInscrip varchar(20) not null,
        MontChiff Float not null,
        MontLett varchar(100) not null,
        MotifPaie varchar(70) not null,
        DatePaie DATETIME not null DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT fkpaiement FOREIGN KEY (IdInscrip) REFERENCES Inscrire (IdInscrip) on DELETE CASCADE ON UPDATE CASCADE
    );


    -- INSERTIONS
    INSERT INTO `Evaluer` (`IdEvaluer`, `IdInscrip`, `IdCours`, `Cotes`, `CoteMax`, `DateEv`,Periode) VALUES
(1, 'E1', 1, 12, 20, '2022-08-23', '1'),
(2, 'E1', 2, 13, 20, '2022-08-23', '1'),
(4, 'E3', 3, 12, 20, '2022-08-11', '1'),
(5, 'E1', 4, 20, 20, '2022-08-04', '1'),
(6, 'E5', 1, 20, 20, '2022-08-24', '1'),
(7, 'E3', 2, 20, 20, '2022-08-29', '1'),
(8, 'E3', 2, 20, 20, '2022-08-29', '1'),
(9, 'E3', 1, 11, 20, '2022-08-29', '1'),
(10, 'E5', 4, 22, 20, '2022-08-29', '1'),
(11, 'E5', 4, 12, 20, '2022-08-29', '1'),
(3, 'E3', 7, 20, 20, '2022-08-22', '1'),
(12, 'E1', 5, 12, 20, '2022-08-23', '1'),
(13, 'E1', 7, 13, 20, '2022-08-23', '1'),
(14, 'E3', 3, 12, 20, '2022-08-11', '1'),
(15, 'E1', 6, 20, 20, '2022-08-04', '1'),
(16, 'E5', 3, 20, 20, '2022-08-24', '1'),
(17, 'E3', 5, 20, 20, '2022-08-29', '1'),
(18, 'E3', 7, 20, 20, '2022-08-29', '1'),
(19, 'E3', 6, 11, 20, '2022-08-29', '1'),
(20, 'E5', 5, 22, 20, '2022-08-29', '1'),
(21, 'E5', 6, 12, 20, '2022-08-29', '1'),
(22, 'E3', 2, 20, 20, '2022-08-22', '1');