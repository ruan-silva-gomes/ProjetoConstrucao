<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constru Casa - Cadastro</title>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div id="cadastro-screen">
        
        <div class="login-container"> 
            
            <span class="botao-fechar" onclick="history.back()">&times;</span> 
            
            <div class="login-logo">
                <img src="../imagens/logo_casa.png" alt="Logo" onerror="this.style.display='none'">
            </div>
            
            <div class="login-box">
                <form id="cadastroForm">
                    
                    <input type="text" id="reg-username" placeholder="Nome Completo:" required>
                    <input type="email" id="reg-email" placeholder="Email:" required>
                    
                    <input type="password" id="reg-password" placeholder="Crie uma Senha:" required>
                    <input type="password" id="reg-confirm-password" placeholder="Confirme a Senha:" required>
                    
                    <button type="submit" class="submit-btn">Finalizar Cadastro</button>
    
                </form>
            </div>
        </div>
    </div>

   <script>
        // 1. Seleciona os elementos do HTML
        const logoutBtn = document.getElementById('logoutBtn');
        const userGreetingElement = document.getElementById('userGreeting');

        // 2. DEFINE a função (Cria a receita)
        function loadUserName() {
            const userName = localStorage.getItem('userName');
            
            if (userName) {
                userGreetingElement.textContent = `olá ${userName}`;
            } 
            // OBS: Tirei o 'else' com redirecionamento para parar de recarregar a página sozinha
        }
        
        // 3. EXECUTA a função
        loadUserName(); 

        // 4. Configura o botão de "Sair/Voltar"
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function() {
                // Certifique-se que esse arquivo '../tabela.php' existe mesmo nesse local
                window.location.href = '../pagina_login/index.php'; 
            });
        }
    </script>
</body>
</html>