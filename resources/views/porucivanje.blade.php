<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatsko Popunjavanje Podataka Kupca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
        }
        .header {
            background: #8b0000;
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 25px;
        }
        .customer-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background: #8b0000;
            border: none;
            padding: 12px 30px;
        }
        .btn-primary:hover {
            background: #6d0000;
        }
        .btn-success {
            padding: 12px 30px;
        }
        .highlight {
            background-color: #fff9c4;
            transition: background-color 0.5s ease;
        }
        .auto-fill-indicator {
            display: none;
            color: #28a745;
            font-weight: bold;
        }
        .instructions {
            background: #e7f5ff;
            border-left: 4px solid #0066cc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .add-customer-btn {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header text-center">
            <h1><i class="fas fa-user-check me-2"></i>Automatsko Popunjavanje Podataka Kupca</h1>
            <p class="mb-0">Unesite ID kupca za automatsko popunjavanje podataka</p>
        </div>

        <!-- Add New Customer Button -->
        <div class="text-end add-customer-btn">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                <i class="fas fa-plus-circle me-2"></i>Dodaj novog kupca
            </button>
        </div>

        <!-- Instructions -->
        <div class="instructions">
            <h5><i class="fas fa-info-circle me-2"></i>Uputstvo</h5>
            <p class="mb-0">Unesite ID kupca u polje ispod i pritisnite Enter ili kliknite na dugme "Pronađi". Podaci će se automatski popuniti u formi.</p>
        </div>

        <div class="form-container">
            <!-- Customer ID Input -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="customer-id" class="form-label fw-bold">ID Kupca:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="customer-id" placeholder="Unesite ID kupca">
                        <button class="btn btn-primary" type="button" id="find-customer">
                            <i class="fas fa-search me-1"></i> Pronađi
                        </button>
                    </div>
                    <div class="form-text">Unesite ID kupca iz baze podataka</div>
                </div>
                <div class="col-md-6">
                    <div class="auto-fill-indicator" id="auto-fill-indicator">
                        <i class="fas fa-check-circle me-2"></i> Podaci su automatski popunjeni!
                    </div>
                </div>
            </div>

            <!-- Customer Data Form -->
            <form id="customer-form" method="POST" action="/potvrdi-porudzbinu">
                <div class="customer-info">
                    <h4 class="mb-4"><i class="fas fa-user me-2"></i>Podaci o kupcu</h4>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ime" class="form-label">Ime *</label>
                            <input type="text" class="form-control" id="ime" name="ime" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="prezime" class="form-label">Prezime *</label>
                            <input type="text" class="form-control" id="prezime" name="prezime" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefon" class="form-label">Telefon *</label>
                        <input type="tel" class="form-control" id="telefon" name="telefon" required>
                    </div>

                    <div class="mb-3">
                        <label for="adresa" class="form-label">Adresa *</label>
                        <textarea class="form-control" id="adresa" name="adresa" rows="2" required></textarea>
                    </div>
                </div>

                <!-- Order Details -->
                <h4 class="mb-4"><i class="fas fa-shopping-cart me-2"></i>Detalji porudžbine</h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="proizvod" class="form-label">Proizvod *</label>
                        <select class="form-select" id="proizvod" name="proizvod" required>
                            <option value="">Izaberite proizvod</option>
                            <option value="1">Junetina - 2100 RSD/kg</option>
                            <option value="2">Svinjsko meso - 1200 RSD/kg</option>
                            <option value="3">Piletina - 1200 RSD/kg</option>
                            <option value="4">Teletina - 3500 RSD/kg</option>
                            <option value="5">Kobasice - 1300 RSD/kg</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="kolicina" class="form-label">Količina (kg) *</label>
                        <input type="number" class="form-control" id="kolicina" name="kolicina" min="0.1" step="0.1" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="napomene" class="form-label">Napomene</label>
                    <textarea class="form-control" id="napomene" name="napomene" rows="2"></textarea>
                </div>

                <div class="alert alert-info mt-4">
                    <div class="d-flex justify-content-between">
                        <strong>Ukupno za plaćanje:</strong>
                        <strong id="total-price">0.00 RSD</strong>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                    <i class="fas fa-check-circle me-2"></i>Potvrdi porudžbinu
                </button>
            </form>
        </div>
    </div>

    <!-- Add Customer Modal -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Dodaj novog kupca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-customer-form" method="POST" action="/dodaj-kupca">
                        <div class="mb-3">
                            <label for="new-ime" class="form-label">Ime *</label>
                            <input type="text" class="form-control" id="new-ime" name="ime" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-prezime" class="form-label">Prezime *</label>
                            <input type="text" class="form-control" id="new-prezime" name="prezime" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="new-email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-telefon" class="form-label">Telefon *</label>
                            <input type="tel" class="form-control" id="new-telefon" name="telefon" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-adresa" class="form-label">Adresa *</label>
                            <textarea class="form-control" id="new-adresa" name="adresa" rows="2" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Sačuvaj kupca</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const productPrices = { 1: 2100, 2: 1200, 3: 1200, 4: 3500, 5: 1300 };

        // Automatsko popunjavanje kupca
        function populateCustomerData(customerId) {
            fetch(`/get-kupac/${customerId}`)
                .then(res => res.json())
                .then(customer => {
                    if(customer){
                        document.getElementById('ime').value = customer.ime;
                        document.getElementById('prezime').value = customer.prezime;
                        document.getElementById('email').value = customer.email;
                        document.getElementById('telefon').value = customer.telefon;
                        document.getElementById('adresa').value = customer.adresa;

                        const indicator = document.getElementById('auto-fill-indicator');
                        indicator.style.display = 'block';
                        ['ime','prezime','email','telefon','adresa'].forEach(f=>{
                            const el=document.getElementById(f);
                            el.classList.add('highlight');
                            setTimeout(()=>el.classList.remove('highlight'),3000);
                        });
                        setTimeout(()=>indicator.style.display='none',3000);
                    } else {
                        alert('Kupac nije pronađen!');
                    }
                });
        }

        // Izračunavanje ukupne cene
        function calculateTotal() {
            const productId = document.getElementById('proizvod').value;
            const quantity = document.getElementById('kolicina').value;
            if(productId && quantity){
                const total = productPrices[productId] * quantity;
                document.getElementById('total-price').textContent = total.toLocaleString('sr-RS') + '.00 RSD';
            } else {
                document.getElementById('total-price').textContent = '0.00 RSD';
            }
        }

        document.addEventListener('DOMContentLoaded',()=>{
            document.getElementById('find-customer').addEventListener('click',()=>{
                const id=document.getElementById('customer-id').value;
                if(id) populateCustomerData(id); else alert('Unesite ID kupca!');
            });

            document.getElementById('customer-id').addEventListener('keypress',e=>{
                if(e.key==='Enter'){ e.preventDefault(); const id=document.getElementById('customer-id').value; if(id) populateCustomerData(id);}
            });

            document.getElementById('proizvod').addEventListener('change',calculateTotal);
            document.getElementById('kolicina').addEventListener('input',calculateTotal);

            // Dodavanje kupca preko AJAX POST
            document.getElementById('add-customer-form').addEventListener('submit',function(e){
                e.preventDefault();
                const formData=new FormData(this);
                fetch('/dodaj-kupca',{ method:'POST', body:formData })
                    .then(res=>res.json())
                    .then(data=>{
                        if(data.success){
                            alert('Kupac je uspešno dodat!');
                            this.reset();
                            bootstrap.Modal.getInstance(document.getElementById('addCustomerModal')).hide();
                        } else {
                            alert('Greška: '+data.message);
                        }
                    }).catch(err=>{
                        console.error(err);
                        alert('Greška prilikom slanja podataka.');
                    });
            });

            // Sprečavanje default submit porudžbine
            document.getElementById('customer-form').addEventListener('submit',function(e){
                e.preventDefault();
                alert('Porudžbina je uspešno poslata!');
                this.reset();
                document.getElementById('total-price').textContent='0.00 RSD';
            });
        });
    </script>
</body>
</html>
