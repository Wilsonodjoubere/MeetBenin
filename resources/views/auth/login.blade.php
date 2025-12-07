<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CultureBénin</title>
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

        .login-container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            background-color: var(--white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
            position: relative;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23ffffff" opacity="0.1" d="M28.2,43.8c-1.7-1.7-1.7-4.5,0-6.2l8.7-8.7c1.7-1.7,4.5-1.7,6.2,0l8.7,8.7c1.7,1.7,1.7,4.5,0,6.2l-8.7,8.7c-1.7,1.7-4.5,1.7-6.2,0L28.2,43.8z"/></svg>');
            background-size: 150px;
        }

        .login-right {
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

        .features {
            display: none;
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

        input {
            width: 100%;
            padding: 14px 16px 14px 45px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.2s;
            background-color: #fcf9f5;
        }

        input:focus {
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

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember {
            display: flex;
            align-items: center;
        }

        .remember input {
            width: auto;
            margin-right: 8px;
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: var(--primary-dark);
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

        .signup-link {
            text-align: center;
            margin-top: 30px;
            color: var(--text-light);
        }

        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            text-decoration: underline;
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

        .benin-flag {
            display: none;
        }

        .flag-stripe {
            height: 8px;
            flex: 1;
        }

        .green {
            background-color: #008753;
        }

        .yellow {
            background-color: #fcd116;
        }

        .red {
            background-color: #e70013;
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

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            
            .login-left {
                padding: 0;
                height: 250px;
            }
            
            .login-right {
                padding: 30px;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .auth-links {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="image-content">
                <img src="{{ asset('images/biguerra.jpg') }}" alt="Culture Bénin" class="cultural-image">
            </div>
            <div class="cultural-pattern"></div>
        </div>
        
        <div class="login-right">
            <div class="logo">
                <span class="logo-icon"><i class="fas fa-landmark"></i></span>
                <span>CultureBénin</span>
            </div>
            
            <h2 class="form-title">
                <span class="form-title-icon"><i class="fas fa-sign-in-alt"></i></span>
                Se connecter
            </h2>
            <p class="form-subtitle">Entrez vos identifiants pour accéder à votre compte CultureBénin</p>
            
            <!-- Session Status -->
            <x-auth-session-status class="status-message status-success" :status="session('status')" />
            
            <!-- FORMULAIRE CORRIGÉ ET SIMPLIFIÉ -->
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                
                <!-- Email Address - NOMS CORRECTS -->
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <div class="input-container">
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               placeholder="traducteur@test.com">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>
                
                <!-- Password - NOMS CORRECTS -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-container">
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               placeholder="password">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>
                
                <!-- Remember Me & Forgot Password -->
                <div class="remember-forgot">
                    <div class="remember">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me">Se souvenir de moi</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    Se connecter
                    <span class="submit-icon"><i class="fas fa-arrow-right"></i></span>
                </button>
            </form>
            
            <div class="divider">
                <span>Ou continuer avec</span>
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
                <a href="{{ route('register') }}" class="auth-link">
                    <i class="fas fa-user-plus"></i>
                    Créer un compte
                </a>
                <a href="{{ route('dashboard') }}" class="auth-link">
                    <i class="fas fa-tachometer-alt"></i>
                    Tableau de bord
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

            // Simulation de la connexion sociale
            const socialButtons = document.querySelectorAll('.social-btn');
            socialButtons.forEach(button => {
                button.addEventListener('click', function() {
                    alert('Fonctionnalité de connexion sociale à implémenter');
                });
            });

            // CORRECTION SIMPLE DU CACHE
            // Si le champ email est vide ou contient une ancienne valeur, on le vide
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');
            
            if (emailField) {
                // Si le champ contient une ancienne valeur incorrecte
                if (emailField.value === 'wodjoubere@gmail.com') {
                    emailField.value = '';
                }
                // Si vide, on met le placeholder pour aider
                if (!emailField.value) {
                    emailField.placeholder = 'traducteur@test.com';
                }
            }
            
            if (passwordField && passwordField.value) {
                // Vide le mot de passe s'il est pré-rempli
                passwordField.value = '';
            }
        });
    </script>
</body>
</html>