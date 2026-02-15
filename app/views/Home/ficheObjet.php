<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roman policier vintage | Takalo-Takalo</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/fiche.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color/96/000000/swap.png">
</head>
<body>
    <div class="container">
        <?php include __DIR__ . '/../Partials/header.php'; ?>

        <!-- Contenu principal - Fiche objet -->
        <main class="main-content">

            <div class="object-detail-container">
                <!-- Navigation secondaire -->
                <nav class="breadcrumb">
                    <a href="<?= BASE_URL ?>accueil">Accueil</a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="#">Livres</a>
                    <i class="fas fa-chevron-right"></i>
                    <span><?= $object['nom'] ?></span>
                </nav>

                <div class="object-detail-grid">
                    <!-- Section images -->
                    <div class="object-images-section">
                        <div class="main-image-container">
                            <img src="<?= BASE_URL ?>assets/images/<?= $object['image'] ?>" 
                                 alt="Roman policier vintage - vue principale" 
                                 class="main-object-image" 
                                 id="mainImage">
                            <div class="image-badge">
                                <i class="fas fa-star"></i>
                                <span>En vedette</span>
                            </div>
                        </div>
                        
                        <div class="image-thumbnails">
                            <div class="thumbnail active" data-image="<?= BASE_URL ?>assets/images/fiche-objet/thumbnail1.jpg">
                                <img src="<?= BASE_URL ?>assets/images/fiche-objet/thumbnail1.jpg" alt="Couverture avant">
                            </div>
                            <div class="thumbnail" data-image="<?= BASE_URL ?>assets/images/fiche-objet/thumbnail2.jpg">
                                <img src="<?= BASE_URL ?>assets/images/fiche-objet/thumbnail2.jpg" alt="Page intérieure">
                            </div>
                            <div class="thumbnail" data-image="<?= BASE_URL ?>assets/images/fiche-objet/thumbnail3.jpg">
                                <img src="<?= BASE_URL ?>assets/images/fiche-objet/thumbnail3.jpg" alt="Dos du livre">
                            </div>
                            <div class="thumbnail" data-image="<?= BASE_URL ?>assets/images/fiche-objet/thumbnail4.jpg">
                                <img src="<?= BASE_URL ?>assets/images/fiche-objet/thumbnail4.jpg" alt="Étagère avec le livre">
                            </div>
                        </div>
                        
                        <div class="image-actions">
                            <button class="image-action-btn" aria-label="Voir en plein écran">
                                <i class="fas fa-expand"></i>
                                <span>Plein écran</span>
                            </button>
                            <button class="image-action-btn" aria-label="Partager l'image">
                                <i class="fas fa-share-alt"></i>
                                <span>Partager</span>
                            </button>
                        </div>
                    </div>

                    <!-- Section informations -->
                    <div class="object-info-section">
                        <div class="object-header">
                            <div class="object-category-badge">
                                <i class="fas fa-book"></i>
                                <span>Livre</span>
                            </div>
                            <h1 class="object-title"><?= $object['nom'] ?></h1>
                            <div class="object-rating">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="rating-text">4.5 (12 avis)</span>
                            </div>
                        </div>

                        <!-- Informations du propriétaire -->
                        <div class="owner-info-card">
                            <div class="owner-header">
                                <div class="owner-avatar">
                                    <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($object['proprietaire_image'] ?? 'default-avatar.jpg') ?>" 
                                         alt="Photo de <?= htmlspecialchars($object['proprietaire_nom'] ?? 'Propriétaire') ?>" 
                                         class="avatar-image">
                                    <div class="owner-status"></div>
                                </div>
                                <div class="owner-details">
                                    <h3 class="owner-name"><?= htmlspecialchars($object['proprietaire_nom'] ?? 'Propriétaire inconnu') ?></h3>
                                    <p class="owner-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Paris 5ème</span>
                                    </p>
                                    
                                </div>
                            </div>
                            
                            <button class="owner-contact-btn">
                                <i class="fas fa-comment-dots"></i>
                                <span>Voir le profil</span>
                            </button>
                        </div>

                        <!-- Description de l'objet -->
                        <div class="object-description-card">
                            <h2 class="section-subtitle">
                                <i class="fas fa-align-left"></i>
                                Description détaillée
                            </h2>
                            <div class="description-content">
                                <p><?= htmlspecialchars($object['description'] ?? 'Aucune description disponible pour cet objet.') ?></p>
                            </div>
                        </div>

                        

                    <!-- Section action -->
                    <div class="object-action-section w-100">
                        <div class="action-card">
                            <div class="action-header">
                                <h2 class="section-subtitle">
                                    <i class="fas fa-exchange-alt"></i>
                                    Proposer un échange
                                </h2>
                                <div class="object-status available">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Disponible</span>
                                </div>
                            </div>
                            
                            <div class="exchange-info">
                                <div class="info-item">
                                    <i class="fas fa-history"></i>
                                    <div>
                                        <strong>Publié le:</strong>
                                        <span>15 mars 2023</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-eye"></i>
                                    <div>
                                        <strong>Vues:</strong>
                                        <span>247</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-heart"></i>
                                    <div>
                                        <strong>Favoris:</strong>
                                        <span>18</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="action-buttons">
                                <!-- Bouton principal Atakalo -->
                                <a href="<?= BASE_URL ?>proposer-echange/<?= $object['id'] ?>" style="text-decoration:none">
                                    <button class="atakalo-btn" id="exchangeBtn">
                                    <i class="fas fa-exchange-alt"></i>
                                    <span>Atakalo</span>
                                    <small>Proposer un échange</small>
                                </button>
                                </a>
                                
                                <button class="secondary-btn" id="favoriteBtn">
                                    <i class="far fa-heart"></i>
                                    <span>Ajouter aux favoris</span>
                                </button>
                                
                                <button class="secondary-btn" id="shareBtn">
                                    <i class="fas fa-share-alt"></i>
                                    <span>Partager</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include __DIR__ . '/../Partials/footer.php'; ?>
    </div>

    <!-- Script pour les interactions de la fiche objet -->
    <script>
        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            setupObjectPage();
        });
        
        function setupObjectPage() {
            // Gestion des miniatures d'images
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('mainImage');
            
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    // Retirer la classe active de toutes les miniatures
                    thumbnails.forEach(t => t.classList.remove('active'));
                    
                    // Ajouter la classe active à la miniature cliquée
                    this.classList.add('active');
                    
                    // Changer l'image principale
                    const newImageSrc = this.getAttribute('data-image');
                    mainImage.src = newImageSrc;
                    mainImage.alt = this.querySelector('img').alt;
                    
                    // Effet de transition
                    mainImage.style.opacity = '0.5';
                    setTimeout(() => {
                        mainImage.style.opacity = '1';
                    }, 200);
                });
            });
            
            // Bouton plein écran
            const fullscreenBtn = document.querySelector('.image-action-btn:nth-child(1)');
            if (fullscreenBtn) {
                fullscreenBtn.addEventListener('click', function() {
                    alert("Mode plein écran - En production, cela ouvrirait l'image en plein écran");
                });
            }  
            // Bouton favori
            const favoriteBtn = document.getElementById('favoriteBtn');
            if (favoriteBtn) {
                favoriteBtn.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.innerHTML = '<i class="fas fa-heart"></i><span>Retirer des favoris</span>';
                        alert("Objet ajouté à vos favoris !");
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.innerHTML = '<i class="far fa-heart"></i><span>Ajouter aux favoris</span>';
                        alert("Objet retiré de vos favoris");
                    }
                });
            }
            
            // Bouton partage
            const shareBtn = document.getElementById('shareBtn');
            if (shareBtn) {
                shareBtn.addEventListener('click', function() {
                    alert("Partager cet objet - En production, cela ouvrirait les options de partage");
                });
            }
            
            // Bouton contact propriétaire
            const contactBtn = document.querySelector('.owner-contact-btn');
            if (contactBtn) {
                contactBtn.addEventListener('click', function() {
                    alert("Ouverture de la messagerie avec Marie L. - En production, cela ouvrirait un formulaire de message");
                });
            }
            
            // Menu mobile
            const navbarToggle = document.querySelector('.navbar-toggle');
            if (navbarToggle) {
                navbarToggle.addEventListener('click', function() {
                    const navbarMenu = document.querySelector('.navbar-menu');
                    navbarMenu.classList.toggle('show');
                    this.innerHTML = navbarMenu.classList.contains('show') 
                        ? '<i class="fas fa-times"></i>' 
                        : '<i class="fas fa-bars"></i>';
                });
            }
        }
    </script>
</body>
</html>