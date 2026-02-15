<?php 
ini_set("display_errors",1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Objets | Takalo-Takalo</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/objets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color/96/000000/swap.png">
</head>
<body>
    <div class="container">
        <?php include __DIR__ . '/../Partials/header.php'; ?>

        <!-- Contenu principal -->
        <main class="main-content">
            <div class="mes-objets-container">
                <!-- En-tête utilisateur -->
                <div class="user-header">
                    <div class="user-info">
                        <h1 class="user-welcome">Mes Objets</h1>
                        <p class="user-subtitle">Bonjour <span class="user-name" style="font-size: 150%;color:green"><?= $_SESSION['user']['username'] ?></span>, voici vos objets publiés</p>
                    </div>
                    <div class="user-stats">
                        <div class="stat-item">
                            <div class="stat-number"><?= $nbObjets ?></div>
                            <div class="stat-label">Objets</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">3</div>
                            <div class="stat-label">En échange</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">12</div>
                            <div class="stat-label">Échanges faits</div>
                        </div>
                    </div>
                </div>

                <!-- Grille d'objets -->
                <div class="mes-objets-grid">
                    <!-- Objet 1 -->
                    <?php foreach($objects as $object): ?>
                        <a href="my-objet.html?id=<?= $object['id'] ?>" class="objet-card">
                        <div class="objet-image">
                            <img src="<?= BASE_URL ?>assets/images/<?= $object['image'] ?>"
                                 alt="<?= $object['nom'] ?>">
                            <div class="objet-status disponible">
                                <i class="fas fa-check-circle"></i>
                                Disponible
                            </div>
                        </div>
                        <div class="objet-content">
                            <h3 class="objet-title"><?= $object['nom'] ?></h3>
                            <p class="objet-description"><?= $object['description'] ?></p>
                            <div class="objet-meta">
                                <span class="objet-category">
                                    <i class="fas fa-book"></i>
                                    Livre
                                </span>
                                <span class="objet-date">
                                    <i class="far fa-calendar"></i>
                                    15 mars 2023
                                </span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>

        <?php include __DIR__ . '/../Partials/footer.php'; ?>
    </div>

    <!-- Script simple pour le menu mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</body>
</html>