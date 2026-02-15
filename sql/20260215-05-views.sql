CREATE VIEW v_produit_takalo AS
SELECT 
    p.id,
    p.nom,
    p.description,
    p.prix,
    p.image,
    p.id_categorie,
    c.nom AS categorie_nom,
    p.id_proprietaire,
    u.nom AS proprietaire_nom,
    u.email AS proprietaire_email,
    p.id_statut,
    s.statut AS statut_nom
FROM 
    produit_takalo p
LEFT JOIN 
    categorie c ON p.id_categorie = c.id
LEFT JOIN 
    user_takalo u ON p.id_proprietaire = u.id
LEFT JOIN 
    statut_takalo s ON p.id_statut = s.id;