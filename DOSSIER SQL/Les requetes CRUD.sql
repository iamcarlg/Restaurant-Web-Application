/*1*/

INSERT INTO t_useraccount_acc(acc_pseudo, acc_mdp)
VALUES("carla", MD5('carla19'));
INSERT INTO t_userprofile_usr(acc_pseudo, usr_lastName, usr_firstName, usr_mail, usr_validity, usr_statut, usr_creationDate)
VALUES("carla", "rugera", "carla-gauss", "rugerocarlagauss@gmail.com", NULL, 0, curdate());

/*2*/
UPDATE t_userprofile_usr
SET usr_validity = 0
WHERE acc_pseudo = 'carla'

/*3*/
DELETE FROM t_userprofile_usr
WHERE acc_pseudo = 'carla'

/*4*/

      /*a*/
SELECT usr_lastName, usr_firstName, usr_validity from t_userprofile_usr
ORDER BY  usr_lastName

      /*b*/
SELECT usr_lastName, usr_firstName, usr_statut FROM t_userprofile_usr  
ORDER BY usr_statut

/*5*/
SELECT usr_lastName, usr_firstName, usr_mail from t_userprofile_usr
WHERE usr_statut = 1

ORDER BY DESC (usr_firstName)

/*6*/
SELECT usr_lastName, usr_firstName FROM  t_userprofile_usr
WHERE  YEAR(usr_creationDate) = '2021'

/*7*/
INSERT INTO t_selection_sel(sel_date)
VALUES (curdate())

/*8*/

SELECT new_id, new_text FROM t_news_new 
WHERE new_id = (SELECT MAX(new_id) FROM t_news_new);

SELECT actu_numero, actu_texte FROM t_actualite_actu
ORDER BY actu_date DESC
LIMIT 1;

/*9*/
SELECT * from t_news_new
WHERE  new_pubDate BETWEEN '2021-01-01' AND '2021-02-08'

/*10*/
SELECT count(acc_pseudo) FROM  t_userprofile_usr
WHERE usr_validity = 'R' /*POUR RESPONSABLE*/

SELECT count(acc_pseudo) FROM  t_userprofile_usr
WHERE usr_validity = 'A' /*POUR ADMINISTRATEUR*/


SELECT pfl_statut, COUNT(*)
FROM t_profil_pfl
GROUP BY pfl_statut;
/*11*/
SELECT usr_firstName, usr_lastName, usr_statut FROM  t_userprofile_usr
WHERE usr_statut = 0

SELECT pfl_statut
FROM t_profil_pfl
GROUP BY pfl_statut;
/*12*/
SELECT COUNT(*)
FROM t_compte_cpt
JOIN t_profil_pfl USING(cpt_pseudo)
WHERE cpt_pseudo='tuxie'
AND cpt_mot_de_passe=MD5('tuxie1234')
AND pfl_validite ='A';

/*13*/
UPDATE t_useraccount_acc, t_userprofile_usr
SET acc_mdp = md5('Delon19')
WHERE usr_lastName = 'Rugamba' and usr_firstName = 'Delon-Nixon'
/*REMARQUE : Le mot de passe se met à jour sur toutes les lignes     */

/*14
DELETE (dans l'ordre):')
        /*les liens, les éléments, les jointures, les selections, la presentation, les actualités, le profil, le compte
        A TESTER pour s'\' entraîner !*/

/*15*/
SELECT *
FROM t_account_acc 
LEFT OUTER JOIN t_profile_pro USING (acc_pseudo)

/*16*/
DELETE FROM t_compte_cpt
WHERE cpt_pseudo in (
SELECT cpt_pseudo 
FROM t_compte_cpt
EXCEPT
SELECT cpt_pseudo
FROM t_profil_pfl);

DELETE FROM t_account_acc 
WHERE acc_username 
NOT IN (SELECT acc_username
FROM t_profile_pro)
    
DELETE t_compte_cpt FROM t_compte_cpt
LEFT OUTER JOIN t_profil_pfl USING (cpt_pseudo)
WHERE pfl_nom IS NULL;

/**************************************************************/
