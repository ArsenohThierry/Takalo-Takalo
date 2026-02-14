<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takalo-Takalo | Connexion & Inscription</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;500;600&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color/96/000000/swap.png">
</head>
<body>
    <div class="container">
        <header class="main-header">
            <div class="logo-container">
                <div class="logo-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <h1 class="logo-text">Takalo-<span>Takalo</span></h1>
            </div>
            <p class="tagline">Échangez, partagez, découvrez</p>
        </header>

        <main class="main-content">
            <div class="welcome-section">
                <h2>Bienvenue sur Takalo-Takalo</h2>
                <p>La plateforme d'échange qui redonne vie aux objets. Rejoignez notre communauté et commencez à échanger dès aujourd'hui.</p>
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-recycle"></i>
                        <span>Échange responsable</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-users"></i>
                        <span>Communauté bienveillante</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-gem"></i>
                        <span>Objets uniques</span>
                    </div>
                </div>
            </div>

            <div class="form-container">
                <div class="form-tabs">
                    <button class="tab-btn active" data-tab="login">Connexion</button>
                    <button class="tab-btn" data-tab="signup">Inscription</button>
                </div>

                <!-- Formulaire de connexion -->
                <form id="login-form" class="form active" method="post" action="login">
                    <h3>Connexion à votre compte</h3>
                    <div class="form-group">
                        <label for="login-email">Email ou nom d'utilisateur</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" name="email" id="login-email" placeholder="exemple@email.com ou monpseudo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Mot de passe</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="login-password" placeholder="Votre mot de passe" required>
                            <button type="button" class="toggle-password" aria-label="Afficher/masquer le mot de passe">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="form-options">
                            <label class="checkbox-label">
                                <input type="checkbox"> Se souvenir de moi
                            </label>
                            <a href="#" class="forgot-password">Mot de passe oublié ?</a>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">Se connecter</button>
                    <div class="divider">
                        <span>ou continuer avec</span>
                    </div>
                    <div class="social-login">
                        <button type="button" class="social-btn google">
                            <i class="fab fa-google"></i> Google
                        </button>
                        <button type="button" class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                    </div>
                </form>

                <!-- Formulaire d'inscription -->
                <form id="signup-form" class="form" method="post" action="inscription">
                    <h3>Créer un nouveau compte</h3>
                    <div class="form-group">
                        <label for="signup-name">Nom complet</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user-circle"></i>
                            <input type="text" name="nom" id="signup-name" placeholder="Votre nom et prénom" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signup-email">Adresse email</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" id="signup-email" placeholder="exemple@email.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Mot de passe</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="signup-password" placeholder="Créez un mot de passe sécurisé" required>
                            <button type="button" class="toggle-password" aria-label="Afficher/masquer le mot de passe">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-strength">
                            <div class="strength-bar"></div>
                            <span class="strength-text">Force du mot de passe : Faible</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signup-confirm">Confirmation du mot de passe</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirm_password" id="signup-confirm" placeholder="Répétez votre mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group terms-group">
                        <label class="checkbox-label">
                            <input type="checkbox" required>
                            J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>
                        </label>
                    </div>
                    <button type="submit" class="submit-btn">Créer mon compte</button>
                </form>
            </div>
        </main>

        <footer class="main-footer">
            <p>© 2023 Takalo-Takalo - Plateforme d'échange d'objets. Tous droits réservés.</p>
            <div class="footer-links">
                <a href="#">À propos</a>
                <a href="#">Comment ça marche ?</a>
                <a href="#">Contact</a>
                <a href="#">Confidentialité</a>
            </div>
        </footer>
    </div>

    <script>
        // Gestion des onglets de formulaire
        const tabBtns = document.querySelectorAll('.tab-btn');
        const forms = document.querySelectorAll('.form');
        
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetTab = btn.getAttribute('data-tab');
                
                // Mettre à jour les onglets actifs
                tabBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                // Afficher le formulaire correspondant
                forms.forEach(form => {
                    form.classList.remove('active');
                    if (form.id === `${targetTab}-form`) {
                        form.classList.add('active');
                    }
                });
            });
        });

        // Gestion de l'affichage/masquage des mots de passe
        const togglePasswordBtns = document.querySelectorAll('.toggle-password');
        togglePasswordBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Simulation de la validation de mot de passe
        const passwordInput = document.getElementById('signup-password');
        const strengthBar = document.querySelector('.strength-bar');
        const strengthText = document.querySelector('.strength-text');
        
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                if (password.length >= 8) strength += 1;
                if (/[A-Z]/.test(password)) strength += 1;
                if (/[0-9]/.test(password)) strength += 1;
                if (/[^A-Za-z0-9]/.test(password)) strength += 1;
                
                // Mettre à jour la barre et le texte
                const width = strength * 25;
                strengthBar.style.width = `${width}%`;
                
                if (strength === 0) {
                    strengthBar.style.backgroundColor = '#FF6B6B';
                    strengthText.textContent = 'Force du mot de passe : Faible';
                } else if (strength <= 2) {
                    strengthBar.style.backgroundColor = '#FFD166';
                    strengthText.textContent = 'Force du mot de passe : Moyenne';
                } else if (strength === 3) {
                    strengthBar.style.backgroundColor = '#A4BD01';
                    strengthText.textContent = 'Force du mot de passe : Bonne';
                } else {
                    strengthBar.style.backgroundColor = '#679436';
                    strengthText.textContent = 'Force du mot de passe : Excellente';
                }
            });
        }

        // Gestion de la soumission des formulaires
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        
        loginForm.addEventListener('submit', function(e) {
            
        });
        
        signupForm.addEventListener('submit', function(e) {
            const password = document.getElementById('signup-password').value;
            const confirmPassword = document.getElementById('signup-confirm').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Les mots de passe ne correspondent pas.');
                return;
            }
            // Si validation OK, le formulaire se soumet normalement vers /inscription
        });
    </script>
</body>
</html>