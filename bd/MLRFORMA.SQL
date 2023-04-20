DROP DATABASE IF EXISTS BD_forma;

CREATE DATABASE IF NOT EXISTS BD_forma;
USE BD_forma;
# -----------------------------------------------------------------------------
#       TABLE : ASSOCIATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ASSOCIATION
 (
   IDAS INTEGER(3) NOT NULL  ,
   NOMAS CHAR(50) NULL  ,
   NUMICOM INTEGER(8) NULL  ,
   NOMGERANT CHAR(32) NULL  ,
   PRENOMGERANT CHAR(32) NULL  ,
   COURRIEL CHAR(32) NULL  ,
   TEL CHAR(10) NULL  ,
   FAX CHAR(10) NULL  
   , PRIMARY KEY (IDAS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ADMINISTRATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ADMINISTRATEUR
 (
   LOGINA CHAR(32) NOT NULL  ,
   MDPA CHAR(20) NULL  ,
   NOMA CHAR(32) NULL  ,
   PRENOMA CHAR(32) NULL  ,
   FONCTIONA CHAR(32) NULL  
   , PRIMARY KEY (LOGINA) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : STAGIAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STAGIAIRE
 (
   LOGINS CHAR(32) NOT NULL  ,
   IDAS INTEGER(3) NOT NULL  ,
   MDPS CHAR(20) NULL  ,
   NOMS CHAR(32) NULL  ,
   PRENOMS CHAR(32) NULL  ,
   ADRESSES CHAR(50) NULL  ,
   CPS INTEGER(5) NULL  ,
   VILLES CHAR(32) NULL  ,
   EMAILS CHAR(32) NULL  ,
   STATUTS CHAR(32) NULL  ,
   FONCTIONS CHAR(32) NULL  
   , PRIMARY KEY (LOGINS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE STAGIAIRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_STAGIAIRE_ASSOCIATION
     ON STAGIAIRE (IDAS ASC);

# -----------------------------------------------------------------------------
#       TABLE : SESSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SESSION
 (
   IDFORM INTEGER(2) NOT NULL  ,
   NUMS INTEGER(2) NOT NULL  ,
   HEUREDEBUTS TIME NULL  ,
   HEUREFINS TIME NULL  ,
   DATES DATE NULL  ,
   DATELIMITEINSCR DATE NULL  ,
   NBPLACES INTEGER(3) NULL  
   , PRIMARY KEY (IDFORM,NUMS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE SESSION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_SESSION_FORMATION
     ON SESSION (IDFORM ASC);

# -----------------------------------------------------------------------------
#       TABLE : FORMATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMATION
 (
   IDFORM INTEGER(2) NOT NULL  ,
   CODETYPE CHAR(3) NOT NULL  ,
   NOMF CHAR(32) NULL  ,
   PUBLICF CHAR(50) NULL  ,
   OBJECTIFF CHAR(50) NULL  ,
   CONTENUF CHAR(50) NULL  ,
   COUTF INTEGER(3) NULL  ,
   LIEUF CHAR(150) NULL  
   , PRIMARY KEY (IDFORM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FORMATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_FORMATION_TYPE_FORMATION
     ON FORMATION (CODETYPE ASC);

# -----------------------------------------------------------------------------
#       TABLE : INTERVENANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INTERVENANT
 (
   IDI INTEGER(3) NOT NULL  ,
   NOMI CHAR(32) NULL  ,
   PRENOMI CHAR(32) NULL  ,
   ENTREPRISEI CHAR(32) NULL  
   , PRIMARY KEY (IDI) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TYPE_FORMATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE_FORMATION
 (
   CODETYPE CHAR(3) NOT NULL  ,
   LIBELLE CHAR(32) NULL  
   , PRIMARY KEY (CODETYPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPER
 (
   IDFORM INTEGER(2) NOT NULL  ,
   NUMS INTEGER(2) NOT NULL  ,
   LOGINS CHAR(32) NOT NULL  
   , PRIMARY KEY (IDFORM,NUMS,LOGINS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPER_SESSION
     ON PARTICIPER (IDFORM ASC,NUMS ASC);

CREATE  INDEX I_FK_PARTICIPER_STAGIAIRE
     ON PARTICIPER (LOGINS ASC);

# -----------------------------------------------------------------------------
#       TABLE : INTERVENIR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INTERVENIR
 (
   IDI INTEGER(3) NOT NULL  ,
   IDFORM INTEGER(2) NOT NULL  
   , PRIMARY KEY (IDI,IDFORM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE INTERVENIR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_INTERVENIR_INTERVENANT
     ON INTERVENIR (IDI ASC);

CREATE  INDEX I_FK_INTERVENIR_FORMATION
     ON INTERVENIR (IDFORM ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE STAGIAIRE 
  ADD FOREIGN KEY FK_STAGIAIRE_ASSOCIATION (IDAS)
      REFERENCES ASSOCIATION (IDAS) ;


ALTER TABLE SESSION 
  ADD FOREIGN KEY FK_SESSION_FORMATION (IDFORM)
      REFERENCES FORMATION (IDFORM) ;


ALTER TABLE FORMATION 
  ADD FOREIGN KEY FK_FORMATION_TYPE_FORMATION (CODETYPE)
      REFERENCES TYPE_FORMATION (CODETYPE) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_SESSION (IDFORM,NUMS)
      REFERENCES SESSION (IDFORM,NUMS) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_STAGIAIRE (LOGINS)
      REFERENCES STAGIAIRE (LOGINS) ;


ALTER TABLE INTERVENIR 
  ADD FOREIGN KEY FK_INTERVENIR_INTERVENANT (IDI)
      REFERENCES INTERVENANT (IDI) ;


ALTER TABLE INTERVENIR 
  ADD FOREIGN KEY FK_INTERVENIR_FORMATION (IDFORM)
      REFERENCES FORMATION (IDFORM) ;

