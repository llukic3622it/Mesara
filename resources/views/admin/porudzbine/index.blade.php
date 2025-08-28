<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Porudžbina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Lista Porudžbina</h2>
                    <a href="{{ route('admin.porudzbine.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nova Porudžbina
                    </a>

                    <a href="http://127.0.0.1:8000/admin/" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Vrati nazad
                    </a>
                    
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kupac</th>
                                        <th>Proizvod</th>
                                        <th>Datum Prijave</th>
                                        <th>Zaposleni</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($porudzbine as $porudzbina)
                                        <tr>
                                            <td>{{ $porudzbina->PorudzbinaID }}</td>
                                            <td>{{ $porudzbina->kupac->Ime }} {{ $porudzbina->kupac->Prezime }}</td>
                                            <td>{{ $porudzbina->proizvod->Naziv ?? 'N/A' }}</td>
                                            <td>{{ $porudzbina->Datum_prijave->format('d.m.Y. H:i') }}</td>
                                            <td>{{ $porudzbina->zaposleni->Ime }} {{ $porudzbina->zaposleni->Prezime }}</td>
                                            <td>
                                                <a href="{{ route('admin.porudzbine.show', $porudzbina->PorudzbinaID) }}" 
                                                   class="btn btn-sm btn-info" title="Pregled">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.porudzbine.edit', $porudzbina->PorudzbinaID) }}" 
                                                   class="btn btn-sm btn-warning" title="Izmeni">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.porudzbine.destroy', $porudzbina->PorudzbinaID) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                            title="Obriši" onclick="return confirm('Da li ste sigurni?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Nema pronađenih porudžbina.</td>
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