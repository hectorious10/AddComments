CREATE DATABASE IF NOT EXISTS 'db_shapeslog';USE 'db_shapeslog';

CREATE TABLE IF NOT EXISTS 'products' (
  'prod_id' int(4) NOT NULL AUTO_INCREMENT,
  'prod_img' varchar(50) NOT NULL DEFAULT '0',
  'prod_title' varchar(50) NOT NULL DEFAULT 'Title',
  'prod_desc' tinytext,
  PRIMARY KEY ('prod_id')
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'users' (
  'usr_id' int(4) NOT NULL AUTO_INCREMENT,
  'usr_eml' varchar(64) NOT NULL DEFAULT '0',
  'usr_pass' varchar(64) NOT NULL,
  'usr_fullnm' varchar(50) DEFAULT NULL,
  PRIMARY KEY ('usr_id')
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'comreg' (
  'com_id' int(4) NOT NULL AUTO_INCREMENT,
  'com_usrid' int(11) NOT NULL DEFAULT '0',
  'com_proid' int(11) NOT NULL DEFAULT '0',
  'com_rev' tinytext,
  'com_time' timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ('com_id'),
  KEY 'fk_prod' ('com_proid'),
  KEY 'fk_usr' ('com_usrid'),
  CONSTRAINT 'fk_prod' FOREIGN KEY ('com_proid') REFERENCES 'products' ('prod_id'),
  CONSTRAINT 'fk_usr' FOREIGN KEY ('com_usrid') REFERENCES 'users' ('usr_id')
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'viewreg' (
  'vie_id' int(4) NOT NULL AUTO_INCREMENT,
  'vie_usrid' int(11) NOT NULL DEFAULT '0',
  'vie_proid' int(11) NOT NULL DEFAULT '0',
  'vie_ltime' datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY ('vie_id'),
  KEY 'fkv_usr' ('vie_usrid'),
  KEY 'fkv_prod' ('vie_proid'),
  CONSTRAINT 'fkv_prod' FOREIGN KEY ('vie_proid') REFERENCES 'products' ('prod_id'),
  CONSTRAINT 'fkv_usr' FOREIGN KEY ('vie_usrid') REFERENCES 'users' ('usr_id')
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;