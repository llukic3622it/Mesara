<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Proizvodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
        .btn-group .btn {
            margin-right: 5px;
        }
        .btn-group .btn:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Upravljanje proizvodima</h1>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ route('admin.proizvodi.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Dodaj novi proizvod
                    </a>

                    <a href="http://127.0.0.1:8000/admin/" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Vrati nazad
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tip proizvoda ID</th>
                                        <th>Naziv</th>
                                        <th>Količina</th>
                                        <th>Status</th>
                                        <th>Cena</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($proizvodi as $proizvod)
                                    <tr>
                                        <td>{{ $proizvod->ProizvodID }}</td>
                                        
                                        <td>{{ $proizvod->tipProizvoda->TipProizvoda ?? 'N/A' }}</td>
                                        <td>{{ $proizvod->Naziv }}</td>
                                        <td>{{ $proizvod->Kolicina }}</td>
                                        <td>
                                            <span class="badge bg-{{ $proizvod->Status == 'Dostupno' ? 'success' : 'danger' }}">
                                                {{ $proizvod->Status }}
                                            </span>
                                        </td>
                                        <td>{{ number_format($proizvod->Cena, 2) }} RSD</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.proizvodi.show', $proizvod->ProizvodID) }}" class="btn btn-info btn-sm" title="Pregled">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.proizvodi.edit', $proizvod->ProizvodID) }}" class="btn btn-warning btn-sm" title="Izmeni">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.proizvodi.destroy', $proizvod->ProizvodID) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj proizvod?')" title="Obriši">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Nema proizvoda u bazi podataka.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>