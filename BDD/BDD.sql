CREATE DATABASE IF NOT EXISTS quai_antique CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE admin(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(40) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(40) NOT NULL
) ENGINE=INNODB;

CREATE TABLE user(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(40) NOT NULL,
    password VARCHAR(255) NOT NULL,
    allergy VARCHAR(40),
    number_of_guest INT NOT NULL,
    role VARCHAR(40) NOT NULL
)ENGINE=INNODB;

CREATE TABLE menu(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(40) NOT NULL
)ENGINE=INNODB;

CREATE TABLE formule(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(200) NOT NULL,
    price FLOAT NOT NULL,
    menu_id INT NOT NULL,
    FOREIGN KEY (menu_id) REFERENCES menu(id)
)ENGINE=INNODB;

CREATE TABLE category(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL
)ENGINE=INNODB;

CREATE TABLE dish(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(40) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id)
)ENGINE=INNODB;

CREATE TABLE tables(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    limited_seats INT NOT NULL
)ENGINE=INNODB;

CREATE TABLE reservation(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    hour TIME NOT NULL,
    number_of_guest INT NOT NULL,
    name VARCHAR(20) NOT NULL,
    allergy VARCHAR(100),
    email VARCHAR(50) NOT NULL,
    user_id INT,
    FOREIGN KEY(user_id) REFERENCES user(id),
    table_id INT NOT NULL,
    FOREIGN KEY(table_id) REFERENCES tables(id)
)ENGINE=INNODB;

CREATE TABLE hour(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    opening_morning TIME NOT NULL,
    closing_morning TIME NOT NULL,
    opening_night TIME NOT NULL,
    closing_night TIME NOT NULL
)ENGINE=INNODB;

CREATE TABLE galery(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    image VARCHAR(255) NOT NULL
)ENGINE=INNODB;

INSERT INTO admin (id, email, password, role) VALUES (1, 'varicheBorn@admin.com','$2y$10$OCl8fTzeNfJ5OshfWrgMMOC5cVIppOJbQUSFlO.d6K9S18Q28Fjo2', 'admin');
INSERT INTO admin (id, email, password, role) VALUES (2, 'dallassmalles@exemple.com','$2y$10$CtSPxdGrQWinbiblpstf1eUOaB2SjgjNK3TxHHIVABV1pxCo1tYIK', 'admin');

INSERT INTO user (id, email, password, allergy, number_of_guest, role) VALUES (1, 'saulcheales@exemple.com', '$2y$10$PbMuts3xbXJP2lfn0ZTML.6LdU5uGcyZqH/ck3ws2ltA.HWxrQanC', 'poisson', '2', 'subscriber');
INSERT INTO user (id, email, password, allergy, number_of_guest, role) VALUES (2, 'marlojersh@exemple.com', '$2y$10$Ya3FxUXu.9HXXwivjjh9F.36Af5yrmmebPG4oqfOWWhkPENtQIUzy', 'arachide', '6', 'subscriber');
INSERT INTO user (id, email, password, allergy, number_of_guest, role) VALUES (3, 'bernypea@exemple.com', '$2y$10$aYqInxNurNbRL4Rx1KjcYOhwxpr7XtKg5xxi7jwJqwEiCYYTzvz9e', NULL, '4', 'subscriber');

INSERT INTO menu (id, title) VALUES (1, 'Déjeuner');
INSERT INTO menu (id, title) VALUES (2, 'Dîner');

INSERT INTO formule (id, description, price, menu_id) VALUES (1, '(Entrée, Plat, Dessert)', 40, 1);
INSERT INTO formule (id, description, price, menu_id) VALUES (2, '(Amuse bouche, 2 Entrées, Plat, Fromage, Dessert)', 120, 2);

INSERT INTO category (id, title) VALUES (1, 'Entrées');
INSERT INTO category (id, title) VALUES (2, 'Plat');
INSERT INTO category (id, title) VALUES (3, 'Dessert');

INSERT INTO dish (id, title, description, price, category_id) VALUES (1, 'Salade savoyarde', 'Une salade garnie de lardon et fromage savoyard', 20, 1);
INSERT INTO dish (id, title, description, price, category_id) VALUES (2, 'Soupe savoyarde', 'Une soupe de patate et potiron accompagné de lardon', 20, 1);
INSERT INTO dish (id, title, description, price, category_id) VALUES (3, 'Gâteau au chocolat et figues', 'Un gâteau au chocolat et figues pochées au vin chaud', 40, 3);
INSERT INTO dish (id, title, description, price, category_id) VALUES (4, 'Périgord', 'Filet mignon de porc glacé au reblochon et navets confits', 60, 2);
INSERT INTO dish (id, title, description, price, category_id) VALUES (5, 'Bruschetta ', 'Une bruschetta façon raclette', 70, 2);   
INSERT INTO dish (id, title, description, price, category_id) VALUES (6, 'Bugnes de savoie', 'Un petit beignet frit que l’on mange traditionnellement le jour de mardi gras en Savoie', 30, 3);

INSERT INTO tables(id, limited_seats) VALUES (1, 50);

INSERT INTO hour(id, opening_morning, closing_morning, opening_night, closing_night) VALUES (1, '12:00', '14:00', '19:00', '22:00');

INSERT INTO galery(id, title, image) VALUES (1, 'title', 'https://images.unsplash.com/photo-1574484284002-952d92456975?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');
INSERT INTO galery(id, title, image) VALUES (2, 'Gâteau au chocolat et figues', 'https://images.unsplash.com/photo-1565592415402-1e5c0e0c0707?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=749&q=80');
INSERT INTO galery(id, title, image) VALUES (3, 'Salade Savoyarde', 'https://images.unsplash.com/photo-1482049016688-2d3e1b311543?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80');
INSERT INTO galery(id, title, image) VALUES (4, 'Bruschetta', 'https://images.unsplash.com/photo-1629570585590-c17fae0839f0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fGJydXNjaGV0dGF8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60');