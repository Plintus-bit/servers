CREATE DATABASE IF NOT EXISTS appDB1;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB1.* TO 'user'@'%';
FLUSH PRIVILEGES;


USE appDB1;

CREATE TABLE IF NOT EXISTS accounts(
	acc_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	username VARCHAR(50) NOT NULL,
  	passwords VARCHAR(50) NOT NULL,
  	email VARCHAR(100) NOT NULL,
);
CREATE INDEX serv_cart_ibfk_1 on accounts(username);

INSERT INTO accounts (username, passwords, email) VALUES ('admin', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user1', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user2', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user3', 'admin', 'test@test.com');

CREATE TABLE IF NOT EXISTS services(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	s_name VARCHAR(50) NOT NULL,
  	cost INTEGER(5) NOT NULL
);
CREATE INDEX serv_cart_ibfk_2 on services(id);

INSERT INTO services (s_name, cost) VALUES
("Починить сломанное", 13000),
("Сломать лишнее", 25),
("Починить машину соседа", 21000),
("Сломать машину соседа", 100);

CREATE TABLE IF NOT EXISTS serv_cart(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	usr_name VARCHAR(50) NOT NULL,
	serv_id INTEGER NOT NULL,
	CONSTRAINT fk1 FOREIGN KEY (usr_name) REFERENCES accounts (username)
	ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT fk1 FOREIGN KEY (serv_id) REFERENCES services (id)
	ON UPDATE CASCADE ON DELETE RESTRICT
);
