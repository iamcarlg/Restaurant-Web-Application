/***************************           INSERTION DES VALEURS DANS LES TABLES           **************************/
/*NOM : RUGERO 
/*PRENOM : CARL GAUSS
/*DATE DE CREATION : 28 JANVIER 2021
/*********************************************************************************************/

/********************  INSERTION DES VALEURS DANS LA TABLE COMPTE  ***********************/

INSERT INTO t_useraccount_acc(acc_pseudo, acc_mdp)
VALUES("gestionnaire1", MD5('gesWOSH_!21'));

INSERT INTO t_useraccount_acc(acc_pseudo, acc_mdp)
VALUES("Delon19", MD5('titi12345')); /*  1d5b6a2ce1aa7c9a8dc439bc298bae12 */

INSERT INTO t_useraccount_acc(acc_pseudo, acc_mdp)
VALUES("Dane14", MD5('tete12345'));

INSERT INTO t_useraccount_acc(acc_pseudo, acc_mdp)
VALUES("Alpha18", MD5('carl188'));

/************************  INSERTION DES VALEURS DANS LA TABLE PROFIL UTLISATEUR  ***********************/

INSERT INTO t_userprofile_usr(acc_pseudo, usr_lastName, usr_firstName, usr_mail, usr_validity, usr_statut, usr_creationDate)
VALUES("gestionnaire1", "Rugero", "Carl Gauss", "rugerocarlgauss@gmail.com", NULL, 1, curdate());

INSERT INTO t_userprofile_usr(acc_pseudo, usr_lastName, usr_firstName, usr_mail, usr_validity, usr_statut, usr_creationDate)
VALUES("Delon19", "Rugamba", "Delon-Nixon", "rugamba@gmail.com", NULL, 0, curdate());

INSERT INTO t_userprofile_usr(acc_pseudo, usr_lastName, usr_firstName, usr_mail, usr_validity, usr_statut, usr_creationDate)
VALUES("Dane14", "Ishaka", "Dane-stevie", "Ishaka@gmail.com", NULL, 0, curdate());

INSERT INTO t_userprofile_usr(acc_pseudo, usr_lastName, usr_firstName, usr_mail, usr_validity, usr_statut, usr_creationDate)
VALUES("Alpha18", "Alpha", "Oumar", "AlphaOumar@gmail.com", NULL, 0, curdate());


/************************  INSERTION DES VALEURS DANS LA TABLE ACTUALITE  ***********************/

INSERT INTO t_news_new(acc_pseudo, new_number, new_title, new_text, new_pubDate, new_state)
VALUES("gestionnaire1", 1000, "Utilisation d'une balance connectée", "C'est une balance controlable à partir d'un smartphone", curdate(), 1);

INSERT INTO t_news_new(acc_pseudo, new_number, new_title, new_text, new_pubDate, new_state)
VALUES("Delon19", 1001, "Utilisation d'une balance connectée", "C'est une balance controlable à partir d'un smartphone", curdate(), 1);

INSERT INTO t_news_new(acc_pseudo, new_number, new_title, new_text, new_pubDate, new_state)
VALUES("Dane14", 1002, "Utilisation d'une balance connectée", "C'est une balance controlable à partir d'un smartphone", curdate(), 1);

INSERT INTO t_news_new(acc_pseudo, new_number, new_title, new_text, new_pubDate, new_state)
VALUES("Alpha18", 1003, "Utilisation d'une balance connectée", "C'est une balance controlable à partir d'un smartphone", curdate(), 1);

/************************  INSERTION DES VALEURS DANS LA TABLE PRESENTATION  ***********************/

INSERT INTO t_presentation_pre(acc_pseudo, pre_number, pre_struct, pre_address, pre_mail, pre_phoneNumber, pre_welcomeText, pre_openingHour)
VALUES("gestionnaire1", 1, NULL, NULL, "rugerocarlgauss@gmail.com", "0627272729", "Bienvenue", "08-18");

INSERT INTO t_presentation_pre(acc_pseudo, pre_number, pre_struct, pre_address, pre_mail, pre_phoneNumber, pre_welcomeText, pre_openingHour)
VALUES("Delon19", 2, NULL, NULL, "rugamba@gmail.com", "0627272729", "Bienvenue", "08-18");

INSERT INTO t_presentation_pre(acc_pseudo, pre_number, pre_struct, pre_address, pre_mail, pre_phoneNumber, pre_welcomeText, pre_openingHour)
VALUES("Dane14", 3, NULL, NULL, "Ishaka@gmail.com", "0627272729", "Bienvenue", "08-18");

INSERT INTO t_presentation_pre(acc_pseudo, pre_number, pre_struct, pre_address, pre_mail, pre_phoneNumber, pre_welcomeText, pre_openingHour)
VALUES("Alpha18", 4, NULL, NULL, "Alpha@gmail.com", "0627272729", "Bienvenue", "08-18");

/************************  INSERTION DES VALEURS DANS LA TABLE SELECTION  ***********************/

INSERT INTO t_selection_sel(acc_pseudo, sel_number, sel_title, sel_introText, sel_date)
VALUES("gestionnaire1", 1, "Balance connectée", "C'est une balance controlable à partir d'un smartphone", sysDate());

INSERT INTO t_selection_sel(acc_pseudo, sel_number, sel_title, sel_introText, sel_date)
VALUES("Delon19", 2, "Balance connectée", "C'est une balance controlable à partir d'un smartphone", sysDate());

INSERT INTO t_selection_sel(acc_pseudo, sel_number, sel_title, sel_introText, sel_date)
VALUES("Dane14", 3, "Balance connectée", "C'est une balance controlable à partir d'un smartphone", sysDate());

INSERT INTO t_selection_sel(acc_pseudo, sel_number, sel_title, sel_introText, sel_date)
VALUES("Alpha18", 4, "Balance connectée", "C'est une balance controlable à partir d'un smartphone", sysDate());

/************************  INSERTION DES VALEURS DANS LA TABLE ELEMENT  ***********************/

INSERT INTO t_element_el(el_number, el_title, el_descriptive, el_addedDate, el_image, el_state)
VALUES(1, "Balance connectée", "C'est une balance controlable à partir d'un smartphone", sysDate(), NULL, 1);

INSERT INTO t_element_el(el_number, el_title, el_descriptive, el_addedDate, el_image, el_state)
VALUES(2, "Balance connectée", "C'est une balance controlable à partir d'un smartphone", sysDate(), NULL, 1);

INSERT INTO t_element_el(el_number, el_title, el_descriptive, el_addedDate, el_image, el_state)
VALUES(3, "Balance connectée", "C'est une balance controlable à partir d'un smartphone", sysDate(), NULL, 1);

INSERT INTO t_element_el(el_number, el_title, el_descriptive, el_addedDate, el_image, el_state)
VALUES(4, "Balance connectée", "C'est une balance controlable à partir d'un smartphone", sysDate(), NULL, 1);

/************************  INSERTION DES VALEURS DANS LA TABLE LIEN  ***********************/

INSERT INTO t_link_link(el_number, link_number, link_title, link_url, link_author, link_pubDate)
VALUES(1, 1, "Balance connectée", NULL, "gestionnaire1", "28/01/2021");

INSERT INTO t_link_link(el_number, link_number, link_title, link_url, link_author, link_pubDate)
VALUES(2, 2, "Balance connectée", NULL, "gestionnaire1", "28/01/2021");

INSERT INTO t_link_link(el_number, link_number, link_title, link_url, link_author, link_pubDate)
VALUES(2, 3, "Balance connectée", NULL, "gestionnaire1", "28/01/2021");

INSERT INTO t_link_link(el_number, link_number,  link_title, link_url, link_author, link_pubDate)
VALUES(4, 4, "Balance connectée", NULL, "gestionnaire1", "28/01/2021");

/************************  INSERTION DES VALEURS DANS LA TABLE LIAISON  ***********************/

INSERT INTO t_liaison_li(sel_number, el_number)
VALUES(1, 1);

INSERT INTO t_liaison_li(sel_number, el_number)
VALUES(2, 2);

INSERT INTO t_liaison_li(sel_number, el_number)
VALUES(3, 3);

INSERT INTO t_liaison_li(sel_number, el_number)
VALUES(4, 4);
