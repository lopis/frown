-- 
-- Database: Frown API
-- 

DROP DATABASE IF EXISTS Frown;

CREATE DATABASE Frown DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE Frown;

-- --------------------------------------------------------

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Avatar;
DROP TABLE IF EXISTS Item;
DROP TABLE IF EXISTS Avatar_Item;
DROP TABLE IF EXISTS Avatar_User;
DROP TABLE IF EXISTS Type;
DROP TABLE IF EXISTS Item_Type;

CREATE TABLE User (
  id int(4) NOT NULL auto_increment,
  username varchar(50) NOT NULL,
  email varchar(50),
  password varchar(50) NOT NULL,
  admin boolean NOT NULL,
  PRIMARY KEY  (id)
) DEFAULT CHARSET=utf8;

CREATE TABLE Avatar (
  id int(4) NOT NULL auto_increment,
  name varchar(50) NOT NULL,
  svg BLOB,
  PRIMARY KEY  (id)
) DEFAULT CHARSET=utf8;

CREATE TABLE Avatar_User (
  id int(4) NOT NULL auto_increment,
  id_avatar int(4) NOT NULL,
  id_user int(4) NOT NULL,
  PRIMARY KEY  (id),
  FOREIGN KEY (id_avatar) REFERENCES Avatar(id),
  FOREIGN KEY (id_user) REFERENCES User(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE Item (
  id int(4) NOT NULL auto_increment,
  name varchar(50) NOT NULL,
  layer int(4) NOT NULL,
  color varchar(50),
  svg BLOB NOT NULL,  
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

CREATE TABLE Type (
  id int(4) NOT NULL auto_increment,
  name varchar(50) NOT NULL,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

CREATE TABLE Item_Type (
  id int(4) NOT NULL auto_increment,
  id_type int(4) NOT NULL,
  id_item int(4) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_type) REFERENCES Type(id),
  FOREIGN KEY (id_item) REFERENCES Item(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE Avatar_Item (
  id int(4) NOT NULL auto_increment,
  id_avatar int(4) NOT NULL,
  id_item int(4) NOT NULL,
  PRIMARY KEY  (id),
  FOREIGN KEY (id_avatar) REFERENCES Avatar(id),
  FOREIGN KEY (id_item) REFERENCES Item(id)
) DEFAULT CHARSET=utf8;

-- 
-- Dumping data for tables
-- 

INSERT INTO User (username, email, password, admin) VALUES ('admin', 'admin@admin.pt', MD5('123'), 1);

-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();
-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();
-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();