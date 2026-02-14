CREATE TABLE user_takalo(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,  
    id_role INT,
    initial VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_role) REFERENCES roles_takalo(id)
);

    create table roles_takalo(
    id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL UNIQUE
    );

create table produit_takalo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10, 2) NOT NULL,
    image  VARCHAR(255) NOT NULL,
    id_categorie INT,
    id_proprietaire INT,
    id_statut INT,
    FOREIGN KEY (id_statut) REFERENCES statut_takalo(id),
    FOREIGN KEY (id_proprietaire) REFERENCES user_takalo(id),
    FOREIGN KEY (id_categorie) REFERENCES categorie(id)
);

CREATE TABLE categorie(
    id INT PRIMARY KEY AUTO_INCREMENT,
    statut VARCHAR(50) NOT NULL UNIQUE
);

create table statut_takalo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    statut VARCHAR(50) NOT NULL UNIQUE
);

-- INSERT USERS
INSERT INTO user_takalo (nom, email, password, id_role, initial) VALUES
('Alice', 'test@gmail.com','bisousbe', 1, 'A'),
('Bob', 'bob@gmail.com', 'bobpass', 2, 'B');

--INSERT ROLES
INSERT INTO roles_takalo (id,name) VALUES (1, 'Admin'),
(2, 'User');




INSERT INTO statut_takalo (statut) VALUES ('En Attente de confirmation');
INSERT INTO statut_takalo (statut) VALUES ('Confirmé');
INSERT INTO statut_takalo (statut) VALUES ('Annulé');
INSERT INTO statut_takalo (statut) VALUES ('Neutre');


INSERT INTO produit_takalo (nom, description, prix, image, id_categorie, id_proprietaire, id_statut) VALUES
('iPhone 13 Pro', 'Smartphone Apple iPhone 13 Pro 256GB en très bon état, couleur graphite, avec facture et garantie', 899.99, 'iphone13pro.jpg', 1, 4, 4),

('MacBook Air M1', 'MacBook Air avec puce M1, 8GB RAM, 256GB SSD, argent, utilisé mais en parfait état', 849.00, 'macbookair_m1.jpg', 2, 5, 4),

('Vélo de route Carbone', 'Vélo de course en carbone, taille M, équipé Shimano 105, idéal pour compétition', 1200.00, 'velo_route.jpg', 3, 6, 4),

('Canapé d''angle', 'Canapé d''angle en tissu gris, très confortable, 3 places + méridienne, comme neuf', 450.00, 'canape_angle.jpg', 1, 4, 4),

('PlayStation 5', 'Console PS5 édition standard avec manette, câbles et boîte d''origine, peu utilisée', 499.99, 'ps5.jpg', 2, 5, 4),

('Montre connectée Samsung', 'Samsung Galaxy Watch 4 Classic, 46mm, noir, avec chargeur et bracelet supplémentaire', 199.00, 'galaxy_watch4.jpg', 3, 6, 4),

('Table à manger rustique', 'Table à manger en bois massif, 6 places, style industriel, fabrication artisanale', 350.00, 'table_manger.jpg', 1, 4, 4),

('Appareil photo Canon', 'Canon EOS 80D avec objectif 18-135mm, sac et carte mémoire inclus, excellent état', 650.00, 'canon_eos80d.jpg', 2, 5, 4),

('Trottinette électrique', 'Trottinette électrique Xiaomi Mi Pro 2, autonomie 45km, peu utilisée, chargeur inclus', 399.00, 'xiaomi_pro2.jpg', 3, 6, 4),

('Bureau gaming', 'Bureau gaming ajustable en hauteur, RGB, support casque et repose-poignets inclus', 229.00, 'bureau_gaming.jpg', 1, 4, 4);