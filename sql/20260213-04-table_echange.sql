CREATE TABLE echange(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT,
    id_produit INT,
    id_statut INT,
    date_echange timestamp NOT NULL,
    FOREIGN KEY (id_produit) REFERENCES produit_takalo(id),
    FOREIGN KEY (id_statut) REFERENCES statut_takalo(id)
);

CREATE table appartenance(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_produit INT,
    id_proprietaire INT,
    derniere_date_appartenance timestamp NOT NULL,

    FOREIGN KEY (id_produit) REFERENCES produit_takalo(id),
    FOREIGN KEY (id_proprietaire) REFERENCES user_takalo(id)
);

SELECT * FROM produit_takalo as p join categorie;