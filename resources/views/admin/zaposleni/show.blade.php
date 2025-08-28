<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled zaposlenog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Pregled zaposlenog</h1>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Podaci o zaposlenom</h5>
                        
                        <div class="mb-3">
                            <strong>ID:</strong> {{ $zaposleni->ZaposleniID }}
                        </div>
                        
                        <div class="mb-3">
                            <strong>Ime:</strong> {{ $zaposleni->Ime }}
                        </div>
                        
                        <div class="mb-3">
                            <strong>Prezime:</strong> {{ $zaposleni->Prezime }}
                        </div>
                        
                        <div class="mb-3">
                            <strong>Pozicija ID:</strong> {{ $zaposleni->PozicijaID }}
                        </div>
                        
                        <div class="mb-3">
                            <strong>Kreirano:</strong> {{ $zaposleni->created_at }}
                        </div>
                        
                        <div class="mb-3">
                            <strong>Ažurirano:</strong> {{ $zaposleni->updated_at }}
                        </div>
                        
                        <a href="{{ route('admin.zaposleni.edit', $zaposleni->ZaposleniID) }}" class="btn btn-warning">Izmeni</a>
                        <a href="{{ route('admin.zaposleni.index') }}" class="btn btn-secondary">Nazad na listu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>