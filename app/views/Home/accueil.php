<?php 
ini_set("display_errors",1);
error_reporting(E_ALL);

exec("pwd",$output);
echo $output[0];
// die();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Takalo-Takalo - Plateforme d'échange</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;500;600&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color/96/000000/swap.png">
</head>
<body>
    <div class="container">
        <!-- Header avec navigation -->
        <header class="page-header">
            <nav class="navbar">
                <div class="navbar-brand">
                    <div class="logo-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h1 class="logo-text">Takalo-<span>Takalo</span></h1>
                </div>
                
                <button class="navbar-toggle" aria-label="Menu mobile">
                    <i class="fas fa-bars"></i>
                </button>
                
                <ul class="navbar-menu">
                    <li class="nav-item active">
                        <a href="<?= BASE_URL ?>accueil" class="nav-link">
                            <i class="fas fa-home"></i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASE_URL ?>mes-objets" class="nav-link">
                            <i class="fas fa-box-open"></i>
                            <span>Mes objets</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASE_URL ?>deconnexion" class="nav-link logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Déconnexion</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Contenu principal -->
        <main class="main-content">
            <section class="hero-section">
                <div class="hero-content">
                    <h2 class="hero-title">Découvrez, Échangez, Partagez</h2>
                    <p class="hero-subtitle">La plateforme qui donne une seconde vie à vos objets préférés</p>
                    <div class="hero-search">
                        <div class="search-container">
                            <i class="fas fa-search"></i>
                            <input type="text" class="search-input" placeholder="Rechercher un objet, une catégorie...">
                            <button class="search-btn">Rechercher</button>
                        </div>
                        <div class="search-filters">
                            <select class="filter-select">
                                <option value="">Toutes catégories</option>
                                <option value="livres">Livres</option>
                                <option value="musique">Musique</option>
                                <option value="decoration">Décoration</option>
                                <option value="electronique">Électronique</option>
                                <option value="vetements">Vêtements</option>
                                <option value="autres">Autres</option>
                            </select>
                            <select class="filter-select">
                                <option value="">Toutes localisations</option>
                                <option value="paris">Paris</option>
                                <option value="lyon">Lyon</option>
                                <option value="marseille">Marseille</option>
                                <option value="toulouse">Toulouse</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <section class="categories-section">
                <h2 class="section-title">Catégories populaires</h2>
                <div class="categories-grid">
                    <a href="#" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3>Livres</h3>
                        <p>125 objets disponibles</p>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-tshirt"></i>
                        </div>
                        <h3>Vêtements</h3>
                        <p>89 objets disponibles</p>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-headphones"></i>
                        </div>
                        <h3>Électronique</h3>
                        <p>67 objets disponibles</p>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-couch"></i>
                        </div>
                        <h3>Décoration</h3>
                        <p>112 objets disponibles</p>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <h3>Jeux & Jouets</h3>
                        <p>78 objets disponibles</p>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h3>Cuisine</h3>
                        <p>94 objets disponibles</p>
                    </a>
                </div>
            </section>

            <section class="objects-section">
                <div class="section-header">
                    <h2 class="section-title">Objets récemment ajoutés</h2>
                    <a href="#" class="view-all">Voir tout <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="objects-grid" id="objects-grid">
                    <?php
                    // Les objets doivent être fournis par le contrôleur dans la variable $objects
                    if (!isset($objects) || !is_array($objects)) {
                        $objects = [];
                    }

                    foreach ($objects as $obj): ?>
                        <div class="object-card" data-id="<?= htmlspecialchars($obj['id'] ?? '') ?>">
                            <div class="object-image-container">
                                <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($obj['image'] ?? '') ?>" alt="<?= htmlspecialchars($obj['title'] ?? '') ?>" class="object-image">
                                <div class="object-category"><?= htmlspecialchars($obj['category'] ?? '') ?></div>
                            </div>
                            <div class="object-info">
                                <h3 class="object-title"><?= htmlspecialchars($obj['nom'] ?? '') ?></h3>
                                <p class="object-description"><?= htmlspecialchars($obj['description'] ?? '') ?></p>
                                <div class="object-meta">
                                    <div class="object-owner">
                                        <i class="fas fa-user"></i>
                                        <span><?= htmlspecialchars($obj['owner'] ?? '') ?></span>
                                    </div>
                                    <button class="object-action" aria-label="Proposer un échange">
                                        <i class="fas fa-exchange-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="how-it-works">
                <h2 class="section-title">Comment ça marche ?</h2>
                <div class="steps-container">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3>Photographiez</h3>
                        <p>Prenez une belle photo de l'objet que vous souhaitez échanger</p>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <h3>Décrivez</h3>
                        <p>Ajoutez une description précise et l'état de votre objet</p>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Découvrez</h3>
                        <p>Parcourez les objets proposés par la communauté</p>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <h3>Échangez</h3>
                        <p>Proposez un échange et convenez d'un rendez-vous</p>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="page-footer">
            <div class="footer-content">
                <p class="footer-text">ETU004031 - ETU004273 - ETU004183</p>
                <p class="footer-copyright">© 2023 Takalo-Takalo - Plateforme d'échange d'objets</p>
                <div class="footer-links">
                    <a href="#">Conditions d'utilisation</a>
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">Contact</a>
                    <a href="#">À propos</a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Script pour gérer les interactions (produits rendus côté serveur) -->
    <script>
        // Les produits sont rendus en PHP. Ce script gère uniquement
        // les interactions UI (menu mobile, recherche basique, détails).
        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
        });

        function setupEventListeners() {
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

            // Recherche
            const searchBtn = document.querySelector('.search-btn');
            if (searchBtn) searchBtn.addEventListener('click', performSearch);
            const searchInput = document.querySelector('.search-input');
            if (searchInput) searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Enter') performSearch();
            });

            // Catégories et cartes d'objets
            document.addEventListener('click', function(e) {
                // Clic sur une catégorie
                if (e.target.closest('.category-card')) {
                    e.preventDefault();
                    const categoryCard = e.target.closest('.category-card');
                    const categoryName = categoryCard.querySelector('h3').textContent;
                    alert(`Filtrer par catégorie: ${categoryName}`);
                    return;
                }

                // Action d'échange (bouton)
                if (e.target.closest('.object-action')) {
                    const card = e.target.closest('.object-card');
                    const title = card.querySelector('.object-title')?.textContent || '';
                    const owner = card.querySelector('.object-owner span')?.textContent || '';
                    alert(`Échange proposé pour "${title}" avec ${owner}`);
                    return;
                }

                // Détails sur clic de la carte
                if (e.target.closest('.object-card') && !e.target.closest('.object-action')) {
                    const card = e.target.closest('.object-card');
                    const title = card.querySelector('.object-title')?.textContent || '';
                    const owner = card.querySelector('.object-owner span')?.textContent || '';
                    const category = card.querySelector('.object-category')?.textContent || '';
                    const description = card.querySelector('.object-description')?.textContent || '';
                    alert(`Détails de "${title}"\n\nPropriétaire: ${owner}\nCatégorie: ${category}\nDescription: ${description}`);
                    return;
                }
            });
        }

        function performSearch() {
            const searchInput = document.querySelector('.search-input');
            const categoryFilter = document.querySelectorAll('.filter-select')[0];
            const locationFilter = document.querySelectorAll('.filter-select')[1];

            const searchTerm = searchInput ? searchInput.value.trim() : '';
            const category = categoryFilter ? categoryFilter.value : '';
            const location = locationFilter ? locationFilter.value : '';

            if (!searchTerm && !category && !location) {
                alert('Veuillez entrer un terme de recherche ou sélectionner un filtre');
                return false;
            }

            // En production, rediriger vers le contrôleur avec paramètres
            // Exemple: window.location = `<?= BASE_URL ?>accueil?search=${encodeURIComponent(searchTerm)}&category=${encodeURIComponent(category)}&location=${encodeURIComponent(location)}`;
            alert(`Recherche envoyée au serveur:\nTerme: ${searchTerm || '(aucun)'}\nCatégorie: ${category || 'Toutes'}\nLocalisation: ${location || 'Toutes'}`);
            return false;
        }
    </script>
</body>
</html>