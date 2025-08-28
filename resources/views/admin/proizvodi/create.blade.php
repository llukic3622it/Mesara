<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj proizvod</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Dodaj novi proizvod</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.proizvodi.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="TipProizvodaID" class="form-label">Tip proizvoda</label>
                                <select class="form-select" id="TipProizvodaID" name="TipProizvodaID" required>
                                    <option value="">Izaberi tip proizvoda</option>
                                    @foreach($tipovi as $tip)
                                        <option value="{{ $tip->TipProizvodaID }}" {{ old('TipProizvodaID') == $tip->TipProizvodaID ? 'selected' : '' }}>
                                            {{ $tip->TipProizvoda }} <!-- Ispravljeno: $tip->TipProizvoda umesto $tip->Naziv -->
                                        </option>
                                    @endforeach
                                </select>
                                @error('TipProizvodaID')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="Naziv" class="form-label">Naziv proizvoda</label>
                                <input type="text" class="form-control" id="Naziv" name="Naziv" value="{{ old('Naziv') }}" required>
                                @error('Naziv')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="Kolicina" class="form-label">Količina</label>
                                <input type="number" class="form-control" id="Kolicina" name="Kolicina" value="{{ old('Kolicina') }}" min="0" required>
                                @error('Kolicina')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select class="form-select" id="Status" name="Status" required>
                                    <option value="Dostupno" {{ old('Status') == 'Dostupno' ? 'selected' : '' }}>Dostupno</option>
                                    <option value="Nedostupno" {{ old('Status') == 'Nedostupno' ? 'selected' : '' }}>Nedostupno</option>
                                </select>
                                @error('Status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="Cena" class="form-label">Cena (RSD)</label>
                                <input type="number" step="0.01" class="form-control" id="Cena" name="Cena" value="{{ old('Cena') }}" min="0" required>
                                @error('Cena')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.proizvodi.index') }}" class="btn btn-secondary me-md-2">Nazad</a>
                                <button type="submit" class="btn btn-primary">Sačuvaj proizvod</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>