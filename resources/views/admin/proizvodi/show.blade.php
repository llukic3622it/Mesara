<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled proizvoda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Pregled proizvoda</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">ID:</div>
                            <div class="col-sm-8">{{ $proizvod->ProizvodID }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Tip proizvoda:</div>
                            <div class="col-sm-8">{{ $proizvod->tipProizvoda->Naziv ?? 'Nepoznato' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Naziv:</div>
                            <div class="col-sm-8">{{ $proizvod->Naziv }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Količina:</div>
                            <div class="col-sm-8">{{ $proizvod->Kolicina }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Status:</div>
                            <div class="col-sm-8">
                                <span class="badge bg-{{ $proizvod->Status == 'Dostupno' ? 'success' : 'danger' }}">
                                    {{ $proizvod->Status }}
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Cena:</div>
                            <div class="col-sm-8">{{ number_format($proizvod->Cena, 2) }} RSD</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Kreiran:</div>
                            <div class="col-sm-8">{{ $proizvod->created_at }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Ažuriran:</div>
                            <div class="col-sm-8">{{ $proizvod->updated_at }}</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('admin.proizvodi.edit', $proizvod->ProizvodID) }}" class="btn btn-warning me-md-2">Izmeni</a>
                            <a href="{{ route('admin.proizvodi.index') }}" class="btn btn-secondary">Nazad na listu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>