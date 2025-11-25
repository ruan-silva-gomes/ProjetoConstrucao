

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constru Casa - Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div id="login-screen">
        <div class="login-container"> 
            
            <div class="login-logo">
                <img src="../imagens/logo_casa.png" alt="Logo Constru Casa" onerror="this.style.display='none'">
            </div>
            
            <div class="login-box">
                <form id="loginForm">
                    
                    <input type="text" id="username" placeholder="Nome:" required>
                    
                    <input type="email" id="email" placeholder="Email:" required>
                    <input type="password" id="password" placeholder="Senha:" required>
                    
                    <button type="submit" class="submit-btn">Concluído</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', (e) => {
            e.preventDefault(); 
            
            // Pega os 3 valores
            const nome = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            const submitBtn = document.querySelector('.submit-btn');

            submitBtn.disabled = true;
            submitBtn.textContent = 'Verificando...';

            // Envia os 3 valores para o PHP
            fetch('login.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ 
                    nome: nome,        // Enviando o nome
                    email: email, 
                    password: password 
                })
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Concluído';

                if (data.success) {
                    localStorage.setItem('userName', data.nome);
                    window.location.href = '../paginainicial/index.php'; 
                } else {
                    // Mensagem de erro genérica para segurança, ou a que vem do PHP
                    alert(data.message); 
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                submitBtn.disabled = false;
                submitBtn.textContent = 'Concluído';
                alert('Erro de conexão.');
            });
        });
    </script>
</body>
</html> 