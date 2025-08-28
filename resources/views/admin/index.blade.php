<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #34495e;
            --accent: #3498db;
            --danger: #e74c3c;
            --success: #2ecc71;
            --warning: #f39c12;
            --light: #ecf0f1;
            --dark: #2c3e50;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .admin-header {
            background: var(--primary);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .admin-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            height: 100%;
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        
        .card-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            margin: 0 auto 20px;
        }
        
        .orders-icon {
            background: var(--accent);
        }
        
        .employees-icon {
            background: var(--success);
        }
        
        .products-icon {
            background: var(--warning);
        }
        
        .customers-icon {
            background: var(--danger);
        }
        
        .admin-card h3 {
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .admin-card p {
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        
        .admin-btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            margin: 5px;
        }
        
        .btn-orders {
            background: var(--accent);
            color: white;
        }
        
        .btn-orders:hover {
            background: #2980b9;
        }
        
        .btn-employees {
            background: var(--success);
            color: white;
        }
        
        .btn-employees:hover {
            background: #27ae60;
        }
        
        .btn-products {
            background: var(--warning);
            color: white;
        }
        
        .btn-products:hover {
            background: #e67e22;
        }
        
        .btn-customers {
            background: var(--danger);
            color: white;
        }
        
        .btn-customers:hover {
            background: #c0392b;
        }
        
        .quick-actions {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            text-decoration: none;
            color: var(--primary);
            transition: all 0.3s ease;
        }
        
        .action-btn:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-3px);
        }
        
        .action-btn i {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .stats-section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .stat-item {
            text-align: center;
            padding: 15px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .stat-label {
            color: #7f8c8d;
            font-size: 1rem;
        }
        
        .admin-footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header text-center">
            <h1><i class="fas fa-cog me-2"></i>Admin Panel</h1>
            <p class="lead">Dobrodošli u kontrolni panel administracije</p>
        </div>
        
        <div class="dashboard-cards">
            <div class="admin-card">
                <div class="card-icon orders-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>Upravljanje porudžbinama</h3>
                <p>Pregledajte, izmenite i upravljajte svim porudžbinama.</p>
                <div>
                    <a href="/admin/porudzbine" class="admin-btn btn-orders">Pregled porudžbina</a>
                    <a href="/admin/porudzbine/create" class="admin-btn btn-orders">Nova porudžbina</a>
                </div>
            </div>
            
            <div class="admin-card">
                <div class="card-icon employees-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Upravljanje zaposlenima</h3>
                <p>Dodajte, izmenite ili uklonite zaposlene.</p>
                <div>
                    <a href="/admin/zaposleni" class="admin-btn btn-employees">Pregled zaposlenih</a>
                    <a href="/admin/zaposleni/create" class="admin-btn btn-employees">Novi zaposleni</a>
                </div>
            </div>
            
            <div class="admin-card">
                <div class="card-icon products-icon">
                    <i class="fas fa-box"></i>
                </div>
                <h3>Upravljanje proizvodima</h3>
                <p>Dodajte, izmenite ili uklonite proizvode iz ponude.</p>
                <div>
                    <a href="/admin/proizvodi" class="admin-btn btn-products">Pregled proizvoda</a>
                    <a href="/admin/proizvodi/create" class="admin-btn btn-products">Novi proizvod</a>
                </div>
            </div>
            
            <div class="admin-card">
                <div class="card-icon customers-icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <h3>Upravljanje kupcima</h3>
                <p>Pregledajte i upravljajte podacima o kupcima.</p>
                <div>
                    <a href="/kupci" class="admin-btn btn-customers">Pregled kupaca</a>
                </div>
            </div>
        </div>
        
        
        
        <div class="admin-footer">
            <p>© 2023 Admin Panel. Sva prava zadržana.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Dodatna interaktivnost
        document.addEventListener('DOMContentLoaded', function() {
            // Animacija brojeva u statistici
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(number => {
                const target = parseInt(number.textContent);
                let count = 0;
                const duration = 2000;
                const steps = 50;
                const increment = target / steps;
                const stepTime = duration / steps;
                
                const timer = setInterval(() => {
                    count += increment;
                    if (count >= target) {
                        number.textContent = target;
                        clearInterval(timer);
                    } else {
                        number.textContent = Math.round(count);
                    }
                }, stepTime);
            });
        });
    </script>
</body>
</html>