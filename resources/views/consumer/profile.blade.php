<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - Culture Béninoise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --benin-green: #008751;
            --benin-yellow: #fcd116;
            --benin-red: #e8112d;
            --earth-brown: #8B4513;
            --neutral-beige: #F5F5DC;
        }
        
        body {
            background: var(--neutral-beige);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .profile-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
        }
        
        .profile-header {
            background: linear-gradient(90deg, var(--benin-green), var(--benin-yellow));
            color: white;
            padding: 2rem;
            border-radius: 15px 15px 0 0;
            text-align: center;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--benin-green);
            font-size: 3rem;
            font-weight: bold;
            margin: -60px auto 1rem;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-benin {
            background: linear-gradient(45deg, var(--benin-green), var(--benin-yellow));
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .form-control:focus {
            border-color: var(--benin-green);
            box-shadow: 0 0 0 0.2rem rgba(0, 135, 81, 0.25);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="profile-card">
                    <div class="profile-header">
                        <h2>Mon Profil</h2>
                        <p>Gérez vos informations personnelles</p>
                    </div>
                    
                    <div class="profile-avatar">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    
                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('consumer.profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nom complet</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">
                                <a href="{{ route('consumer.presentation') }}" class="btn btn-outline-secondary">
                                    ← Retour
                                </a>
                                <button type="submit" class="btn btn-benin">
                                    💾 Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>