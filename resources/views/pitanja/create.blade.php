<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj pitanje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Dodaj novo pitanje</h3>
                </div>
                <div class="card-body">

                    {{-- Poruke --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pitanja.store') }}" method="POST">
                        @csrf

                        {{-- Korisnik --}}
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Korisnik:</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">Izaberite korisnika</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Proizvod --}}
                        <div class="mb-3">
                            <label for="ProizvodID" class="form-label">Proizvod:</label>
                            <select class="form-select" id="ProizvodID" name="ProizvodID" required>
                                <option value="">Izaberite proizvod</option>
                                @foreach($proizvodi as $proizvod)
                                    <option value="{{ $proizvod->ProizvodID }}">{{ $proizvod->Naziv }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pitanje --}}
                        <div class="mb-3">
                            <label for="pitanje" class="form-label">Pitanje:</label>
                            <textarea class="form-control" id="pitanje" name="pitanje" rows="3" maxlength="255" required></textarea>
                            <small class="text-muted"><span id="charCount">0</span>/255 karaktera</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Dodaj pitanje</button>
                        <a href="http://127.0.0.1:8000" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Vrati nazad
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Brojač karaktera
    document.getElementById('pitanje').addEventListener('input', function() {
        document.getElementById('charCount').textContent = this.value.length;
    });
</script>
</body>
</html>
