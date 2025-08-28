<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmeni zaposlenog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Izmeni zaposlenog</h1>
                
                <form action="{{ route('admin.zaposleni.update', $zaposleni->ZaposleniID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="Ime" class="form-label">Ime</label>
                        <input type="text" class="form-control" id="Ime" name="Ime" value="{{ $zaposleni->Ime }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Prezime" class="form-label">Prezime</label>
                        <input type="text" class="form-control" id="Prezime" name="Prezime" value="{{ $zaposleni->Prezime }}" required>
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
                    
                    <button type="submit" class="btn btn-primary">Ažuriraj</button>
                    <a href="{{ route('admin.zaposleni.index') }}" class="btn btn-secondary">Otkaži</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>