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

CREATE TABLE User (
  id int(4) NOT NULL auto_increment,
  username varchar(50) NOT NULL,
  email varchar(50),
  password varchar(100) NOT NULL,
  admin boolean NOT NULL,
  PRIMARY KEY  (id)
) DEFAULT CHARSET=utf8;

CREATE TABLE Avatar (
  id int(4) NOT NULL auto_increment,
  name varchar(50) NOT NULL,
  svg BLOB,
  PRIMARY KEY  (id)
) DEFAULT CHARSET=utf8;

CREATE TABLE Item (
  id int(4) NOT NULL auto_increment,
  name varchar(50) NOT NULL,
  layer int(4) NOT NULL,
  color varchar(50) NOT NULL,
  svg BLOB NOT NULL,  
  type int(4) NOT NULL,
  PRIMARY KEY (id)
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
INSERT INTO User (username, email, password, admin) VALUES ('jose', 'jose@jose.pt', MD5('123'), 0);
INSERT INTO User (username, email, password, admin) VALUES ('manel', 'manel@manel.pt', MD5('123'), 0);

INSERT INTO Avatar (name) VALUES ('Wingardium');
INSERT INTO Avatar (name) VALUES ('Levio');
INSERT INTO Avatar (name) VALUES ('SUHHH');

INSERT INTO Item (name, layer, color, type, svg) VALUES ('Emo hair', 2, 'Hair','000000','<svg version="1.1" baseProfile="basic"
	 id="svg3883" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px"
	 viewBox="0 0 512 512" xml:space="preserve">
<path id="path3086" fill="#0A0A0A" d="M163.119,32.668c-17.314,12.758-25.625,27.953-40.097,72.902
	c-6.365,19.772-3.645,28.249-5.468,47.386c-1.63,17.117,8.202,59.233,8.202,59.233l11.847-15.491l7.29,18.226l15.491-43.742
	l-2.733,41.008c13.053-29.166,13.95-65.626,39.185-87.482c10.297,27.394,8.693,56.771,4.557,86.571
	c12.418-24.067,23.987-29.196,20.959-78.37c0.821,25.212,2.57,50.424,4.557,75.637c9.545-28.272,9.275-57.771,36.451-83.838
	c12.035,14.201,13.144,37.77,8.201,66.523c13.728-13.932,24.954-29.649,21.871-55.588c10.242,0,3.037,85.709,2.733,89.305
	c-0.681,8.081,24.397-98.495,10.024-103.886c8.087,13.366,18.131,23.602,14.58,55.588c10.434-2.839,19.234-4.046,20.049,2.734
	c7.37,13.669,4.766,27.338,5.468,41.007l12.758-46.475l-14.581,86.571l23.693-51.942l-9.112,77.458l20.048-41.008l5.468,58.322
	c0,0,24.604-77.459,20.048-136.691c-4.557-59.233-26.476-105.367-38.273-119.378c-29.161-34.628-59.284-14.401-53.766-17.313
	c3.454-1.823-6.716-13.67-24.604-16.403c-17.518-1.907-31.128-5.78-65.612-0.911C194.179,16.598,189.716,16.448,163.119,32.668
	L163.119,32.668z"/>
</svg>');
INSERT INTO Item (name, layer, color, svg, type) VALUES ('Crimson shirt', 2, 'Tshirt','FF0000','<svg version="1.1" baseProfile="basic"
	 id="svg2" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" inkscape:version="0.48.2 r9819" sodipodi:docname="main_project.svg"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px"
	 viewBox="0 0 512 512" xml:space="preserve">
<sodipodi:namedview  id="base" bordercolor="#666666" inkscape:cy="230.0957" borderopacity="1.0" pagecolor="#ffffff" showgrid="false" inkscape:cx="189.892" inkscape:zoom="1.097361" inkscape:document-units="px" inkscape:current-layer="layer4" inkscape:window-width="1304" inkscape:window-height="746" inkscape:window-x="54" inkscape:window-y="-8" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:window-maximized="1">
	</sodipodi:namedview>
<g id="layer4" inkscape:label="Tshirt" inkscape:groupmode="layer">
	<path id="path3973" sodipodi:nodetypes="csscssscsssccc" inkscape:connector-curvature="0" fill="#9B1010" d="M76.5,487.5
		c0,0-5-28,13.5-59s63.392-50.771,87.03-58.062c23.47-7.237,36.53-13.172,36.53-13.172s-3.277,9.646-6.939,27.556
		C202.589,404.546,215.5,417,232.5,417.5s48.744-6.983,73.854-22.5c24.494-15.139,37.432-42.771,37.237-43.207
		c0,0,11.208,10.894,24.247,16.01c23.029,9.036,45.358,18.337,62.161,31.697c16.899,13.438,45.612,58.529,49.4,76.916
		c0.195,0.947-53.109,22.959-81.4,37.084L113,513L76.5,487.5z"/>
</g>
</svg>');
INSERT INTO Item (name, layer, color, svg, type) VALUES ('Light Skin', 1, 'Body', 'EBEBEB','<svg version="1.1" baseProfile="basic"
	 id="svg2" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" inkscape:version="0.48.2 r9819" sodipodi:docname="main_project.svg"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px"
	 viewBox="0 0 512 512" xml:space="preserve">
<sodipodi:namedview  id="base" bordercolor="#666666" inkscape:cy="230.0957" borderopacity="1.0" pagecolor="#ffffff" showgrid="false" inkscape:cx="189.892" inkscape:zoom="1.097361" inkscape:document-units="px" inkscape:current-layer="layer1" inkscape:window-width="1304" inkscape:window-height="746" inkscape:window-x="54" inkscape:window-y="-8" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:window-maximized="1">
	</sodipodi:namedview>
<path id="path3901" sodipodi:nodetypes="ccsssccccscssc" inkscape:connector-curvature="0" fill="#FFD3B3" d="M80.434,513.702
	h401.96c0,0,1.483-44.497-28.182-80.837c-29.665-36.339-58.04-50.063-80.837-62.296c-15.203-8.158-20.707-9.093-29.851-14.833
	c-9.725-6.104-8.712-32.308-10.383-45.053c-0.68-15.621-1.359-25.469-2.039-38.194l-114.581,26.884
	c0.947,10.058,2.535,21.444,2.596,29.665c-0.862,7.763-1.485,31.057-12.607,35.598c-11.004,4.493-40.444,16.058-56.734,22.249
	c-19.165,7.876-38.156,18.457-49.317,33.373c-11.35,15.167-15.957,28.963-17.799,44.126
	C80.456,482.519,80.434,513.702,80.434,513.702L80.434,513.702z"/>
<path id="Face" inkscape:label="#path3008" sodipodi:nodetypes="cssssssc" inkscape:connector-curvature="0" fill="#FFD3B3" d="
	M203.334,323.991c0,0,76.873,22.928,136.888-33.042c60.016-55.969,51.356-132.379,47.878-159.814
	c-4.117-32.467-31.02-76.873-88.337-80.245c-57.318-3.372-98.452,2.697-122.728,32.367c-24.275,29.671-7.305,52.202-17.532,89.012
	c-4.861,17.494-19.556,50.574-18.207,74.85C142.644,271.395,151.41,307.808,203.334,323.991L203.334,323.991z"/>
<radialGradient id="path3786_1_" cx="423.9861" cy="-74.1711" r="25.0117" gradientTransform="matrix(0.9591 0.0136 0.0218 -1.5334 -145.0652 67.8901)" gradientUnits="userSpaceOnUse">
	<stop  offset="0" style="stop-color:#FFFFFF"/>
	<stop  offset="1" style="stop-color:#F0F0F0"/>
</radialGradient>
<path id="path3786" inkscape:connector-curvature="0" fill="url(#path3786_1_)" d="M250.357,225.482
	c10.586,1.895,20.422-5.816,24.774-14.984c7.773-13.894,13.138-30.986,7.438-46.608c-2.434-6.667-7.192-13.764-14.845-14.629
	c-8.021-1.44-14.824,4.341-19.892,9.803c-9.818,10.753-12.754,25.879-12.921,40.007c0.247,9.754,3.982,20.644,12.938,25.628
	C248.647,225.065,249.49,225.338,250.357,225.482L250.357,225.482z"/>
<radialGradient id="path3809_1_" cx="337.7478" cy="-35.7805" r="17.0291" gradientTransform="matrix(1 0 0 -2.0541 -159.7998 102.4708)" gradientUnits="userSpaceOnUse">
	<stop  offset="0" style="stop-color:#FFFFFF"/>
	<stop  offset="1" style="stop-color:#F0F0F0"/>
</radialGradient>
<path id="path3809" inkscape:connector-curvature="0" fill="url(#path3809_1_)" d="M172.904,210.851c0,0,6.54,1.55,12.393-7.745
	c5.852-9.294,10.154-21.687,9.639-40.275c-0.517-18.589-9.467-23.58-15.663-21.343s-13.425,13.598-16.352,25.646
	c-2.926,12.049-2.065,24.957-1.032,30.121C162.921,202.417,167.224,209.474,172.904,210.851L172.904,210.851z"/>
<path id="path3815" sodipodi:nodetypes="csssc" inkscape:connector-curvature="0" d="M176.863,199.835
	c5.729,0.944,11.476-10.047,12.22-19.965c1.428-19.012-2.069-27.957-7.057-28.228c-5.682-0.309-10.499,11.359-11.704,22.203
	S169.29,198.975,176.863,199.835L176.863,199.835z"/>
<path id="path3817" sodipodi:nodetypes="csssc" inkscape:connector-curvature="0" d="M249.841,212.573
	c7.918,1.377,12.909-9.639,14.975-22.72s-1.894-25.99-7.573-27.367s-12.909,12.221-14.286,23.236S241.924,211.024,249.841,212.573
	L249.841,212.573z"/>
<path id="path3891" sodipodi:nodetypes="csscsc" inkscape:connector-curvature="0" fill="#E5C0A8" d="M209.737,187.787
	c0,0-3.931,13.925-6.063,20.6c-1.037,3.246-14.592,20.881-13.559,23.807c1.032,2.927,22.72,4.819,22.72,4.819
	s3.786-21.515,3.098-28.571S209.737,187.787,209.737,187.787L209.737,187.787z"/>
<path id="path3893" sodipodi:nodetypes="cssscssssc" inkscape:connector-curvature="0" fill="#E5C0A8" d="M320.906,178.9
	c0,0,11.681,5.191,9.826,17.243c-1.854,12.051-2.225,8.528-3.894,13.163c-1.668,4.636,0.742,6.119-2.781,10.383
	c-3.522,4.265-9.27,7.046-9.27,7.046s9.826,10.012,15.944,1.298s2.225-6.86,5.006-11.866s5.748-0.186,9.085-13.72
	c3.338-13.535,3.522-15.574-2.41-25.216C336.48,167.59,320.906,178.9,320.906,178.9L320.906,178.9z"/>
<path id="Mouth" inkscape:label="#path3895" inkscape:connector-curvature="0" fill="#FFFFFF" fill-opacity="0.9647" d="
	M265.841,260.849c0,0-61.926,13.35-73.421,12.236c-11.495-1.112-35.969-22.248-35.969-22.248s17.799,28.923,33.744,31.519
	C206.139,284.951,265.841,260.849,265.841,260.849z"/>
</svg>');

-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();
-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();
-- INSERT INTO Avatar_Item (id_avatar, id_item) VALUES ();