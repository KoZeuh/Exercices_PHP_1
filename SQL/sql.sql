create database if not exists personnel character set utf8 collate utf8_unicode_ci;
use personnel;


CREATE TABLE services(
	CodeServ char(3) NOT NULL default ' ',
	DesiServ varchar(30) NOT NULL default '',
	PRIMARY KEY(CodeServ)
	)ENGINE=InnoDB CHARACTER SET utf8 collate utf8_unicode_ci;
	
INSERT INTO services VALUES('S01','Fabrication');
INSERT INTO services VALUES('S02','Emballage');
INSERT INTO services VALUES('S03','Commercial');
INSERT INTO services VALUES('S04','Administration');



CREATE TABLE employe(
	Matricule char(4) NOT NULL default '',
	NomEmpl varchar(25) NOT NULL default '',
	PrenomEmpl varchar(20) NOT NULL default '',
	CodeCadre char(1) NOT NULL default '',
	ServEmpl char(3) NOT NULL default '',
	PRIMARY KEY(Matricule),
	constraint fk_empl_serv foreign key(ServEmpl) references services(CodeServ)
	)ENGINE=InnoDB CHARACTER SET utf8 collate utf8_unicode_ci;
	
	INSERT INTO employe VALUES ('E001','DUBOIS','Roland','o','s01');
	INSERT INTO employe VALUES ('E002','GERNAU','Patricia','o','s01');
	INSERT INTO employe VALUES ('E003','LOUVEL','Marc','n','s01');
	INSERT INTO employe VALUES ('E004','MAUREL','Jeanne','n','s01');
	INSERT INTO employe VALUES ('E005','DUBOSC','Alain','n','s02');
	INSERT INTO employe VALUES ('E006','PARENT','Justine','n','s02');
	INSERT INTO employe VALUES ('E007','POTIER','Jean','o','s02');
	INSERT INTO employe VALUES ('E008','FAUVEL','Anne','o','s03');	
	INSERT INTO employe VALUES ('E009','NOUVION','Patrick','n','s03');
	INSERT INTO employe VALUES ('E010','ARSANE','Marie','n','s04');
	INSERT INTO employe VALUES ('E011','DURAND','Sylvie','o','s04');	
	INSERT INTO employe VALUES ('M20','LENOIR','Carinne','o','s01');