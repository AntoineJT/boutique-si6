DROP DATABASE IF EXISTS BOUTIQUE;
CREATE DATABASE BOUTIQUE;
USE BOUTIQUE
-- TODO Use engine InnoDB
-- TODO Split that into multiples scripts
-- INFO This is just a testing script not a production one
CREATE TABLE CLIENT(
   CodeCli VARCHAR(20) PRIMARY KEY,
   Mdp VARCHAR(50),
   NomCli VARCHAR(50),
   PnomCli VARCHAR(50),
   NaissCli DATE,
   AdrCli VARCHAR(50),
   CPCli CHAR(5),
   VilleCli VARCHAR(30),
   MailCli VARCHAR(50)
);

CREATE TABLE COMMANDE(
   CodeComm CHAR(9) PRIMARY KEY,
   PrixTotal DECIMAL(4,2),
   CodeCli VARCHAR(20) REFERENCES CLIENT(CodeCli)
);

CREATE TABLE CATEGORIE(
   CodeCat TINYINT PRIMARY KEY,
   NomCat VARCHAR(50)
);

CREATE TABLE HISTORIQUE_PRIX(
   DateChg DATE PRIMARY KEY
);

CREATE TABLE ARTICLE(
   CodeArt CHAR(3) PRIMARY KEY,
   ImgArt VARCHAR(50),
   DescArt VARCHAR(30),
   PrixArt DECIMAL(4,2),
   CodeCat TINYINT REFERENCES CATEGORIE(CodeCat)
);

CREATE TABLE ACHETER(
   CodeArt CHAR(3) REFERENCES ARTICLE(CodeArt),
   CodeComm CHAR(9) REFERENCES COMMANDE(CodeComm),
   PRIMARY KEY(CodeArt, CodeComm),
   Qte SMALLINT
);

CREATE TABLE CORRESPONDRE(
   CodeArt CHAR(3) REFERENCES ARTICLE(CodeArt),
   DateChg DATE REFERENCES HISTORIQUE_PRIX(DateChg),
   PRIMARY KEY(CodeArt, DateChg),
   AncienPrix DECIMAL(4,2)
);
