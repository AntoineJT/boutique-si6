-- Boutique SI6 SQL Script
-- insert.sql
-- Ce script insère les données de base du site dans la bdd

-- DELETE FROM COMMANDE;
-- DELETE FROM ACHETER;
DELETE FROM CLIENT;
-- DELETE FROM HISTORISER;
DELETE FROM ARTICLE;
DELETE FROM CATEGORIE;

-- CLIENT (USER ACCOUNT)
INSERT INTO CLIENT VALUES(1, 1, "root", "$2y$10$ydsJQS3H/V2iTbm2RiCeIewxqPKaKMoc7QT7TfmM3mx7Z4wqonjwe", "root", "root", "1970-01-01", "root", "00000", "SuperUser City", "root@root.su"); -- PASSWORD is "root"

-- CATEGORIES
INSERT INTO CATEGORIE VALUES(1, "YouTube");
INSERT INTO CATEGORIE VALUES(2, "Programmation");
INSERT INTO CATEGORIE VALUES(3, "Autres");

-- ARTICLES
-- CATEGORIE : YOUTUBE
INSERT INTO ARTICLE VALUES("GDK", "Le guide du Kazoo", "le_guide_du_kazoo.jpg", "Apprenez comment maîtriser un instrument divin, par Tsuko G.", 32.49, 1);
INSERT INTO ARTICLE VALUES("RSE", "Rentabiliser ses enfants", "rentabiliser_ses_enfants.png", "Un livre indespensable pour tout parent concerné par l'argent, par Studio Bubble Tea", 55.00, 1);

-- CATEGORIE : PROGRAMMATION
INSERT INTO ARTICLE VALUES("GBP", "Le guide des bad practices", "le_guide_des_bad_practices.png", "Manuel pour mal programmer, par OpenClassRooms", 19.99, 2);
