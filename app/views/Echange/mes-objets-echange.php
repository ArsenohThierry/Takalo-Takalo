<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposer un échange | Takalo-Takalo</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/echange.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color/96/000000/swap.png">
</head>
<body>
    <div class="container">
        <?php include __DIR__ . '/../Partials/header.php'; ?>

        <!-- Contenu principal - Page d'échange -->
        <main class="main-content exchange-page">
            <div class="exchange-container">
                <!-- Navigation secondaire -->
                <nav class="breadcrumb">
                    <a href="accueil.html">Accueil</a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="ficheObjet.html">Roman policier vintage</a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Proposer un échange</span>
                </nav>

                <!-- Titre de la page -->
                <div class="page-header-section">
                    <h1 class="page-title">
                        <i class="fas fa-exchange-alt"></i>
                        Proposer un échange
                    </h1>
                    <p class="page-subtitle">Sélectionnez un de vos objets à échanger contre l'objet désiré</p>
                </div>

                <!-- Section: Objet à recevoir -->
                <div class="exchange-target-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-gift"></i>
                            Objet que vous souhaitez obtenir
                        </h2>
                        <div class="section-badge">
                            <i class="fas fa-star"></i>
                            En échange
                        </div>
                    </div>
                    
                    <div class="target-object-card">
                        <div class="target-object-image">
                            <img src="<?= BASE_URL ?>assets/images/<?= $object['image'] ?>" 
                                 alt="<?= $object['nom'] ?>">
                            <div class="object-category-tag">Livre</div>
                        </div>
                        
                        <div class="target-object-info">
                            <h3 class="target-object-title"><?= $object['nom'] ?></h3>
                            <div class="target-object-meta">
                                <div class="target-object-owner">
                                    <i class="fas fa-user"></i>
                                    <span>Propriétaire : <strong>Marie L.</strong></span>
                                </div>
                                <div class="target-object-status">
                                    <i class="fas fa-circle"></i>
                                    <span class="status-available">Disponible</span>
                                </div>
                            </div>
                            <div class="target-object-description">
                                <p><?= $object['description'] ?></p>
                            </div>
                            <div class="target-object-rating">
                                <div class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="rating-text">4.5 (12 avis)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Vos objets disponibles -->
                <div class="user-objects-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-boxes"></i>
                            Sélectionnez l'objet que vous proposez
                        </h2>
                        <div class="objects-count">
                            <span class="count-number"><?= isset($myobjects) ? count($myobjects) : 0 ?></span> objets disponibles
                        </div>
                    </div>
                    
                    <div class="selection-instruction">
                        <div class="instruction-card">
                            <i class="fas fa-mouse-pointer"></i>
                            <div class="instruction-content">
                                <h3>Comment procéder ?</h3>
                                <p>Cliquez sur l'objet que vous souhaitez échanger. Vous pourrez ensuite finaliser votre proposition d'échange.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="user-objects-grid" id="userObjectsGrid">
                        <!-- Les objets de l'utilisateur seront générés ici par JavaScript -->
                    </div>
                    
                    <div class="no-objects-message" id="noObjectsMessage" style="<?php echo (isset($myobjects) && count($myobjects) > 0) ? 'display: none;' : 'display: block;'; ?>">
                        <div class="empty-state">
                            <i class="fas fa-box-open"></i>
                            <h3>Aucun objet disponible pour échange</h3>
                            <p>Vous n'avez actuellement aucun objet que vous pouvez proposer en échange.</p>
                            <a href="mes-objets.html" class="empty-state-btn">
                                <i class="fas fa-plus"></i>
                                Ajouter un objet
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Section: Résumé de l'échange -->
                <div class="exchange-summary-section" id="exchangeSummary" style="display: none;">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-handshake"></i>
                            Récapitulatif de l'échange
                        </h2>
                        <div class="exchange-icon">
                            <i class="fas fa-exchange-alt fa-rotate-90"></i>
                        </div>
                    </div>
                    
                    <div class="exchange-flow">
                        <div class="exchange-item exchange-give">
                            <div class="exchange-item-label">
                                <i class="fas fa-arrow-up"></i>
                                <span>Vous proposez</span>
                            </div>
                            <div class="exchange-item-card selected">
                                <img src="" alt="Objet sélectionné" id="selectedObjectImage">
                                <div class="exchange-item-info">
                                    <h4 id="selectedObjectTitle">Titre de l'objet</h4>
                                    <p class="exchange-item-category" id="selectedObjectCategory">Catégorie</p>
                                    <div class="exchange-item-status">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Sélectionné</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="exchange-icon-large">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        
                        <div class="exchange-item exchange-receive">
                            <div class="exchange-item-label">
                                <i class="fas fa-arrow-down"></i>
                                <span>Vous recevez</span>
                            </div>
                            <div class="exchange-item-card">
                                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=150&q=80" 
                                     alt="Roman policier vintage">
                                <div class="exchange-item-info">
                                    <h4>Roman policier vintage</h4>
                                    <p class="exchange-item-category">Livre</p>
                                    <div class="exchange-item-status">
                                        <i class="fas fa-gift"></i>
                                        <span>À recevoir</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="exchange-actions">
                        <button class="secondary-btn" id="changeSelectionBtn">
                            <i class="fas fa-undo"></i>
                            Changer de sélection
                        </button>
                        <button class="atakalo-btn-large" id="confirmExchangeBtn">
                            <i class="fas fa-paper-plane"></i>
                            Confirmer la proposition d'échange
                        </button>
                    </div>
                    
                    <div class="exchange-tips">
                        <h3>
                            <i class="fas fa-lightbulb"></i>
                            Conseils pour un échange réussi
                        </h3>
                        <ul>
                            <li>Assurez-vous que votre objet est en bon état et correspond à la description</li>
                            <li>Vérifiez que l'objet que vous proposez a une valeur similaire à celui que vous souhaitez obtenir</li>
                            <li>Une fois la proposition envoyée, vous pourrez discuter des détails avec le propriétaire</li>
                            <li>Vous pouvez annuler votre proposition tant qu'elle n'a pas été acceptée</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>

        <?php include __DIR__ . '/../Partials/footer.php'; ?>
    </div>

    <!-- Script pour la page d'échange -->
    <script>
        // Données des objets de l'utilisateur (générées côté serveur)
        const userObjects = <?php
            $jsObjects = [];
            if (isset($myobjects) && is_array($myobjects)) {
                foreach ($myobjects as $o) {
                    $jsObjects[] = [
                        'id' => $o['id'],
                        'title' => $o['nom'] ?? '',
                        'category' => $o['id_categorie'] ?? '',
                        'image' => (defined('BASE_URL') ? BASE_URL : '') . 'assets/images/' . ($o['image'] ?? ''),
                        'description' => $o['description'] ?? '',
                        'condition' => '',
                        'value' => ''
                    ];
                }
            }
            echo json_encode($jsObjects, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        ?>;

        // État de l'application
        let selectedObject = null;
        
        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            initExchangePage();
        });
        
        function initExchangePage() {
            renderUserObjects();
            setupEventListeners();
            
            // Afficher ou masquer le message "aucun objet"
            const noObjectsMessage = document.getElementById('noObjectsMessage');
            if (userObjects.length === 0) {
                noObjectsMessage.style.display = 'block';
            } else {
                noObjectsMessage.style.display = 'none';
            }
        }
        
        // Rendu des objets de l'utilisateur
        function renderUserObjects() {
            const grid = document.getElementById('userObjectsGrid');
            if (!grid) return;
            
            grid.innerHTML = '';
            
            userObjects.forEach(obj => {
                const objectCard = createUserObjectCard(obj);
                grid.appendChild(objectCard);
            });
        }
        
        // Création d'une carte d'objet utilisateur
        function createUserObjectCard(obj) {
            const card = document.createElement('div');
            card.className = 'user-object-card';
            card.setAttribute('data-id', obj.id);
            
            // Déterminer la couleur de la valeur
            let valueColor = '';
            let valueIcon = '';
            switch(obj.value) {
                case 'Élevée':
                    valueColor = 'value-high';
                    valueIcon = 'fa-arrow-up';
                    break;
                case 'Moyenne':
                    valueColor = 'value-medium';
                    valueIcon = 'fa-equals';
                    break;
                case 'Faible':
                    valueColor = 'value-low';
                    valueIcon = 'fa-arrow-down';
                    break;
            }
            
            card.innerHTML = `
                <div class="user-object-image">
                    <img src="${obj.image}" alt="${obj.title}">
                    <div class="object-category-tag">${obj.category}</div>
                </div>
                <div class="user-object-info">
                    <h3 class="user-object-title">${obj.title}</h3>
                    <p class="user-object-description">${obj.description}</p>
                    <div class="user-object-meta">
                        <div class="user-object-condition">
                            <i class="fas fa-clipboard-check"></i>
                            <span>${obj.condition}</span>
                        </div>
                        <div class="user-object-value ${valueColor}">
                            <i class="fas ${valueIcon}"></i>
                            <span>Valeur ${obj.value.toLowerCase()}</span>
                        </div>
                    </div>
                </div>
                <div class="selection-indicator">
                    <i class="far fa-circle"></i>
                </div>
            `;
            
            return card;
        }
        
        // Configuration des écouteurs d'événements
        function setupEventListeners() {
            // Sélection d'un objet
            document.addEventListener('click', function(e) {
                const objectCard = e.target.closest('.user-object-card');
                if (objectCard && !objectCard.classList.contains('selected')) {
                    selectObject(objectCard);
                }
            });
            
            // Bouton changer de sélection
            const changeSelectionBtn = document.getElementById('changeSelectionBtn');
            if (changeSelectionBtn) {
                changeSelectionBtn.addEventListener('click', function() {
                    clearSelection();
                    const summarySection = document.getElementById('exchangeSummary');
                    summarySection.style.display = 'none';
                });
            }
            
            // Bouton confirmer l'échange
            const confirmExchangeBtn = document.getElementById('confirmExchangeBtn');
            if (confirmExchangeBtn) {
                confirmExchangeBtn.addEventListener('click', function() {
                    if (!selectedObject) return;
                    
                    // Simulation d'envoi
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        alert(`Proposition d'échange envoyée avec succès !\n\nVous proposez : ${selectedObject.title}\nVous recevez : Roman policier vintage\n\nMarie L. a été notifiée et pourra accepter ou refuser votre proposition.`);
                        
                        // Réinitialiser
                        this.innerHTML = '<i class="fas fa-paper-plane"></i> Confirmer la proposition d\'échange';
                        this.disabled = false;
                        clearSelection();
                        
                        const summarySection = document.getElementById('exchangeSummary');
                        summarySection.style.display = 'none';
                        
                        // Retour à la fiche objet (simulation)
                        setTimeout(() => {
                            window.location.href = 'ficheObjet.html';
                        }, 2000);
                    }, 1500);
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
        
        // Sélection d'un objet
        function selectObject(objectCard) {
            // Désélectionner l'objet précédent
            clearSelection();
            
            // Mettre à jour l'état
            selectedObject = userObjects.find(obj => obj.id == objectCard.getAttribute('data-id'));
            
            // Mettre en surbrillance la carte sélectionnée
            objectCard.classList.add('selected');
            
            // Mettre à jour l'indicateur de sélection
            const indicator = objectCard.querySelector('.selection-indicator i');
            indicator.classList.remove('far', 'fa-circle');
            indicator.classList.add('fas', 'fa-check-circle');
            
            // Mettre à jour le récapitulatif
            updateExchangeSummary(selectedObject);
            
            // Afficher la section récapitulative
            const summarySection = document.getElementById('exchangeSummary');
            summarySection.style.display = 'block';
            
            // Faire défiler jusqu'au récapitulatif (en douceur)
            summarySection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
        
        // Effacer la sélection
        function clearSelection() {
            // Désélectionner toutes les cartes
            const selectedCards = document.querySelectorAll('.user-object-card.selected');
            selectedCards.forEach(card => {
                card.classList.remove('selected');
                const indicator = card.querySelector('.selection-indicator i');
                indicator.classList.remove('fas', 'fa-check-circle');
                indicator.classList.add('far', 'fa-circle');
            });
            
            selectedObject = null;
        }
        
        // Mettre à jour le récapitulatif
        function updateExchangeSummary(object) {
            const selectedObjectImage = document.getElementById('selectedObjectImage');
            const selectedObjectTitle = document.getElementById('selectedObjectTitle');
            const selectedObjectCategory = document.getElementById('selectedObjectCategory');
            
            if (selectedObjectImage) selectedObjectImage.src = object.image;
            if (selectedObjectTitle) selectedObjectTitle.textContent = object.title;
            if (selectedObjectCategory) selectedObjectCategory.textContent = object.category;
        }
    </script>
</body>
</html>