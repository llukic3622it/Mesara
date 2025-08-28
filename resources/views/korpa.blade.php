<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaša Korpa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead {
            background-color: #343a40;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .btn-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 15px;
        }
        h1 {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">🛒 Vaša korpa</h1>

        @if(count($korpa) > 0)
            <div class="table-responsive shadow-sm rounded bg-white p-3">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Proizvod</th>
                            <th>Cena</th>
                            <th>Količina</th>
                            <th>Ukupno</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($korpa as $id => $details)
                        <tr>
                            <td>{{ $details['naziv'] }}</td>
                            <td>{{ number_format($details['cena'], 2) }} RSD</td>
                            <td>
                                <form action="{{ route('korpa.azuriraj', $id) }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    <input type="number" name="kolicina" value="{{ $details['kolicina'] }}" min="1" class="form-control form-control-sm w-50">
                                    <button type="submit" class="btn btn-sm btn-info">Ažuriraj</button>
                                </form>
                            </td>
                            <td><strong>{{ number_format($details['cena'] * $details['kolicina'], 2) }} RSD</strong></td>
                            <td>
                                <form action="{{ route('korpa.ukloni', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Ukloni</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="total">
                    Ukupno za plaćanje: {{ number_format($ukupno, 2) }} RSD
                </div>

                <div class="btn-actions">
                    <form action="{{ route('korpa.plati') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg">Plati</button>
                    </form>
                    <a href="{{ url('/') }}" class="btn btn-secondary btn-lg">Nastavi kupovinu</a>
                </div>
            </div>
        @else
            <p class="text-center fs-5 mt-5">Vaša korpa je prazna.</p>
            <div class="text-center mt-3">
                <a href="{{ url('/') }}" class="btn btn-secondary btn-lg">Nastavi kupovinu</a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
