CREATE TABLE user (
	id INT PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR(32) NOT NULL,
	last_name VARCHAR(32) NOT NULL,
	username VARCHAR(16) UNIQUE NOT NULL,
	email VARCHAR(255) UNIQUE NOT NULL,
	password CHAR(60) NOT NULL,
	verification_token CHAR(128),
	verified BOOL DEFAULT FALSE,
	reset_password_token CHAR(128),
	reset_password_time_generated DATETIME
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