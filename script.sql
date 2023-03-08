create database if not exists sqlinjection;
use sqlinjection;

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  username varchar(20) not null,
  password varchar(50) not null,
  PRIMARY KEY (id)
);

CREATE TABLE credit_cards (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  credit_card_number VARCHAR(16) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (name, username, password) VALUES ('Loubna El Attar', 'elattar', 'test');
INSERT INTO users (name, username, password) VALUES ('Mike Ross', 'ross', 'test' );
INSERT INTO users (name, username, password) VALUES ('Yassmina Souheir', 'souheir', 'test');
INSERT INTO users (name, username, password) VALUES ('Mohammed Sghiouri', 'sghiouri', 'test');
INSERT INTO users (name, username, password) VALUES ('Test Test', 'mike', 'test');
INSERT INTO users (name, username, password) VALUES ('Piccola Luce', 'piccola', 'test');
INSERT INTO users (name, username, password) VALUES ('Roon', 'luce', 'test');
INSERT INTO users (name, username, password) VALUES ('El Attar Loubna', 'loubna', 'test');

INSERT INTO credit_cards (user_id, credit_card_number) VALUES (1, '1234567890123456');
INSERT INTO credit_cards (user_id, credit_card_number) VALUES (2, '9876543210987654');
INSERT INTO credit_cards (user_id, credit_card_number) VALUES (3, '1111222233334444');
INSERT INTO credit_cards (user_id, credit_card_number) VALUES (4, '1234567890123452');
INSERT INTO credit_cards (user_id, credit_card_number) VALUES (5, '9876543210987653');
INSERT INTO credit_cards (user_id, credit_card_number) VALUES (6, '1111222233334444');
INSERT INTO credit_cards (user_id, credit_card_number) VALUES (7, '1234567890123455');
INSERT INTO credit_cards (user_id, credit_card_number) VALUES (8, '9876543210987656');


