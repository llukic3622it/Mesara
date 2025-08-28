<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalji Porudžbine #{{ $porudzbina->PorudzbinaID }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Detalji Porudžbine #{{ $porudzbina->PorudzbinaID }}
                    </h2>
                    <div>
                        <a href="{{ route('admin.porudzbine.edit', $porudzbina->PorudzbinaID) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Izmeni
                        </a>
                        <a href="{{ route('admin.porudzbine.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Nazad na listu
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Osnovni podaci</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Broj porudžbine:</strong> #{{ $porudzbina->PorudzbinaID }}</p>
                                <p><strong>Datum prijave:</strong> {{ $porudzbina->Datum_prijave->format('d.m.Y H:i') }}</p>
                                <p><strong>Datum kreiranja:</strong> {{ $porudzbina->created_at->format('d.m.Y H:i') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Kupac:</strong> 
                                    {{ $porudzbina->kupac->Ime }} {{ $porudzbina->kupac->Prezime }}
                                </p>
                                <p><strong>Zaposleni:</strong> 
                                    {{ $porudzbina->zaposleni->Ime }} {{ $porudzbina->zaposleni->Prezime }}
                                </p>
                                @if($porudzbina->proizvod)
                                <p><strong>Proizvod:</strong> 
                                    {{ $porudzbina->proizvod->Naziv }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Dodatne informacije</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>ID kupca:</strong> {{ $porudzbina->KupacID }}</p>
                                <p><strong>ID zaposlenog:</strong> {{ $porudzbina->ZaposleniID }}</p>
                            </div>
                            <div class="col-md-6">
                                @if($porudzbina->proizvod_id)
                                <p><strong>ID proizvoda:</strong> {{ $porudzbina->proizvod_id }}</p>
                                @endif
                                <p><strong>Poslednja izmena:</strong> {{ $porudzbina->updated_at->format('d.m.Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>