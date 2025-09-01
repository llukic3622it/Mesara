<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premijum Mesara - Najbolje meso u gradu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8B0000;
            --secondary-color: #FFD700;
            --light-color: #FFF9E6;
            --dark-color: #3D0000;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
            background-color: #f9f9f9;
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .navbar-brand {
            font-weight: 800;
            color: var(--secondary-color) !important;
            font-size: 1.8rem;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: var(--secondary-color) !important;
            transform: translateY(-2px);
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1603052875180-e1e10e5a0b36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 150px 0;
            text-align: center;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 12px 30px;
            font-weight: 700;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--dark-color);
            border-color: var(--dark-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-outline-light:hover {
            background-color: var(--secondary-color);
            color: var(--dark-color);
        }
        
        .section-title {
            position: relative;
            margin-bottom: 40px;
            font-weight: 800;
            color: var(--primary-color);
        }
        
        .section-title:after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--secondary-color);
            margin: 15px auto 0;
        }
        
        .product-card {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .product-img {
            height: 200px;
            object-fit: cover;
        }
        
        .price-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary-color);
            color: var(--dark-color);
            padding: 5px 15px;
            border-radius: 30px;
            font-weight: 700;
        }
        
        .about-section {
            background-color: var(--light-color);
            padding: 100px 0;
        }
        
        .quality-badge {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .quality-item {
            text-align: center;
            padding: 30px 20px;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        
        .testimonial-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }
        
        .contact-info {
            background: var(--primary-color);
            color: white;
            border-radius: 10px;
            padding: 40px;
        }
        
        .contact-icon {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        
        footer {
            background: var(--dark-color);
            color: white;
            padding: 60px 0 30px;
        }
        
        .social-icon {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            color: var(--secondary-color);
            transform: translateY(-5px);
        }
        
        .bg-meat-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M50 50L0 25L50 0L100 25L50 50Z' fill='%238B0000' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
        
        /* Stilovi za login dugme i dropdown */
        .login-btn {
            background-color: var(--secondary-color);
            color: var(--dark-color);
            border: none;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 30px;
            transition: all 0.3s;
        }
        
        .login-btn:hover {
            background-color: white;
            transform: translateY(-2px);
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .dropdown-item {
            transition: all 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .cart-count {
            position: relative;
            top: -10px;
            right: 8px;
            background-color: var(--secondary-color);
            color: var(--dark-color);
            border-radius: 50%;
            padding: 3px 8px;
            font-size: 0.8rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-bacon me-2"></i>PREMIJUM MESARA
            </a>
            @if(session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#ponuda">Ponuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#o-nama">O Nama</a>
                    </li>           
                    <li class="nav-item">
                        <a class="nav-link" href="#kontakt">Kontakt</a>
                    </li>
                    
                    <!-- Login dugme sa dropdown menijem -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Prijava</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registracija</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pitanja.create') }}">
                                Postavi pitanje
                                <span class="badge bg-danger cart-count"></span>
                            </a>
                        </li>

                        {{-- Ako je admin --}}
                        @if(Auth::check() && (Auth::user()->email === 'admin@example.com' || Auth::user()->email === 'mesar@example.com'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-warning text-dark" href="http://127.0.0.1:8000/admin">
                                    🛠 Admin Panel
                                </a>
                            </li>
                        @endif

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                Cao, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Odjavi se</button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-3 fw-bold mb-4">Sveže i kvalitetno meso</h1>
                    <p class="lead mb-4">Naša mesara nudi širok izbor svežeg i kvalitetnog mesa, uz tradicionalne recepte i savremenu uslugu.</p>
                    <a href="#ponuda" class="btn btn-primary btn-lg me-3">Pogledaj Ponudu</a>
                    <a href="#kontakt" class="btn btn-outline-light btn-lg">Kontaktirajte Nas</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="ponuda" class="py-5 bg-meat-pattern">
        <div class="container py-5">
            <h2 class="text-center section-title">Naša Ponuda Meseca</h2>
            <div class="row g-4">
                @foreach($proizvodi as $proizvod)
                    <div class="col-md-6 col-lg-3">
                        <div class="card product-card h-100">
                            <div class="position-relative">
                                <img src="{{ $proizvod->slika ?? 'https://images.unsplash.com/photo-1546964124-0cce460f38ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80' }}" class="card-img-top product-img" alt="{{ $proizvod->Naziv }}">
                                <div class="price-tag">{{ number_format($proizvod->Cena, 0, ',', '.') }} RSD/kg</div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $proizvod->Naziv }}</h5>
                                <p class="card-text">
                                    @if($proizvod->Opis) {{ $proizvod->Opis }} @else Domaci proizvod. @endif
                                </p>

                                @auth
                            
                                @endauth
  

                                <div class="d-grid">
                                    <button onclick="prikaziDetalje({{ $proizvod->ProizvodID }})" class="btn btn-primary">
                                        Pogledaj detalje
                                    </button>
                                </div>

                                @auth
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="o-nama" class="about-section">
        <div class="container">
            <h2 class="text-center section-title">Zašto Odabrati Nas?</h2>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-4">Naša Priča, Tradicija kvaliteta od 2000. godine</h3>
                    <p class="lead">Sve naše meso potiče sa vlastite farme gde se čuva preko 1000 komada stoke</p>
                    <p>Naša porodična mesara posvećena je pružanju najkvalitetnijeg mesa sa naše farme. Sa preko 24 godine iskustva, naš tim stručnih mesara brine se da svaki komad mesa koji izađe iz naše radnje bude savršenog kvaliteta, ukusa i svežine.</p>
                    <p>Na farmi negujemo životinje u optimalnim uslovima, bez upotrebe hormona rasta i antibiotika, vodeći računa o dobrobiti životinja i kvalitetu finalnog proizvoda.</p>
                    <div class="mt-4">
                        <a href="#kontakt" class="btn btn-primary me-2">Posetite Nas</a>
                        <a href="tel:+381123456789" class="btn btn-outline-dark">Pozovite Nas</a>
                    </div>
                </div>
                <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1546964124-0cce460f38ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" class="card-img-top product-img" alt="Sveža junetina">
                        
                </div>
            </div>
            
            <div class="row mt-5 pt-5">
                <div class="col-md-4 quality-item">
                    <div class="quality-badge">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4>Organski Proizvodi</h4>
                    <p>Svi komadi mesa potiču sa nasih farmi koje poštuju visoke standarde kvaliteta.</p>
                </div>
                <div class="col-md-4 quality-item">
                    <div class="quality-badge">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h4>Dostava na Kućnu Adresu</h4>
                    <p>Besplatna dostava za porudžbine preko 5000 dinara unutar grada.</p>
                </div>
                <div class="col-md-4 quality-item">
                    <div class="quality-badge">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4>Garancija Kvaliteta</h4>
                    <p>Ukoliko niste zadovoljni kvalitetom, vraćamo novac ili zamenjujemo proizvod.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->

    <section id="kontakt" class="py-5 bg-light">
        <div class="container py-5">
            <h2 class="text-center section-title">Posetite Nas</h2>
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="contact-info h-100">
                        <h3 class="mb-4">Naša Mesara</h3>
                        <div class="d-flex mb-4">
                            <div class="me-4">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Adresa Mesare</h5>
                                <p>Glavna ulica 123, Beograd</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="me-4">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Telefon</h5>
                                <p>+381 12 345 6789</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="me-4">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p>info@premiummesara.rs</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="me-4">
                                <div class="contact-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Radno Vreme</h5>
                                <p>Pon - Pet: 07:00 - 20:00<br>Subota: 07:00 - 15:00<br>Nedelja: Zatvoreno</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h3 class="mb-4">Posetite Proizvodnju</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-tractor fa-3x text-primary mb-3"></i>
                                        <h5>Naša Farma</h5>
                                        <p class="mb-1">Selski put BB</p>
                                        <p>Zlatiborska dolina</p>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-directions me-1"></i> Smernice
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-industry fa-3x text-primary mb-3"></i>
                                        <h5>Proizvodni Pogon</h5>
                                        <p class="mb-1">Industrijska zona 15</p>
                                        <p>Beograd</p>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-directions me-1"></i> Smernice
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="alert alert-info mt-3">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Organizovane posete:</strong> Naše objekte možete posetiti uz prethodnu najavu. 
                                    Radujemo se vašem dolasku!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="text-warning">PREMIJUM MESARA</h3>
                    <p>Najbolji izbor svežeg i kvalitetnog mesa u vašem gradu. Tradicija i kvalitet od 1995. godine.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-warning">Brzi linkovi</h5>
                    <ul class="list-unstyled">
                        <li><a href="#ponuda" class="text-white text-decoration-none">Ponuda</a></li>
                        <li><a href="#o-nama" class="text-white text-decoration-none">O Nama</a></li>       
                        <li><a href="#kontakt" class="text-white text-decoration-none">Kontakt</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-warning">Zapratite Nas</h5>
                    <div class="d-flex mt-3">
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4" style="border-color: rgba(255,255,255,0.1)">
            <div class="text-center">
                <p class="mb-0">&copy; 2023 Premijum Mesara. Sva prava zadržana.</p>
            </div>
        </div>
    </footer>

    <!-- Modal za prikaz detalja proizvoda -->
    <div class="modal fade" id="detaljiModal" tabindex="-1" aria-labelledby="detaljiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detaljiModalLabel">Detalji proizvoda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="modalSlika" src="" class="img-fluid rounded" alt="">
                        </div>
                        <div class="col-md-6">
                            <h3 id="modalNaziv"></h3>
                            <h4 class="text-primary" id="modalCena"></h4>
                            <p id="modalOpis"></p>
                            <div class="d-flex align-items-center mt-4">
                                <input type="number" id="modalKolicina"  class="form-control me-2" style="width: 100px;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    // Funkcija za prikaz detalja proizvoda u modalu
    function prikaziDetalje(proizvodId) {
        // U realnoj aplikaciji, ovi podaci bi se dobili preko AJAX zahteva
        // Ovde koristimo fiktivne podatke za demonstraciju
        const proizvod = {
            id: proizvodId,
            naziv: "Proizvod " + proizvodId,
            cena: (1200 + proizvodId * 100) + " RSD/kg",
            opis: "Detaljan opis proizvoda " + proizvodId + ". Ovaj proizvod je veoma kvalitetan i svež. Idealno za pripremu različitih jela. Dolazi direktno sa naše farme gde se životinje gaje u optimalnim uslovima.",
            slika: "https://via.placeholder.com/500x300?text=Proizvod+" + proizvodId
        };
        
        // Popunjavanje modala sa podacima
        document.getElementById('modalNaziv').textContent = proizvod.naziv;
        document.getElementById('modalCena').textContent = proizvod.cena;
        document.getElementById('modalOpis').textContent = proizvod.opis;
        document.getElementById('modalSlika').src = proizvod.slika;
        document.getElementById('modalKolicina').value = 1;
        
        // Prikaz modala
        const modal = new bootstrap.Modal(document.getElementById('detaljiModal'));
        modal.show();
    }
    
    // Funkcija za dodavanje proizvoda u korpu (AJAX)
    function dodajUKorpu(proizvodId) {
        const kolicina = document.getElementById('kolicina-' + proizvodId).value;

        fetch("{{ route('korpa.dodaj') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                id: proizvodId,
                kolicina: kolicina
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                const poruka = document.getElementById('msg-' + proizvodId);
                poruka.style.display = 'block';

                const brojac = document.querySelector('.cart-count');
                brojac.textContent = data.korpa_count;

                setTimeout(() => {
                    poruka.style.display = 'none';
                }, 3000);
            }
        })
        .catch(error => console.error('Greška:', error));
    }

    
    // Funkcija za dodavanje u korpu iz modala
    function dodajUKorpuIzModala() {
        const kolicina = document.getElementById('modalKolicina').value;
        // U realnoj aplikaciji, proizvodId bi se čuvao u modal elementu
        const proizvodId = 1; // Ovo bi se dobilo iz modala
        
        console.log("Dodavanje u korpu iz modala: Proizvod ID=" + proizvodId + ", Količina=" + kolicina);
        
        // Ažuriranje brojača u korpi
        const brojac = document.querySelector('.cart-count');
        brojac.textContent = parseInt(brojac.textContent) + parseInt(kolicina);
        
        // Zatvaranje modala
        const modal = bootstrap.Modal.getInstance(document.getElementById('detaljiModal'));
        modal.hide();
        
        // Prikaz obaveštenja (toast ili alert)
        alert("Proizvod je dodat u korpu!");
    }
    </script>
</body>
</html>