DROP ABLE IF EXISTS note;
DROP TABLE IF EXISTS user;


CREATE TABLE user (
	id INT PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR(32) NOT NULL,
	last_name VARCHAR(32) NOT NULL,
	username VARCHAR(16) UNIQUE NOT NULL,
	email VARCHAR(255) UNIQUE NOT NULL,
	password CHAR(60) NOT NULL,
	verified BOOL DEFAULT FALSE
);


CREATE TABLE note (
	id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL REFERENCES user(id),
	title VARCHAR(255) NOT NULL,
	content TEXT NOT NULL,
	creation_datetime DATETIME NOT NULL,
	last_edit_datetime DATETIME,
	deleted BOOLEAN DEFAULT FALSE
);