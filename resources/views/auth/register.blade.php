<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CultureBénin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #e17000;
            --primary-dark: #c15800;
            --secondary: #008753;
            --accent: #f4c430;
            --text: #2d2d2d;
            --text-light: #5a5a5a;
            --background: #fef9f3;
            --white: #ffffff;
            --border: #e8d7c2;
            --error: #d63031;
            --success: #00b894;
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23e17000" opacity="0.05" d="M28.2,43.8c-1.7-1.7-1.7-4.5,0-6.2l8.7-8.7c1.7-1.7,4.5-1.7,6.2,0l8.7,8.7c1.7,1.7,1.7,4.5,0,6.2l-8.7,8.7c-1.7,1.7-4.5,1.7-6.2,0L28.2,43.8z"/></svg>');
        }

        .register-container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            background-color: var(--white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
            position: relative;
        }

        .register-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .register-left::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23ffffff" opacity="0.1" d="M28.2,43.8c-1.7-1.7-1.7-4.5,0-6.2l8.7-8.7c1.7-1.7,4.5-1.7,6.2,0l8.7,8.7c1.7,1.7,1.7,4.5,0,6.2l-8.7,8.7c-1.7,1.7-4.5,1.7-6.2,0L28.2,43.8z"/></svg>');
            background-size: 150px;
        }

        .register-right {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: var(--white);
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .logo-icon {
            margin-right: 12px;
            font-size: 32px;
        }

        .image-content {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cultural-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .cultural-pattern {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 150px;
            height: 150px;
            opacity: 0.2;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="%23ffffff" d="M50,15c19.3,0,35,15.7,35,35s-15.7,35-35,35S15,69.3,15,50S30.7,15,50,15 M50,10C27.9,10,10,27.9,10,50s17.9,40,40,40s40-17.9,40-40S72.1,10,50,10L50,10z"/><circle fill="%23ffffff" cx="50" cy="50" r="15"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            z-index: 1;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .form-title-icon {
            color: var(--primary);
            margin-right: 10px;
        }

        .form-subtitle {
            color: var(--text-light);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text);
        }

        .input-container {
            position: relative;
        }

        input, select {
            width: 100%;
            padding: 14px 16px 14px 45px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.2s;
            background-color: #fcf9f5;
        }
        
        select {
            padding: 14px 16px 14px 45px;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(225, 112, 0, 0.1);
            background-color: var(--white);
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
        }

        .error-message {
            color: var(--error);
            font-size: 14px;
            margin-top: 5px;
            display: flex;
            align-items: center;
        }

        .error-icon {
            margin-right: 5px;
            font-size: 14px;
        }

        .password-strength {
            margin-top: 8px;
            height: 4px;
            background-color: var(--border);
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak {
            background-color: var(--error);
            width: 33%;
        }

        .strength-medium {
            background-color: var(--accent);
            width: 66%;
        }

        .strength-strong {
            background-color: var(--success);
            width: 100%;
        }

        .strength-text {
            font-size: 12px;
            margin-top: 4px;
            color: var(--text-light);
        }

        .terms {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .terms input {
            width: auto;
            margin-right: 10px;
            margin-top: 4px;
        }

        .terms label {
            font-size: 14px;
            line-height: 1.4;
        }

        .terms a {
            color: var(--primary);
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .submit-btn {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: 8px;
            padding: 16px 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(225, 112, 0, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(225, 112, 0, 0.4);
        }

        .submit-icon {
            margin-left: 8px;
            transition: transform 0.3s;
        }

        .submit-btn:hover .submit-icon {
            transform: translateX(4px);
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: var(--text-light);
        }

        .divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: var(--border);
            z-index: 1;
        }

        .divider span {
            background-color: var(--white);
            padding: 0 15px;
            position: relative;
            z-index: 2;
        }

        .social-login {
            display: flex;
            gap: 15px;
        }

        .social-btn {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background-color: var(--white);
            cursor: pointer;
            transition: all 0.2s;
        }

        .social-btn:hover {
            background-color: #fcf9f5;
            transform: translateY(-2px);
        }

        .social-icon {
            margin-right: 8px;
            font-size: 18px;
        }

        .auth-links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .auth-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }

        .auth-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .auth-link i {
            margin-right: 8px;
        }

        .status-message {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .status-success {
            background-color: rgba(0, 184, 148, 0.1);
            color: var(--success);
            border: 1px solid rgba(0, 184, 148, 0.2);
        }

        .status-error {
            background-color: rgba(214, 48, 49, 0.1);
            color: var(--error);
            border: 1px solid rgba(214, 48, 49, 0.2);
        }

        .status-icon {
            margin-right: 8px;
        }

        .file-input-info {
            font-size: 12px;
            color: var(--text-light);
            margin-top: 5px;
            display: block;
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }
            
            .register-left {
                padding: 0;
                height: 250px;
            }
            
            .register-right {
                padding: 30px;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .form-title {
                font-size: 24px;
            }
            
            .auth-links {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <div class="image-content">
                <img src="{{ asset('images/Bénin.jpg') }}" alt="Culture Bénin" class="cultural-image">
            </div>
            <div class="cultural-pattern"></div>
        </div>
        
        <div class="register-right">
            <div class="logo">
                <span class="logo-icon"><i class="fas fa-landmark"></i></span>
                <span>CultureBénin</span>
            </div>
            
            <h2 class="form-title">
                <span class="form-title-icon"><i class="fas fa-user-plus"></i></span>
                Créer un compte
            </h2>
            <p class="form-subtitle">Remplissez les informations ci-dessous pour créer votre compte CultureBénin</p>
            
            <x-auth-session-status class="status-message status-success" :status="session('status')" />
            
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <div class="input-container">
                        <input id="nom" type="text" name="nom" value="{{ old('nom') }}" required autofocus autocomplete="family-name" placeholder="Votre nom">
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('nom')" class="error-message" />
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <div class="input-container">
                        <input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" required autocomplete="given-name" placeholder="Votre prénom">
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('prenom')" class="error-message" />
                </div>

                <div class="form-group">
                    <label for="sexe">Sexe</label>
                    <div class="input-container">
                        <select id="sexe" name="sexe" required>
                            <option value="">Sélectionner</option>
                            <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Masculin</option>
                            <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Féminin</option>
                        </select>
                        <span class="input-icon"><i class="fas fa-venus-mars"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('sexe')" class="error-message" />
                </div>

                <!-- CHAMP: Photo de profil -->
                <div class="form-group">
                    <label for="photo">Photo de profil (optionnel)</label>
                    <div class="input-container">
                        <input id="photo" type="file" name="photo" accept="image/*">
                        <span class="input-icon"><i class="fas fa-camera"></i></span>
                    </div>
                    <span class="file-input-info">Formats acceptés: JPEG, PNG, JPG, GIF (max 2MB)</span>
                    <x-input-error :messages="$errors->get('photo')" class="error-message" />
                </div>

                <!-- CHAMP: Date de naissance -->
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <div class="input-container">
                        <input id="date_naissance" type="date" name="date_naissance" value="{{ old('date_naissance') }}">
                        <span class="input-icon"><i class="fas fa-calendar"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('date_naissance')" class="error-message" />
                </div>
                
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <div class="input-container">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="votre@email.com">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- CHAMP: Langue -->
                <div class="form-group">
                    <label for="id_langue">Langue préférée</label>
                    <div class="input-container">
                        <select id="id_langue" name="id_langue">
                            <option value="">Sélectionnez une langue</option>
                            @foreach($langues as $langue)
                                <option value="{{ $langue->id_langue }}" {{ old('id_langue') == $langue->id_langue ? 'selected' : '' }}>
                                    {{ $langue->nom_langue }}
                                </option>
                            @endforeach
                        </select>
                        <span class="input-icon"><i class="fas fa-language"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('id_langue')" class="error-message" />
                </div>
                
                <!-- CHAMP: Type de compte (MODIFIÉ - Seulement Créateur et Traducteur) -->
                <div class="form-group">
                    <label for="id_role">Type de compte</label>
                    <div class="input-container">
                        <select id="id_role" name="id_role" required>
                            <option value="">Sélectionner un type de compte</option>
                            <option value="2" {{ old('id_role') == 2 ? 'selected' : '' }}>Créateur de Contenu</option>
                            <option value="6" {{ old('id_role') == 6 ? 'selected' : '' }}>Traducteur</option>
                        </select>
                        <span class="input-icon"><i class="fas fa-user-tag"></i></span>
                    </div>
                    <div class="form-text" style="font-size: 12px; color: var(--text-light); margin-top: 5px;">
                        • Créateur de Contenu : Publier et gérer du contenu culturel<br>
                        • Traducteur : Traduire le contenu dans différentes langues
                    </div>
                    <x-input-error :messages="$errors->get('id_role')" class="error-message" />
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-container">
                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Créez un mot de passe sécurisé">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                    </div>
                    <div class="password-strength">
                        <div class="strength-bar" id="password-strength-bar"></div>
                    </div>
                    <div class="strength-text" id="password-strength-text"></div>
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="input-container">
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez votre mot de passe">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </div>
                
                <div class="terms">
                    <input id="terms" type="checkbox" name="terms" required>
                    <label for="terms">
                        J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a> de CultureBénin
                    </label>
                </div>
                
                <button type="submit" class="submit-btn">
                    Créer mon compte
                    <span class="submit-icon"><i class="fas fa-arrow-right"></i></span>
                </button>
            </form>
            
            <div class="divider">
                <span>Ou s'inscrire avec</span>
            </div>
            
            <div class="social-login">
                <button class="social-btn">
                    <span class="social-icon"><i class="fab fa-google"></i></span>
                    <span>Google</span>
                </button>
                <button class="social-btn">
                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                    <span>Facebook</span>
                </button>
            </div>
            
            <div class="auth-links">
                <a href="{{ route('login') }}" class="auth-link">
                    <i class="fas fa-sign-in-alt"></i>
                    Déjà inscrit ? Se connecter
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des messages d'erreur
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(error => {
                if (error.textContent.trim() === '') {
                    error.style.display = 'none';
                }
            });

            // Gestion du statut de session
            const statusMessage = document.querySelector('.status-message');
            if (statusMessage && statusMessage.textContent.trim() === '') {
                statusMessage.style.display = 'none';
            }

            // Indicateur de force du mot de passe
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');

            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                let text = '';

                // Vérifications de base
                if (password.length > 0) {
                    if (password.length >= 8) strength += 1;
                    if (/[a-z]/.test(password)) strength += 1;
                    if (/[A-Z]/.test(password)) strength += 1;
                    if (/[0-9]/.test(password)) strength += 1;
                    if (/[^a-zA-Z0-9]/.test(password)) strength += 1;
                }

                // Mise à jour de l'affichage
                strengthBar.className = 'strength-bar';
                if (password.length === 0) {
                    strengthText.textContent = '';
                } else if (strength <= 2) {
                    strengthBar.classList.add('strength-weak');
                    strengthText.textContent = 'Faible';
                    strengthText.style.color = 'var(--error)';
                } else if (strength <= 4) {
                    strengthBar.classList.add('strength-medium');
                    strengthText.textContent = 'Moyen';
                    strengthText.style.color = 'var(--accent)';
                } else {
                    strengthBar.classList.add('strength-strong');
                    strengthText.textContent = 'Fort';
                    strengthText.style.color = 'var(--success)';
                }
            });

            // Simulation de la connexion sociale
            const socialButtons = document.querySelectorAll('.social-btn');
            socialButtons.forEach(button => {
                button.addEventListener('click', function() {
                    alert('Fonctionnalité de connexion sociale à implémenter');
                });
            });

            // Aperçu de la photo sélectionnée
            const photoInput = document.getElementById('photo');
            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Le fichier est trop volumineux. Maximum 2MB autorisé.');
                        this.value = '';
                        return;
                    }
                    
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    if (!validTypes.includes(file.type)) {
                        alert('Format de fichier non supporté. Utilisez JPEG, PNG, JPG ou GIF.');
                        this.value = '';
                        return;
                    }
                }
            });
        });
    </script>
</body>
</html>