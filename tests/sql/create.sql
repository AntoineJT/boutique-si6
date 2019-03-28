DROP DATABASE IF EXISTS BOUTIQUE;
CREATE DATABASE BOUTIQUE;
USE BOUTIQUE
-- TODO Finish that

CREATE TABLE CLIENT(
   CodeCli VARCHAR(20),
   Mdp VARCHAR(50),
   NomCli VARCHAR(50),
   PnomCli VARCHAR(50),
   NaissCli DATE,
   AdrCli VARCHAR(50),
   CPCli CHAR(5),
   VilleCli VARCHAR(30),
   MailCli VARCHAR(50),
   CONSTRAINT PK_CLI PRIMARY KEY(CodeCli)
) ENGINE=InnoDB;

CREATE TABLE COMMANDE(
   CodeComm CHAR(9),
   PrixTotal DECIMAL(4,2),
   CodeCli VARCHAR(20),
   CONSTRAINT PK_COMM PRIMARY KEY(CodeComm)
) ENGINE=InnoDB;

CREATE TABLE CATEGORIE(
   CodeCat TINYINT,
   NomCat VARCHAR(50),
   CONSTRAINT PK_CAT PRIMARY KEY(CodeCat)
) ENGINE=InnoDB;

CREATE TABLE HISTORIQUE_PRIX(
   CodeArt CHAR(3),
   DateChg DATE,
   AncienPrix DECIMAL(4,2),
   CONSTRAINT PK_HP
   PRIMARY KEY(CodeArt, DateChg)
);

CREATE TABLE ARTICLE(
   CodeArt CHAR(3),
   ImgArt VARCHAR(50),
   DescArt VARCHAR(30),
   PrixArt DECIMAL(4,2),
   CodeCat TINYINT,
   CONSTRAINT PK_ART
   PRIMARY KEY(CodeArt)
) ENGINE=InnoDB;

CREATE TABLE ACHETER(
   CodeArt CHAR(3),
   CodeComm CHAR(9),
   Qte SMALLINT,
   CONSTRAINT PK_ACH
   PRIMARY KEY(CodeArt, CodeComm)
) ENGINE=InnoDB;
