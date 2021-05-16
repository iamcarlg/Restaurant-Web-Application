 /******************         Profils et comptes :          ***********************/

/*1. Requêtes d'ajout des données d'un profil + compte associé*/

INSERT INTO `t_useraccount_acc` (`acc_pseudo`, `acc_mdp`) VALUES
('Clementine', MD5('clement18'))
 
INSERT INTO `t_userprofile_usr` (`acc_pseudo`, `usr_lastName`, `usr_firstName`, `usr_mail`, `usr_validity`, `usr_statut`, `usr_creationDate`) VALUES
('Clementine', 'Laval', 'Clemence', 'AlphaOumar@gmail.com', NULL, '1', CURRENT_DATE())

/*2. Requête de vérification des données de connexion (pseudo et mot de passe), c’est à dire
requête qui vérifie l’existence (ou non) du couple pseudo / mot de passe dans la base*/
SELECT acc_pseudo, acc_mdp from t_useraccount_acc


/*3. Requête de récupération de toutes les données d'un profil (dont on connaît le pseudo)*/

SELECT * from t_userprofile_usr
WHERE  acc_pseudo = 'Delon19'

/*4. Requête permettant de connaître le statut d’un utilisateur dont on connaît le nom et le
prénom*/

SELECT usr_statut from t_userprofile_usr
WHERE usr_lastName = 'Rugamba' and usr_firstName ='Delon-Nixon'


/*5. Requête de modification des données d'un profil (pseudo connu)*/
UPDATE t_userprofile_usr
SET usr_firstName = 'Oumar Diallo'
WHERE acc_pseudo = 'Alpha18'

/*6. Requête de mise à jour du mot de passe d'un compte (pseudo connu)*/
UPDATE t_useraccount_acc
SET acc_mdp = MD5('momo20')
WHERE acc_pseudo = 'Alpha18'

/*7. Requête listant toutes les données des profils + comptes associés*/
SELECT DISTINCT * FROM t_useraccount_acc
JOIN t_userprofile_usr USING (acc_pseudo)

/*8. Requête de validation d'un profil (pseudo connu)*/

UPDATE t_userprofile_usr
SET usr_validity = 1
WHERE acc_pseudo = 'Alpha18'


/*9. Requête de désactivation (/activation) d'un profil (pseudo connu)*/

UPDATE t_userprofile_usr
SET usr_validity = 0
WHERE acc_pseudo = 'Delon19'


/***********              Présentation :                     **********************/

/*10. Requête d’ajout des informations de la structure*/

INSERT INTO `t_presentation_pre` (`acc_pseudo`, `pre_number`, `pre_struct`, `pre_address`, `pre_mail`, `pre_phoneNumber`, `pre_welcomeText`, `pre_openingHour`) VALUES
('Clementine', 5, NULL, NULL, 'Clementinelaval@gmail.com', '067474747', 'Bienvenue', '08-18')

/*11. Requête vérifiant qu’il n’y a qu’une seule ligne dans la table de gestion de la présentation*/

SELECT count(*) from t_presentation_pre

/*12. Requête donnant les informations sur la structure*/

SELECT * from t_presentation_pre

/*13. Requête de modification de l’adresse, du n° de téléphone et de l’adresse e-mail de la
structure*/

UPDATE t_presentation_pre
SET pre_address = '34 Rue Charlemagne',
pre_phoneNumber = '0789737373',
pre_mail = 'rugambadelon@gmail.com'

WHERE acc_pseudo = 'Delon19'

/*14. Requête de suppression de toutes les informations de la structure*/
DELETE * FROM t_presentation_pre

/**************************           Actualités :         ******************************/

/*15. Requête d'ajout d'une actualité*/


INSERT INTO `t_news_new` (`acc_pseudo`, `new_number`, `new_title`, `new_text`, `new_pubDate`, `new_state`) VALUES
('Clementine', 1005, 'Utilisation de tapis roulant', 'Le tapis roulant est parfait pour maintenir un bon choléstérol', current_Date(), '1');

/*16. Requête donnant la dernière actualité ajoutée*/

SELECT *
FROM t_news_new
ORDER BY new_pubDate DESC 

LIMIT 1

/*17. Requête listant toutes les actualités et leur auteur*/

SELECT new_title, new_text, acc_pseudo from t_news_new

/*18. Requête listant les 5 dernières actualités ajoutées et leur auteur*/

SELECT *
FROM t_news_new
ORDER BY new_pubDate DESC 

LIMIT 5

/*19. Requête de modification d'une actualité*/

UPDATE t_news_new
SET new_text = NULL 
WHERE acc_pseudo = 'Delon19'

/*20. Requête de suppression d'une actualité à partir de son ID (n°)*/

DELETE * FROM  t_news_new
WHERE new_number = 1003

/*21. Requête de désactivation de toutes les actualités publiées avant une certaine date
(archivage des actualités trop anciennes)*/

UPDATE t_news_new
SET new_state = 0
WHERE new_pubDate BETWEEN '2021-01-2021' AND '2021-02-09';

/***************         Sélections / éléments (+ liens) :     **********/

/*22. Requête d'ajout d'une sélection*/

INSERT INTO `t_selection_sel` (`acc_pseudo`, `sel_number`, `sel_title`, `sel_introText`, `sel_date`) VALUES
('Clementine', 5, 'Tapis roulant', NULL, current_Date())

/*23. Requête listant tous les éléments d’une sélection particulière*/

SELECT el_number, el_title, el_descriptive, el_state FROM t_element_el
JOIN t_liaison_li USING(el_number)
WHERE sel_number = 1

/*24. Requête comptant le nombre de sélections qui existent dans la base de données*/

SELECT count(sel_number) from t_selection_sel

/*25. Requête listant toutes les sélections et leurs éléments éventuels (+ lien(s))*/

SELECT sel_number, sel_title, el_number, el_title, link_number, link_title FROM t_selection_sel
LEFT OUTER JOIN t_liaison_li USING (sel_number)
LEFT OUTER JOIN t_element_el USING (el_number)
LEFT OUTER JOIN t_link_link USING (el_number)

/*26. Requête de modification d'une sélection*/

UPDATE t_selection_sel
SET sel_title = 'Tapid roulant'
WHERE acc_pseudo = 'Dane14'

/*27. Requête(s) de suppression d'une sélection à partir de son identifiant (ID)*/

DELETE FROM t_liaison_li WHERE sel_number=6;
DELETE FROM t_selection_sel WHERE sel_number=6;

/*28. Requête listant toutes les sélections qui n’ont pas d’élément associé*/

SELECT * from t_selection_sel
WHERE sel_number NOT IN (SELECT sel_number from t_liaison_li)*/

/*29. Requête récupérant toutes les données d’un élément dont on connaît l’identifiant (ID)*/
SELECT * FROM t_element_el
WHERE  el_number = 1

/*30. Requête d'ajout d'un élément pour une sélection particulière (ID connu)*/

INSERT INTO `t_element_el` (`el_number`, `el_title`, `el_descriptive`, `el_addedDate`, `el_image`, `el_state`) VALUES
(2, 'Balance connectée', NULL , currentDate(), NULL, 1)
WHERE sel_number = 2

INSERT INTO `t_liaison_li` (`sel_number`, `el_number`)
VALUES (2, 2)

/*31. Requête(s) de suppression d'un élément particulier (ID connu)*/
DELETE * FROM t_element_el
WHERE el_number = 6

/*32. Requête donnant l’ID de l’élément suivant connaissant l’ID de l’élément actuel choisi
dans une sélection d’ID connu (puis même chose pour l’élément précédent)*/

SELECT * FROM t_element_el
WHERE el_number = (SELECT MIN(el_number) FROM t_element_el
JOIN t_liaison_li USING (el_number)
WHERE sel_number = '1' AND  el_number > '1')/* Requete donnant l'ID de l'élément suivant connaissant l'ID de l'élement actuel choisi
dans une sélection d'ID connu*/

SELECT * FROM t_element_el
WHERE el_number = (SELECT MaX(el_number) FROM t_element_el
JOIN t_liaison_li USING (el_number)
WHERE sel_number = '2' AND  el_number < '4')/* Requete donnant l'ID de l'élément précédent connaissant l'ID de l'élement actuel choisi
dans une sélection d'ID connu*/

/*33. Requête de modification d'un élément d'une sélection particulière (ID connus)*/
UPDATE t_element_el
JOIN t_liaison_li USING(el_number)
SET el_title = 'carl'
WHERE sel_number = 4

/*34. Requête(s) de suppression de tous les éléments d’une sélection particulière (ID connu)*/
DELETE FROM t_liaison_li
WHERE sel_number = 3

DELETE el_id FROM  t_element_el 
WHERE  el_id = (SELECT sel_id FROM  sel_id WHERE sel_id = 3)

/*35. Requête de suppression de toutes les sélections n’ayant pas d’élément associé*/
DELETE FROM t_selection_sel
WHERE sel_number NOT IN (SELECT el_number from t_liaison_li)

/*36. Requête de désactivation (remise à l’état brouillon) d’un élément particulier (ID connu)*/
UPDATE t_element_el
SET el_state = 0
WHERE  el_number = 2

/*37. Requête cachant tous les éléments ajoutés par un utilisateur particulier dont on connaît
le pseudo*/

UPDATE t_element_el
JOIN t_liaison_li USING (el_number)
JOIN t_selection_sel USING (sel_number)
SET el_state = 0
WHERE acc_pseudo = "Alpha18"

/*38. Requête qui récupère toutes les données associées */

SELECT * from t_selection_sel
LEFT OUTER JOIN t_liaison_li USING(sel_number)
LEFT OUTER JOIN t_link_link USING (el_number)
LEFT JOIN t_element_el USING (el_number)
WHERE sel_number = 1
/************                  Liens :           ***********/

/*39. Requête ajoutant un lien pour l’élément choisi*/

INSERT INTO `t_link_link` (`link_number`, `link_title`, `link_url`, `link_author`, `link_pubDate`, `el_number`) VALUES
(5, 'Tapis roulant', NULL, 'Clemence', current_Date(), 5)

/*40. Requête de suppression d’un lien dont on connaît l’URL*/

DELETE * FROM t_link_link
WHERE link_url = NULL 

/*41. Requête listant toutes les URL des liens de la base, sans redondance*/
SELECT DISTINCT link_url FROM t_link_link

/*42. Requête listant tous les éléments, leur sélection et les URL des liens, s’il y en a*/
SELECT el_number, el_title, sel_title, link_URL FROM t_element_el

LEFT OUTER JOIN t_liaison_li USING (el_number)
LEFT OUTER JOIN t_selection_sel USING (sel_number)
LEFT OUTER JOIN t_link_link USING (el_number)

/*43. Requête listant les URL des liens associés à un élément dont on connaît l’identifiant (ID)*/

SELECT link_url FROM t_link_link
JOIN t_element_el USING (el_number)
WHERE el_number = 2

/*44. Requête qui vérifie l’existence (ou non) d’une URL d’un lien parmi les URL qui existent*/

SELECT link_url FROM t_link_link
WHERE link_url IS NOT NULL 