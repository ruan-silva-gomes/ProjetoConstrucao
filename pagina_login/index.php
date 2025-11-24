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
                    
                    <button type="button" class="register-btn" onclick="window.location.href='../pagina_cadastro/index.php'">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Adiciona um "ouvinte" para quando o formulário for enviado (submit)
        document.getElementById('loginForm').addEventListener('submit', (e) => {
            
            // Impede que a página recarregue (comportamento padrão do HTML)
            e.preventDefault(); 
            
            // Pega os valores digitados nos campos
            const nome = document.getElementById('username').value;
            const senha = document.getElementById('password').value;

            // Lógica de Validação: Verifica se a senha é '123' E se tem nome digitado
            if (senha === '123' && nome) {
                
                // Salva o nome no navegador para usar na próxima página
                localStorage.setItem('userName', nome);
                
                // Redireciona para a página inicial (Dashboard)
                window.location.href = '../paginainicial/index.php'; 
            } else {
                // Se a senha estiver errada:
                alert('Credenciais inválidas '); 
            }
        });
    </script>
</body>
</html>