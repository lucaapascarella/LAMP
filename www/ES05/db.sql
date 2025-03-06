CREATE DATABASE IF NOT EXISTS ES05;
USE ES05; SHOW DATABASES;


-- DROP USER IF EXISTS ES05_user@localhost;
CREATE USER IF NOT EXISTS ES05_user@localhost IDENTIFIED BY 'mia_password';
-- ALTER USER ES05_user@localhost IDENTIFIED BY 'nuova_password';
SELECT user, host FROM mysql.user;
GRANT SELECT, INSERT, UPDATE, DELETE ON ES05.* TO ES05_user@localhost;
-- GRANT ALL ON ES05.* TO ES05_user@localhost;
SHOW GRANTS FOR ES05_user@localhost;

-- DROP TABLE IF EXISTS utente;
CREATE TABLE IF NOT EXISTS utente (
  UserID INT NOT NULL AUTO_INCREMENT ,
  Username VARCHAR(64) NOT NULL UNIQUE,
  Password VARCHAR(64) NOT NULL ,
  PRIMARY KEY (UserID)
) AUTO_INCREMENT=1000;
SHOW TABLES; 
SHOW CREATE TABLE utente;

INSERT INTO utente (UserID, Username, Password 
) VALUES (NULL, 'utente', 'prova');

INSERT INTO utente VALUES 
(NULL, 'mrossi', '123'),
(NULL, 'admin', 'admin');


INSERT INTO utente VALUES 
(NULL, 'pasc', 'pasc');

SELECT * FROM utente;

