#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: partie
#------------------------------------------------------------

CREATE TABLE partie(
        id      int (11) Auto_increment  NOT NULL ,
        lieu    Varchar (255) NOT NULL ,
        horaire Datetime NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ligne
#------------------------------------------------------------

CREATE TABLE ligne(
        id        int (11) Auto_increment  NOT NULL ,
        num       Int NOT NULL ,
        manche    Int NOT NULL ,
        id_partie Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: joueur
#------------------------------------------------------------

CREATE TABLE joueur(
        id  int (11) Auto_increment  NOT NULL ,
        nom Varchar (255) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: combinaison
#------------------------------------------------------------

CREATE TABLE combinaison(
        id     int (11) Auto_increment  NOT NULL ,
        nom    Varchar (255) NOT NULL ,
        valeur Decimal (3,1) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: infoPartie
#------------------------------------------------------------

CREATE TABLE infoPartie(
        ordre         Int NOT NULL ,
        avertissement Int ,
        nenette       Int ,
        id            Int NOT NULL ,
        id_joueur     Int NOT NULL ,
        PRIMARY KEY (id ,id_joueur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: score
#------------------------------------------------------------

CREATE TABLE score(
        firstTry       Bool NOT NULL ,
        yolo           Bool ,
        firstGame      Bool ,
        id             Int NOT NULL ,
        id_ligne       Int NOT NULL ,
        id_combinaison Int NOT NULL ,
        PRIMARY KEY (id ,id_ligne ,id_combinaison )
)ENGINE=InnoDB;

ALTER TABLE ligne ADD CONSTRAINT FK_ligne_id_partie FOREIGN KEY (id_partie) REFERENCES partie(id);
ALTER TABLE infoPartie ADD CONSTRAINT FK_infoPartie_id FOREIGN KEY (id) REFERENCES partie(id);
ALTER TABLE infoPartie ADD CONSTRAINT FK_infoPartie_id_joueur FOREIGN KEY (id_joueur) REFERENCES joueur(id);
ALTER TABLE score ADD CONSTRAINT FK_score_id FOREIGN KEY (id) REFERENCES joueur(id);
ALTER TABLE score ADD CONSTRAINT FK_score_id_ligne FOREIGN KEY (id_ligne) REFERENCES ligne(id);
ALTER TABLE score ADD CONSTRAINT FK_score_id_combinaison FOREIGN KEY (id_combinaison) REFERENCES combinaison(id);
