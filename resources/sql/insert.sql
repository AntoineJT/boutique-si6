-- Boutique SI6 SQL Script
-- insert.sql
-- Ce script insère les données de base du site dans la bdd

DELETE FROM ARTICLE;
DELETE FROM CATEGORIE;

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