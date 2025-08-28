<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma za Unos Pitanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 0;
            overflow: hidden;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-container {
            padding: 25px;
        }
        .table-container {
            overflow-x: auto;
            padding: 0 25px 25px 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #f1f1f1;
            font-weight: 600;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
        .alert {
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: none;
        }
        .question-id {
            font-weight: bold;
            color: #0d6efd;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Sistem za Upravljanje Pitanjima</h2>
            <div>Virus Cell Content: IZ</div>
        </div>
        
        <div class="form-container">
            <h3>Dodaj Novo Pitanje</h3>
            <form id="questionForm">
                <div class="mb-3">
                    <label for="user_id" class="form-label">Korisnik</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="">Izaberite korisnika</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="question_text" class="form-label">Pitanje</label>
                    <textarea class="form-control" id="question_text" name="question_text" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Sačuvaj</button>
            </form>
            
            <div id="successAlert" class="alert alert-success mt-3" role="alert">
                Uspešno ste dodali novo pitanje!
            </div>
            <div id="errorAlert" class="alert alert-danger mt-3" role="alert">
                Došlo je do greške pri čuvanju pitanja.
            </div>
        </div>
        
        <div class="table-container">
            <h3>Lista Pitanja</h3>
            <table id="questionsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime i prezime</th>
                        <th>Email</th>
                        <th>Pitanje</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Podaci će biti dinamički popunjeni -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('questionForm');
            const userSelect = document.getElementById('user_id');
            const questionsTable = document.getElementById('questionsTable');
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');
            
            // Podaci iz baze (simulacija)
            const users = [
                { id: 2, name: 'Luka Lake', email: 'MAC7032@gmail.com' },
                { id: 3, name: 'Pica Park', email: 'peve8.com' },
                { id: 4, name: 'Mina Mayanovic', email: 'mba@pq.com' },
                { id: 6, name: 'admin', email: 'admin@example.com' },
                { id: 7, name: 'Mesa Kalke', email: 'mesa@gmail.com' }
            ];
            
            const questions = [
                { id: 1, user_id: 2, question: 'Kako da poboljšam performanse svog veb sajta?' },
                { id: 2, user_id: 3, question: 'Koji je najbolji način za učenje programiranja?' }
            ];
            
            // Popunjavanje dropdown-a sa korisnicima
            function populateUserSelect() {
                userSelect.innerHTML = '<option value="">Izaberite korisnika</option>';
                users.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = user.name;
                    userSelect.appendChild(option);
                });
            }
            
            // Popunjavanje tabele sa pitanjima
            function populateQuestionsTable() {
                const tbody = questionsTable.querySelector('tbody');
                tbody.innerHTML = '';
                
                questions.forEach(q => {
                    const user = users.find(u => u.id === q.user_id);
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="question-id">${q.id}</td>
                        <td>${user ? user.name : 'Nepoznat korisnik'}</td>
                        <td>${user ? user.email : ''}</td>
                        <td>${q.question}</td>
                    `;
                    tbody.appendChild(row);
                });
            }
            
            // Inicijalno popunjavanje
            populateUserSelect();
            populateQuestionsTable();
            
            // Dodavanje novog pitanja
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const userId = parseInt(userSelect.value);
                const questionText = document.getElementById('question_text').value;
                
                if (!userId || !questionText) {
                    errorAlert.textContent = 'Molimo popunite sva polja.';
                    errorAlert.style.display = 'block';
                    successAlert.style.display = 'none';
                    return;
                }
                
                // Simulacija slanja podataka na server
                try {
                    // Ovde bi bio AJAX poziv ili fetch ka serveru
                    // Simuliramo uspešan odgovor
                    
                    // Dodajemo novo pitanje u listu
                    const newQuestion = {
                        id: questions.length > 0 ? Math.max(...questions.map(q => q.id)) + 1 : 1,
                        user_id: userId,
                        question: questionText
                    };
                    
                    questions.push(newQuestion);
                    
                    // Ažuriramo prikaz
                    populateQuestionsTable();
                    
                    // Prikazujemo poruku o uspehu
                    successAlert.style.display = 'block';
                    errorAlert.style.display = 'none';
                    
                    // Resetujemo formu
                    form.reset();
                    
                    // Sakrijemo poruku nakon 3 sekunde
                    setTimeout(() => {
                        successAlert.style.display = 'none';
                    }, 3000);
                } catch (error) {
                    errorAlert.textContent = 'Došlo je do greške pri čuvanju pitanja: ' + error.message;
                    errorAlert.style.display = 'block';
                    successAlert.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>