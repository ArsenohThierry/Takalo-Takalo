<?php
// Shared header partial
?>
<header class="page-header">
    <nav class="navbar">
        <a href="<?= BASE_URL ?>accueil" class="navbar-brand">
            <div class="logo-icon">
                <i class="fas fa-exchange-alt"></i>
            </div>
            <h1 class="logo-text">Takalo-<span>Takalo</span></h1>
        </a>

        <button class="navbar-toggle" aria-label="Menu mobile">
            <i class="fas fa-bars"></i>
        </button>

        <ul class="navbar-menu">
            <li class="nav-item">
                <a href="<?= BASE_URL ?>home" class="nav-link">
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
