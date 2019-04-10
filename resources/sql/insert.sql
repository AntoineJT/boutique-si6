-- Boutique SI6 SQL Script
-- insert.sql
-- Ce script insère les données de base du site dans la bdd

-- CLIENTS
-- COMPTE ADMIN
INSERT INTO CLIENT VALUES(1, 1, "root", "$2y$10$ydsJQS3H/V2iTbm2RiCeIewxqPKaKMoc7QT7TfmM3mx7Z4wqonjwe", "root", "root", "1970-01-01", "root", "00000", "SuperUser City", "root@root.su"); -- PASSWORD is "root"

-- CATEGORIES
INSERT INTO CATEGORIE VALUES(1, "YouTube");
INSERT INTO CATEGORIE VALUES(2, "Programmation");
INSERT INTO CATEGORIE VALUES(3, "Autres");

-- ARTICLES
-- CATEGORIE : YOUTUBE
INSERT INTO ARTICLE VALUES("GDK", "Le guide du Kazoo", "le_guide_du_kazoo.jpg", "Apprenez comment maîtriser un instrument divin, par Tsuko G.", 32.49, 1);
INSERT INTO ARTICLE VALUES("RSE", "Rentabiliser ses enfants", "rentabiliser_ses_enfants.png", "Un livre indespensable pour tout parent concerné par l'argent, par Studio Bubble Tea", 55.00, 1);
INSERT INTO ARTICLE VALUES("GPS", "Le guide du parfait spammeur", "le_guide_du_parfait_spammeur.png", "Apprenez comment démarcher les gens en envoyant plus de 55mails/s, et connaître le succès sur YouTube, par Vincent Macario", 100.00, 1);
INSERT INTO ARTICLE VALUES("GDP", "Le guide du plagiarisme", "le_guide_du_plagiarisme.png", "Ne vous embêtez plus à chercher des idées par vous même : apprenez à plagier les autres pour être plus productif, par Math Podcast", 35.00, 1);

-- CATEGORIE : PROGRAMMATION
INSERT INTO ARTICLE VALUES("GBP", "Le guide des « bad practices »", "le_guide_des_bad_practices.png", "Manuel pour mal programmer, par OpenClassRooms", 19.99, 2);

-- CATEGORIE : AUTRES
INSERT INTO ARTICLE VALUES("DJV", "Augmentez la durée de vie de votre jeu vidéo", "augmentez_la_duree_de_vie_de_votre_jeu_video.png", "« Et cette souffrance des jeux à licence, vous vous en souviendrez pour toujours (...) », JdG", 66.60, 3);
INSERT INTO ARTICLE VALUES("OCT", "Dessiner un octogone sans règle", "dessiner_un_octogone_sans_regle.png", "Le livre qui vous apprendra à vous battre dans les cours de récréation et à dessiner un octogone sans règle, par Booba & Kaaris", 57.50, 3);
INSERT INTO ARTICLE VALUES("ABE", "Comment ne pas finir en bâtonnets de glace", "comment_ne_pas_finir_en_batonnets_de_glace.png", "Le guide de survie du Mudokon", 14.99, 3);
