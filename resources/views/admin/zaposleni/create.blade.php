<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj zaposlenog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 500;
            color: #2c3e50;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
        }
        .btn-secondary {
            background-color: #95a5a6;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .required-field::after {
            content: " *";
            color: #e74c3c;
        }
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Dodaj novog zaposlenog</h1>
        
        <!-- Prikaz poruke o uspehu -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Prikaz grešaka -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.zaposleni.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="Ime" class="form-label required-field">Ime</label>
                <input type="text" class="form-control" id="Ime" name="Ime" value="{{ old('Ime') }}" required>
                @error('Ime')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="Prezime" class="form-label required-field">Prezime</label>
                <input type="text" class="form-control" id="Prezime" name="Prezime" value="{{ old('Prezime') }}" required>
                @error('Prezime')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="PozicijaID" class="form-label required-field">Pozicija</label>
                <select class="form-select" id="PozicijaID" name="PozicijaID" required>
                    <option value="">Izaberite poziciju</option>
                    <!-- Ručno dodate pozicije za testiranje -->
                    <option value="1" {{ old('PozicijaID') == '1' ? 'selected' : '' }}>Admin</option>
                    <option value="3" {{ old('PozicijaID') == '3' ? 'selected' : '' }}>Mesar</option>
                </select>
                @error('PozicijaID')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.zaposleni.index') }}" class="btn btn-secondary">Otkaži</a>

                <button type="submit" class="btn btn-primary">Sačuvaj</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript za dodatnu validaciju
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                let valid = true;
                const ime = document.getElementById('Ime').value.trim();
                const prezime = document.getElementById('Prezime').value.trim();
                const pozicija = document.getElementById('PozicijaID').value;
                
                if (!ime) {
                    alert('Molimo unesite ime zaposlenog.');
                    valid = false;
                }
                
                if (!prezime) {
                    alert('Molimo unesite prezime zaposlenog.');
                    valid = false;
                }
                
                if (!pozicija) {
                    alert('Molimo odaberite poziciju zaposlenog.');
                    valid = false;
                }
                
                if (!valid) {
                    e.preventDefault();
                }
            });
            
            // Logika za praćenje izbora pozicije (za debug)
            const pozicijaSelect = document.getElementById('PozicijaID');
            pozicijaSelect.addEventListener('change', function() {
                console.log('Izabrana pozicija:', this.options[this.selectedIndex].text, 'Vrednost:', this.value);
            });
        });
    </script>
</body>
</html>