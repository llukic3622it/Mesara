<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija - Premijum Mesara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #8B0000;
            --secondary-color: #FFD700;
        }
        
        body {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1603052875180-e1e10e5a0b36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .card-auth {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        .card-header-auth {
            background-color: var(--primary-color);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .card-body-auth {
            padding: 30px;
        }
        
        .btn-auth {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            padding: 10px;
            font-weight: 600;
        }
        
        .btn-auth:hover {
            background-color: #700000;
            border-color: #700000;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(255,215,0,0.25);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card-auth">
                <div class="card-header-auth">
                    <h2><i class="fas fa-user-plus me-2"></i> Registracija</h2>
                    <p class="mb-0">Premijum Mesara</p>
                </div>
                <div class="card-body-auth">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Ime</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email adresa</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Lozinka</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Potvrdi Lozinku</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-auth btn-lg">Registruj se</button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Već imaš nalog? <a href="{{ route('login') }}">Prijavi se</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
