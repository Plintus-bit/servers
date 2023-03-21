CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;


USE appDB;

CREATE TABLE IF NOT EXISTS accounts(
	acc_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	username VARCHAR(50) NOT NULL,
  	passwords VARCHAR(50) NOT NULL,
  	email VARCHAR(100) NOT NULL
);

INSERT INTO accounts (username, passwords, email) VALUES ('admin', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user1', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user2', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user3', 'admin', 'test@test.com');

CREATE TABLE IF NOT EXISTS services(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	descript VARCHAR(100) NOT NULL,
  	s_name VARCHAR(50) NOT NULL,
  	cost INTEGER(5) NOT NULL
);

INSERT INTO services (s_name, descript, cost) VALUES
("Починить сломанное", "mnogo bukov", 13000),
("Сломать лишнее","mnogo bukov", 25),
("Починить машину соседа","mnogo bukov", 21000),
("Сломать машину соседа","mnogo bukov", 100);
