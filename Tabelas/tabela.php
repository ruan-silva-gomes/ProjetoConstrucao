<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constru Casa - Dashboard</title>
    <link rel="stylesheet" href="_css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* ===== Modal de senha (Fundo escuro) ===== */
        .modal-senha {
            display: flex;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
        }

        /* ===== Conteúdo do Modal (Card Branco) ===== */
        .modal-content {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            position: relative; 
        }

        .modal-content h2 { margin-bottom: 15px; }

        .modal-content input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal-content button {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-confirmar {
            background: #198754;
            color: white;
        }

        .btn-confirmar:hover { background: #157347; }

        .botao-fechar {
            position: absolute;
            top: -10px;    
            right: -10px;  
            background-color: #ff3b30;
            color: white;             
            font-size: 18px;          
            font-weight: bold;
            width: 28px;              
            height: 28px;
            border-radius: 50%;       
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1; 
            cursor: pointer;          
            z-index: 10;              
        }

        .botao-fechar:hover { background-color: #cc0000; }
        
        #dashboard-screen { display: none; }

        /* ============================================================ */
        /* 🆕 NOVO CSS PARA O BOTÃO DE CADASTRO E ALINHAMENTO DO HEADER */
        /* ============================================================ */
        
        /* Garante que o header alinhe as coisas para a direita */
        .user-area {
            display: flex;
            flex-direction: column; /* Coloca um item embaixo do outro */
            align-items: flex-end;  /* Alinha tudo à direita */
            justify-content: center;
            gap: 5px; /* Espaço entre o olá e o botão */
        }

        /* Linha superior (Olá usuário + Porta de sair) */
        .user-top-row {
            display: flex;
            align-items: center;
            gap: 15px; /* Espaço entre o nome e a porta */
            font-size: 1.2rem;
        }

        /* Estilo do novo botão Cinza */
        .btn-cadastro-usuario {
            background-color: #e0e0e0; /* Cinza claro */
            color: #333;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 20px; /* Borda redonda estilo "Pílula" */
            font-size: 0.9rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px; /* Espaço entre texto e ícone */
            transition: background 0.3s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .btn-cadastro-usuario:hover {
            background-color: #c0c0c0; /* Cinza mais escuro ao passar mouse */
            color: #000;
        }
        
        /* Ajuste do ícone dentro do botão */
        .btn-cadastro-usuario i {
            font-size: 1.2rem;
        }

    </style>
</head>
<body>

    <div id="senhaModal" class="modal-senha">
        <div class="modal-content">
            <span class="botao-fechar">&times;</span> 

            <h2>Digite a senha de acesso</h2>
            <input type="password" id="senhaInput" placeholder="Senha">
            <button class="btn-confirmar" id="confirmarSenha">Entrar</button>
            
            </div>
    </div>

    <div> <header class="header">
            <div class="logo-area">
                <div class="dashboard-logo">
                    <img src="../imagens/logo_casa.png" alt="Logo Constru Casa">
                </div>
                <span class="company-name">Constru Casa</span>
            </div>
            
            <div class="user-area">
                
                <div class="user-top-row">
                    <span class="user-greeting" id="userGreeting">olá usuário</span>
                    <i class="bi bi-door-open-fill" id="logoutBtn" style="cursor:pointer;" title="Sair do sistema"></i> 
                </div>

                <a href="http://localhost/aula_PHP/ProjetoConstrucao/pagina_cadastro/" class="btn-cadastro-usuario">
                    Cadastro usuário 
                    <i class="bi bi-person-circle"></i>
                </a>

            </div>
        </header>

        <main class="main-content">
            <nav class="sidebar">
                <ul>
                    <li class="menu-item">
                        <a href="./tabelaCadastro/index.php"><i class="bi bi-tools"></i> Tabela de Cadastro</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/aula_PHP/ProjetoConstrucao/Tabelas/tabelaEntradaSaida/"><i class="bi bi-boxes"></i> Tabela de Entrada e Saida</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/aula_PHP/ProjetoConstrucao/Tabelas/gestaoTabela/gestaoEstoque.php"><i class="bi bi-cart-plus"></i> Gestão de estoque</a>
                    </li>
                </ul>
            </nav>

            <section class="content-area">
                <h1>Bem-vindo à gestão de Tabelas!</h1>
                <p>Use o menu lateral para navegar pelas funcionalidades do sistema.</p>
            </section>
        </main>
    </div>

    <script>
        const modal = document.getElementById('senhaModal');
        // IMPORTANTE: Como removi o ID dashboard-screen do HTML acima (parecia estar sobrando ou no lugar errado no original), 
        // certifique-se que o header/main estão visíveis ou ajuste conforme sua lógica de 'display: none'.
        // No código original, havia uma div envolvendo o header sem ID. Vou assumir que você quer ocultar TUDO exceto o modal.
        // Vou pegar o container principal (a div após o modal).
        const mainContainer = document.querySelector('body > div:nth-child(2)'); 
        
        // Esconde o conteúdo principal inicialmente
        if(mainContainer) mainContainer.style.display = 'none';

        const senhaInput = document.getElementById('senhaInput');
        const confirmarBtn = document.getElementById('confirmarSenha');
        const logoutBtn = document.getElementById('logoutBtn');
        const userGreetingElement = document.getElementById('userGreeting');
        const botaoFechar = document.querySelector('.botao-fechar'); 

        // === Senha de acesso ===
        const senhaCorreta = "1234"; 

       

        // === Quando clicar em "Entrar" ===
        confirmarBtn.addEventListener('click', function() {
            if (senhaInput.value === senhaCorreta) {
                modal.style.display = 'none';
                if(mainContainer) mainContainer.style.display = 'block'; // Mostra o painel
                loadUserName();
            } else {
                alert("Senha incorreta!");
                senhaInput.value = "";
            }
        });

        // === Enter também confirma ===
        senhaInput.addEventListener('keypress', function(e) {
            if (e.key === "Enter") {
                confirmarBtn.click();
            }
        });
        
        // === Clique no Botão "X" ===
        botaoFechar.addEventListener('click', function() {
            window.location.href = '../paginainicial/index.php';
        });

        // === Botão de saída (logout) ===
        logoutBtn.addEventListener('click', function() {
            window.location.href = '../paginainicial/index.php';
        });
    </script>
</body>
</html>