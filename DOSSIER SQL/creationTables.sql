/***************************           CREATION DES TABLES           **************************/
/*NOM : RUGERO 
/*PRENOM : CARL GAUSS
/*DATE DE CREATION : 21 JANVIER 2021
/*********************************************************************************************/

CREATE TABLE t_userprofile_usr(
    PRIMARY KEY (acc_pseudo),

    acc_pseudo varchar(64),
    usr_lastName varchar(64),
    usr_firstName varchar(64),
    usr_mail varchar(64),
    usr_validity varchar(10),
    usr_statut char(1),
    usr_creationDate varchar(64),
    
    FOREIGN KEY (acc_pseudo) REFERENCES t_useraccount_acc(acc_pseudo) 

);
/*TABLE PROFIL UTILISATEUR*/

CREATE TABLE t_useraccount_acc(
    PRIMARY KEY (acc_pseudo),

    acc_pseudo varchar(64),
    acc_mdp char(32) NOT NULL

);
/*TABLE COMPTE UTILISATEUR*/

CREATE TABLE t_news_new(
    acc_pseudo varchar(64),
    new_number INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    new_title varchar(100),
    new_text varchar(500),
    new_pubDate varchar(30),
    new_state char(1),

    FOREIGN KEY(acc_pseudo) REFERENCES t_useraccount_acc(acc_pseudo)
);
/*TABLE ACTUALITES*/

CREATE TABLE t_presentation_pre(

    acc_pseudo varchar(64),
    pre_number INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pre_struct varchar(100),
    pre_address varchar(100),
    pre_mail varchar(100),
    pre_phoneNumber varchar(64),
    pre_welcomeText varchar(500),
    pre_openingHour varchar(80),

    FOREIGN KEY (acc_pseudo) REFERENCES t_useraccount_acc(acc_pseudo)

);
/*TABLE PRESENTATION*/

CREATE TABLE t_liaison_li(
    sel_number INT NOT NULL PRIMARY KEY,
    el_number  INT NOT NULL PRIMARY KEY,

    FOREIGN KEY(sel_number) REFERENCES t_selection_sel(sel_number),
    FOREIGN KEY(el_number) REFERENCES t_element_el(el_number)

);
/*TABLE DE LIAISON ENTRE SELECTION ET ELEMENT*/

CREATE TABLE t_selection_sel(

    acc_pseudo varchar(64),
    sel_number INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sel_title varchar(100),
    sel_introText varchar(100),
    sel_date varchar(64),

    FOREIGN KEY (acc_pseudo) REFERENCES t_useraccount_acc(acc_pseudo)

);
/*TABLE DE SELECTION*/

CREATE TABLE t_link_link(
    link_number INT NOT NULL PRIMARY KEY,
    link_title varchar(100),
    link_url varchar(200),
    link_author varchar(100), 
    link_pubDate varchar(30),

    el_number INT NOT NULL,

    FOREIGN KEY (el_number) REFERENCES t_element_el(el_number)

);
/*TABLE DE LIENS*/

CREATE TABLE t_element_el(
    el_number INT NOT NULL PRIMARY KEY,
    el_title varchar(100),
    el_descriptive varchar(500),
    el_addedDate varchar(30),
    el_image varchar(100),
    el_state char(1)

    FOREIGN KEY (el_number) REFERENCES t_liaison_li(el_number)

);
/*TABLE ELEMENT*/


/**************************************************************************************************/
