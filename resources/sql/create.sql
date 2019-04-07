-- Boutique SI6 SQL Script
-- create.sql
-- Ce script crée la bdd et ses tables

SET character_set_server = 'utf8';
CHARSET utf8

DROP DATABASE IF EXISTS BOUTIQUE;
CREATE DATABASE BOUTIQUE
   DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

USE BOUTIQUE

CREATE TABLE CLIENT(
   IdCli INT AUTO_INCREMENT,
   TypeCli TINYINT(1), -- Admin ou non
   PseudoCli VARCHAR(20) UNIQUE,
   Mdp VARCHAR(255),
   NomCli VARCHAR(50),
   PnomCli VARCHAR(50),
   NaissCli DATE,
   AdrCli VARCHAR(50),
   CPCli CHAR(5),
   VilleCli VARCHAR(30),
   MailCli VARCHAR(50),
   CONSTRAINT PK_CLI
   PRIMARY KEY(IdCli)
) ENGINE=InnoDB;

CREATE TABLE COMMANDE(
   CodeComm CHAR(9),
   PrixTotal DECIMAL(4,2),
   IdCli INT,
   CONSTRAINT PK_COMM
   PRIMARY KEY(CodeComm)
) ENGINE=InnoDB;

CREATE TABLE CATEGORIE(
   CodeCat TINYINT,
   NomCat VARCHAR(50),
   CONSTRAINT PK_CAT
   PRIMARY KEY(CodeCat)
) ENGINE=InnoDB;

CREATE TABLE HISTORISER(
   CodeArt CHAR(3),
   DateChg DATE,
   AncienPrix DECIMAL(4,2),
   CONSTRAINT PK_HP
   PRIMARY KEY(CodeArt, DateChg)
) ENGINE=InnoDB;

CREATE TABLE ARTICLE(
   CodeArt CHAR(3),
   NomArt VARCHAR(50),
   ImgArt VARCHAR(50),
   DescArt VARCHAR(255),
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
