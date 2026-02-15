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
    <style>
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
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
                        <?php if (isset($myobjects) && is_array($myobjects) && count($myobjects) > 0): ?>
                            <?php foreach ($myobjects as $o): ?>
                                <?php $isSelected = isset($selectedMine) && $selectedMine && ((int)$selectedMine['id'] === (int)$o['id']); ?>
                                <a href="<?= BASE_URL ?>proposer-echange/<?= $object['id'] ?>?mine=<?= $o['id'] ?>" class="user-object-card <?= $isSelected ? 'selected' : '' ?>">
                                    <div class="user-object-image">
                                        <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($o['image'] ?? '') ?>" alt="<?= htmlspecialchars($o['nom'] ?? '') ?>">
                                        <div class="object-category-tag"><?= htmlspecialchars($o['id_categorie'] ?? '') ?></div>
                                    </div>
                                    <div class="user-object-info">
                                        <h3 class="user-object-title"><?= htmlspecialchars($o['nom'] ?? '') ?></h3>
                                        <p class="user-object-description"><?= htmlspecialchars($o['description'] ?? '') ?></p>
                                    </div>
                                    <div class="selection-indicator">
                                        <i class="<?= $isSelected ? 'fas fa-check-circle' : 'far fa-circle' ?>"></i>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
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
                <?php $showSummary = (isset($selectedMine) && $selectedMine) ? 'block' : 'none'; ?>
                <div class="exchange-summary-section" id="exchangeSummary" style="display: <?= $showSummary ?>;">
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
                                <?php if (isset($selectedMine) && $selectedMine): ?>
                                    <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($selectedMine['image'] ?? '') ?>" alt="<?= htmlspecialchars($selectedMine['nom'] ?? '') ?>">
                                    <div class="exchange-item-info">
                                        <h4><?= htmlspecialchars($selectedMine['nom'] ?? 'Objet') ?></h4>
                                        <p class="exchange-item-category"><?= htmlspecialchars($selectedMine['id_categorie'] ?? '') ?></p>
                                        <div class="exchange-item-status">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Sélectionné</span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <img src="" alt="Objet sélectionné">
                                    <div class="exchange-item-info">
                                        <h4>Aucun objet sélectionné</h4>
                                        <p class="exchange-item-category">-</p>
                                    </div>
                                <?php endif; ?>
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
                                <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($object['image'] ?? '') ?>" 
                                     alt="<?= htmlspecialchars($object['nom'] ?? 'Objet') ?>">
                                <div class="exchange-item-info">
                                    <h4><?= htmlspecialchars($object['nom'] ?? 'Objet') ?></h4>
                                    <p class="exchange-item-category"><?= htmlspecialchars($object['categorie_nom'] ?? 'Catégorie inconnue') ?></p>
                                    <div class="exchange-item-status">
                                        <i class="fas fa-gift"></i>
                                        <span>À recevoir</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="exchange-actions">
                        <a class="secondary-btn" id="changeSelectionBtn" href="<?= BASE_URL ?>proposer-echange/<?= $object['id'] ?>">
                            <i class="fas fa-undo"></i>
                            Changer de sélection
                        </a>
                        <form method="post" action="<?= BASE_URL ?>proposer-echange/submit" style="display:inline-block;">
                            <input type="hidden" name="target_id" value="<?= htmlspecialchars($object['id']) ?>">
                            <input type="hidden" name="mine_id" value="<?= isset($selectedMine) ? htmlspecialchars($selectedMine['id']) : '' ?>">
                            <button type="submit" class="atakalo-btn-large" <?= isset($selectedMine) ? '' : 'disabled' ?>>
                                <i class="fas fa-paper-plane"></i>
                                Confirmer la proposition d'échange
                            </button>
                        </form>
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
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggle = document.querySelector('.navbar-toggle');
            if (navbarToggle) {
                navbarToggle.addEventListener('click', function() {
                    const navbarMenu = document.querySelector('.navbar-menu');
                    navbarMenu.classList.toggle('show');
                    this.innerHTML = navbarMenu.classList.contains('show') ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
                });
            }
        });
    </script>
</body>
</html>