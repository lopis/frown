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


INSERT INTO Item (name, layer, color, svg) VALUES ('Manequin', 0, '000000','<svg version="1.1" baseProfile="basic"
	 id="svg2" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="128px" height="128px"
	 viewBox="0 0 512 512" xml:space="preserve">
<path id="path3941" fill="#8FC6E5" d="M80.434,513.699h401.96c0,0,1.483-44.497-28.182-80.837
	c-29.665-36.339-58.04-50.063-80.84-62.296c-15.2-8.155-20.707-9.093-29.851-14.833c-9.725-6.104-8.712-32.308-10.383-45.053
	c-0.681-15.621-1.359-25.469-2.039-38.194l-114.58,26.887c0.944,10.058,2.535,21.441,2.596,29.665
	c-0.862,7.763-1.485,31.057-12.607,35.598c-11.004,4.493-40.441,16.058-56.731,22.249c-19.165,7.876-38.156,18.457-49.317,33.373
	c-11.35,15.167-15.957,28.963-17.799,44.126C80.456,482.519,80.434,513.699,80.434,513.699L80.434,513.699z"/>
<path id="Face-8" fill="#8FC6E5" d="M203.334,323.991c0,0,76.873,22.928,136.891-33.042
	c60.016-55.972,51.354-132.382,47.878-159.814c-4.117-32.467-31.021-76.873-88.337-80.245
	c-57.318-3.372-98.452,2.697-122.729,32.367c-24.273,29.671-7.305,52.202-17.532,89.012c-4.858,17.494-19.556,50.574-18.207,74.853
	C142.644,271.395,151.41,307.808,203.334,323.991L203.334,323.991z"/>
<path id="Face-8_2_" fill="#7BAABF" d="M203.334,323.991L203.334,323.991c0,0,76.873,22.928,136.891-33.042
	c60.016-55.972,51.354-132.382,47.878-159.814c0,0-12.603,79.365-56.603,146.365C292.894,336.285,203.334,323.991,203.334,323.991z"
	/>
<path fill="#7BAABF" d="M288.457,186.915c0,0,6.817-38.313-16.453-41.604s-33.377,30.557-33.377,30.557s9.872-27.031,28.206-23.035
	S288.457,186.915,288.457,186.915z"/>
<path fill="#7BAABF" d="M198.432,168.581c0,0,3.996-29.616-10.813-32.202s-21.39,21.859-21.39,21.859s8.697-19.039,24.681-14.808
	C199.291,145.649,198.432,168.581,198.432,168.581z"/>
</svg>');

-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();
-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();
-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();