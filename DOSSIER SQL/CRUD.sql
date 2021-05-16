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
SELECT MAX(new_number) from t_news_new

/*9*/
SELECT new_text from t_news_new
WHERE  new_pubDate BETWEEN '2021-01-01' AND '2021-02-08'

/*10*/
SELECT count(acc_pseudo) FROM  t_userprofile_usr
WHERE usr_validity = 'R' /*POUR RESPONSABLE*/

SELECT count(acc_pseudo) FROM  t_userprofile_usr
WHERE usr_validity = 'A' /*POUR ADMINISTRATEUR*/

/*11*/
SELECT usr_firstName, usr_lastName, usr_statut FROM  t_userprofile_usr
WHERE usr_statut = 0

/*12*/
SELECT * FROM  t_useraccount_acc as acc
WHERE EXISTS(
      SELECT * FROM t_userprofile_usr as usr
      WHERE acc.acc_pseudo = usr.acc_pseudo
)
