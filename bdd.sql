-- Ecrire votre code SQL dans ce fichier
CREATE DATABASE IF NOT EXISTS games;

USE games;

CREATE TABLE IF NOT EXISTS console (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL UNIQUE,
	manufacturer VARCHAR(50) NOT NULL 
)ENGINE=innodb;

CREATE TABLE IF NOT EXISTS video_game (
	id INT PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(50) NOT NULL,
	type VARCHAR(50) NOT null,
	publish_at DATE NOT NULL,
	id_console INT NOT null,
	CONSTRAINT fk_publish_cideo_game_console FOREIGN KEY (id_console) REFERENCES console (id)
)ENGINE=innodb;

INSERT INTO console (name, manufacturer)
	VALUES ('PlayStation 5', 'Sony'),
			('Switch', 'Nintendo'),
			('Xbox Series X', 'Microsoft'),
			('Steam Deck', 'Valve')