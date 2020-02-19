CREATE DATABASE portfolio;

use portfolio;


CREATE TABLE messages (
id INT unsigned PRIMARY KEY auto_increment,
nom VARCHAR(75) NOT NULL,
prenom VARCHAR(75) NOT NULL,
mail VARCHAR(255) NOT NULL,
commentaire VARCHAR(1000) NOT NULL,
date_envoie DATE NOT NULL
);

CREATE TABLE recommandation (
id INT unsigned PRIMARY KEY auto_increment,
author VARCHAR(75) NOT NULL,
entreprise VARCHAR(75) NOT NULL,
email VARCHAR(255) NOT NULL,
messages VARCHAR(500) NOT NULL,
created_date DATE NOT NULL
);