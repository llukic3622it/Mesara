<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesara - Upravljanje Kupcima</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --mesara-primary: #9c0000;
            --mesara-secondary: #7a0000;
            --mesara-light: #ffcccc;
            --mesara-dark: #600000;
        }

        body {
            background-color: #fff5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background: linear-gradient(135deg, var(--mesara-primary) 0%, var(--mesara-secondary) 100%);
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
            border-bottom: 4px solid var(--mesara-dark);
        }

        .header h1 {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-container {
            background-color: #ffebee;
            border: 2px solid var(--mesara-primary);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-label.required-field::after {
            content: "*";
            color: var(--mesara-primary);
            margin-left: 4px;
        }

        .form-control {
            border: 1px solid var(--mesara-primary);
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: var(--mesara-dark);
            box-shadow: 0 0 0 0.2rem rgba(156, 0, 0, 0.25);
        }

        .btn-primary {
            background-color: var(--mesara-primary);
            border-color: var(--mesara-dark);
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--mesara-dark);
            border-color: var(--mesara-secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-back {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            background-color: var(--mesara-primary);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }

        .btn-back:hover {
            background-color: var(--mesara-dark);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        table {
            margin-bottom: 0;
        }

        table thead {
            background-color: var(--mesara-primary);
            color: white;
        }

        table thead th {
            border: none;
            padding: 15px;
            font-weight: 600;
            text-align: center;
        }

        table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            text-align: center;
        }

        table tbody tr {
            transition: background-color 0.3s;
        }

        table tbody tr:nth-of-type(odd) {
            background-color: rgba(156, 0, 0, 0.05);
        }

        table tbody tr:hover {
            background-color: var(--mesara-light);
        }

        .btn-action {
            padding: 5px 10px;
            margin: 0 3px;
            border-radius: 4px;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #000;
            border: none;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .toast-container {
            z-index: 1050;
        }

        .toast-header {
            background-color: var(--mesara-primary);
            color: white;
            font-weight: 600;
        }

        .toast-body.text-success {
            color: #155724;
            background-color: #d4edda;
        }

        .toast-body.text-danger {
            color: #721c24;
            background-color: #f8d7da;
        }

        .btn-loading {
            position: relative;
            color: transparent;
        }

        .btn-loading:after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--mesara-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .footer {
            background-color: var(--mesara-dark);
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        .section-title {
            color: var(--mesara-dark);
            font-weight: 700;
            border-bottom: 2px solid var(--mesara-light);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .empty-table {
            text-align: center;
            padding: 30px;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <h1 class="text-center">
                <i class="fas fa-users me-2"></i>Dodavanje kupaca
            </h1>
        </div>
    </div>

    <div class="container">
        <!-- Forma za dodavanje kupca -->
        <div class="form-container">
            <h3 class="section-title">
                <i class="fas fa-plus-circle me-2"></i>Dodavanje kupaca
            </h3>
            <form id="kupacForm">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ime" class="form-label required-field">Ime</label>
                        <input type="text" class="form-control" id="ime" name="ime" required>
                        <div class="invalid-feedback" id="imeError"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="prezime" class="form-label required-field">Prezime</label>
                        <input type="text" class="form-control" id="prezime" name="prezime" required>
                        <div class="invalid-feedback" id="prezimeError"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label required-field">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="telefon" class="form-label">Telefon</label>
                        <input type="text" class="form-control" id="telefon" name="telefon">
                        <div class="invalid-feedback" id="telefonError"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="adresa" class="form-label">Adresa</label>
                        <textarea class="form-control" id="adresa" name="adresa" rows="2"></textarea>
                        <div class="invalid-feedback" id="adresaError"></div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-save me-2"></i> Sačuvaj kupca
                </button>
            </form>
        </div>
    </div>

    <!-- Dugme za povratak na početnu -->
    <a href="http://127.0.0.1:8000/" class="btn-back">
        <i class="fas fa-arrow-left fa-lg"></i>
    </a>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p class="mb-0">© 2023 Mesara App - Sva prava zadržana</p>
        </div>
    </div>

    <!-- Toast poruka -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto" id="toastTitle">Obaveštenje</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                Poruka će se pojaviti ovde.
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kupacForm = document.getElementById('kupacForm');
            const refreshBtn = document.getElementById('refreshBtn');
            const submitBtn = document.getElementById('submitBtn');
            const toastEl = document.getElementById('liveToast');
            const toastTitle = document.getElementById('toastTitle');
            const toastMessage = document.getElementById('toastMessage');
            const toast = new bootstrap.Toast(toastEl);

            // Funkcija za prikaz toast poruke
            function showToast(title, message, isSuccess = true) {
                toastTitle.textContent = title;
                toastMessage.textContent = message;
                toastMessage.className = 'toast-body';
                if (isSuccess) {
                    toastTitle.innerHTML = '<i class="fas fa-check-circle me-2"></i>' + title;
                    toastMessage.classList.add('text-success');
                } else {
                    toastTitle.innerHTML = '<i class="fas fa-exclamation-circle me-2"></i>' + title;
                    toastMessage.classList.add('text-danger');
                }
                toast.show();
            }

            // Resetovanje validation poruka
            function resetValidation() {
                const inputs = kupacForm.querySelectorAll('.is-invalid');
                inputs.forEach(input => {
                    input.classList.remove('is-invalid');
                });

                const errorMessages = kupacForm.querySelectorAll('.invalid-feedback');
                errorMessages.forEach(msg => {
                    msg.textContent = '';
                });
            }

            // Slanje forme preko AJAX-a
            kupacForm.addEventListener('submit', function(e) {
                e.preventDefault();

                resetValidation();
                submitBtn.disabled = true;
                submitBtn.classList.add('btn-loading');

                const formData = new FormData(this);

                fetch('/dodaj-kupca', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        showToast('Uspeh', data.message, true);
                        kupacForm.reset();
                        // Osvežavanje tabele
                        refreshTable();
                    } else {
                        showToast('Greška', data.message, false);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);

                    if (error.errors) {
                        // Prikazivanje grešaka validacije
                        for (const [field, messages] of Object.entries(error.errors)) {
                            const input = document.getElementById(field);
                            const errorElement = document.getElementById(field + 'Error');

                            if (input && errorElement) {
                                input.classList.add('is-invalid');
                                errorElement.textContent = messages[0];
                            }
                        }
                        showToast('Greška', 'Molimo ispravite greške u formi.', false);
                    } else {
                        showToast('Greška', error.message || 'Došlo je do greške prilikom slanja podataka.', false);
                    }
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('btn-loading');
                });
            });

            // Osvežavanje tabele
            refreshBtn.addEventListener('click', function() {
                refreshBtn.classList.add('btn-loading');
                refreshTable();
            });

            function refreshTable() {
                fetch('/kupci')
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTableBody = doc.getElementById('kupciTableBody');
                    if (newTableBody) {
                        document.getElementById('kupciTableBody').innerHTML = newTableBody.innerHTML;
                    }
                })
                .catch(error => {
                    console.error('Error refreshing table:', error);
                    showToast('Greška', 'Došlo je do greške prilikom osvežavanja tabele.', false);
                })
                .finally(() => {
                    refreshBtn.classList.remove('btn-loading');
                });
            }
        });
    </script>
</body>
</html>
