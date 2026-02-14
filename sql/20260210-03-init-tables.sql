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


INSERT into produit_takalo (nom,description,prix,image,id_categorie,id_proprietaire,id_statut) VALUES
('Main','Fait mal mais fait aussi du bien',69000,'jsp.jpg',1,1,4);

INSERT into produit_takalo (nom,description,prix,image,id_categorie,id_proprietaire,id_statut) VALUES
('Main','Fikokorana Lamosina',5000,'main.jpg',3,3,4);

insert into produit_takalo (nom,description,prix,image,id_categorie,id_proprietaire,id_statut) VALUES
('Vibrateur','Si vous avez déja révé de vibrer',67000,'jsp.jpg',1,2,4);