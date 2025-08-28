<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Porudžbina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Dodaj Novu Porudžbinu</h2>
                
                <form action="{{ route('admin.porudzbine.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="KupacID" class="form-label">Kupac</label>
                        <select class="form-select" id="KupacID" name="KupacID" required>
                            <option value="">Izaberite kupca</option>
                            @foreach($kupci as $kupac)
                                <option value="{{ $kupac->KupacID }}" {{ old('KupacID') == $kupac->KupacID ? 'selected' : '' }}>
                                    {{ $kupac->Ime }} {{ $kupac->Prezime }}
                                </option>
                            @endforeach
                        </select>
                        @error('KupacID')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="proizvod_id" class="form-label">Proizvod</label>
                        <select class="form-select" id="proizvod_id" name="proizvod_id">
                            <option value="">Izaberite proizvod (opciono)</option>
                            @foreach($proizvodi as $proizvod)
                                <option value="{{ $proizvod->ProizvodID }}" {{ old('proizvod_id') == $proizvod->ProizvodID ? 'selected' : '' }}>
                                    {{ $proizvod->Naziv }}
                                </option>
                            @endforeach
                        </select>
                        @error('proizvod_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="Datum_prijave" class="form-label">Datum Prijave</label>
                        <input type="datetime-local" class="form-control" id="Datum_prijave" 
                               name="Datum_prijave" value="{{ old('Datum_prijave') }}" required>
                        @error('Datum_prijave')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="ZaposleniID" class="form-label">Zaposleni</label>
                        <select class="form-select" id="ZaposleniID" name="ZaposleniID" required>
                            <option value="">Izaberite zaposlenog</option>
                            @foreach($zaposleni as $zap)
                                <option value="{{ $zap->ZaposleniID }}" {{ old('ZaposleniID') == $zap->ZaposleniID ? 'selected' : '' }}>
                                    {{ $zap->Ime }} {{ $zap->Prezime }}
                                </option>
                            @endforeach
                        </select>
                        @error('ZaposleniID')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Sačuvaj</button>
                        <a href="{{ route('admin.porudzbine.index') }}" class="btn btn-secondary">Nazad</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>