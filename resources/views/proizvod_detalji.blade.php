<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $proizvod->Naziv }} - Premijum Mesara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Montserrat', sans-serif; background:#f9f9f9; }
        .navbar { background:#8B0000; }
        .navbar-brand { color:#FFD700 !important; font-weight:800; }
        .nav-link { color:white !important; }
        .product-img { max-height:400px; object-fit:cover; border-radius:10px; }
        .price-tag { background:#FFD700; color:#3D0000; padding:5px 15px; border-radius:30px; font-weight:700; display:inline-block; margin-top:10px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('proizvodi.index') }}">PREMIJUM MESARA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $proizvod->slika ?? 'https://via.placeholder.com/600x400' }}" class="product-img w-100" alt="{{ $proizvod->Naziv }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $proizvod->Naziv }}</h1>
            <p class="price-tag">{{ number_format($proizvod->Cena,0,',','.') }} RSD/kg</p>
            <p class="mt-4">{{ $proizvod->Opis ?? 'Kvalitetan proizvod sa naše mesare.' }}</p>
            <a href="{{ route('proizvodi.index') }}" class="btn btn-primary mt-3"><i class="fas fa-arrow-left"></i> Nazad na ponudu</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
