<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Zaposleni</title>
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
                <h1 class="mb-4">Upravljanje zaposlenima</h1>
                
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
                    <a href="{{ route('admin.zaposleni.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Dodaj novog zaposlenog
                    </a>

                    <a href="http://127.0.0.1:8000/admin/" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Vrati nazad
                    </a>

                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ime</th>
                                        <th>Prezime</th>
                                        <th>Pozicija</th> <!-- Promenjeno iz "Pozicija ID" u "Pozicija" -->
                                        <th>Dodat</th>
                                        <th>Ažuriran</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($zaposleni as $zap)
                                    <tr>
                                        <td>{{ $zap->ZaposleniID }}</td>
                                        <td>{{ $zap->Ime }}</td>
                                        <td>{{ $zap->Prezime }}</td>
                                        <td>
                                            @if($zap->pozicija)
                                                {{ $zap->pozicija->NazivPozicije }}
                                            @else
                                                Nema pozicije
                                            @endif
                                        </td>
                                        <td>{{ $zap->created_at->format('d.m.Y. H:i') }}</td>
                                        <td>{{ $zap->updated_at->format('d.m.Y. H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.zaposleni.edit', $zap->ZaposleniID) }}" class="btn btn-sm btn-warning">✏️</a>
                                            <form action="{{ route('admin.zaposleni.destroy', $zap->ZaposleniID) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni?')">🗑️</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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