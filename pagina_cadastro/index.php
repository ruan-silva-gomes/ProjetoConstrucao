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
                    
                    <button type="button" class="back-btn" onclick="history.back()">Voltar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // 1. Seleciona o formulário e fica "ouvindo" quando o botão de enviar for clicado
        document.getElementById('cadastroForm').addEventListener('submit', (e) => {
            
            // 2. 'preventDefault' impede que a página recarregue/pisque (padrão do HTML)
            // Isso nos deixa controlar a validação antes de enviar.
            e.preventDefault(); 
            
            // 3. Captura os elementos do HTML para usarmos seus valores
            const nome = document.getElementById('reg-username').value; // Pega apenas o texto
            const senha = document.getElementById('reg-password');       // Pega o elemento inteiro (input)
            const confirm = document.getElementById('reg-confirm-password'); // Pega o elemento inteiro

            // 4. Validação: Verifica se as senhas são DIFERENTES
            if (senha.value !== confirm.value) {
                // Truque: Limpa os dois campos ao mesmo tempo
                senha.value = confirm.value = ''; 
                
                // Coloca o cursor piscando de volta no campo de senha para o usuário digitar
                senha.focus(); 
                
                // 'return' PARA o código aqui. O alerta aparece e nada abaixo é executado.
                return alert("Erro: As senhas não coincidem!");
            }

            // 5. Validação: Verifica se a senha é muito curta
            if (senha.value.length < 3) {
                return alert("A senha deve ter pelo menos 3 caracteres.");
            }

            // 6. Se o código chegou até aqui, não houve erros. Mostra sucesso.
            alert(`Cadastro realizado para ${nome}!`);
            
            // 7. Redireciona o usuário para a tela de login (index.html)
            window.location.href = 'index.html'; 
        });
    </script>
</body>
</html>