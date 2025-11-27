<?php
    session_start();
    require_once("../conexao/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constru Casa - Gestão de Estoque</title>
    
    <link rel="stylesheet" href="./css/style.css"> 
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    
</head> 
 
<body>
    
    <div>
        <header class="header">
            <div class="logo-area">
                <div class="dashboard-logo">
                    <img src="../../imagens/logo_casa.png" alt="Logo Constru Casa">
                </div>
                <span class="company-name">Constru Casa</span>
            </div>
            <div class="user-area">
                <span class="user-greeting" id="userGreeting">olá usuário</span>
               <i class="bi bi-door-open-fill" id="logoutBtn"></i> 
            </div>
        </header>

        <main class="main-content">
            <nav class="sidebar">
                <ul>
                    <li class="menu-item">
                        <a href="http://localhost/aula_PHP/ProjetoConstrucao/Tabelas/tabelaCadastro/"><i class="bi bi-tools"></i> Tabela de Cadastro</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/aula_PHP/ProjetoConstrucao/Tabelas/tabelaEntradaSaida/"><i class="bi bi-boxes"></i>Tabela de Entrada e Saida</a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost/aula_PHP/ProjetoConstrucao/Tabelas/gestaoTabela/gestaoEstoque.php"><i class="bi bi-cart-plus"></i> gestão de estoque</a>
                    </li>
                   
                </ul>
            </nav>

            <section class="content-area">
                <h1 style="color: white; margin-bottom: 20px;">Relatório de Estoque Atual</h1>
                
                <div class="search-area">
                    <input type="text" placeholder="Pesquisar por Código, Produto ou Cor...">
                    <button><i class="bi bi-search"></i> Pesquisar</button>
                </div>
                
                <table class="table table-hover stock-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Cor / Textura</th>
                            <th>Peso/Litro</th>
                            <th>Estoque Atual</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tinta Acrílica Premium</td>
                            <td>Branco Neve / Liso</td>
                            <td>18 Litros</td>
                            <td class="stock-status-cell">45</td>
                            <td><span class="badge bg-success">Em Estoque</span></td>
                            <td><button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Editar</button></td>
                        </tr>
                        <tr class="low-stock-row">
                            <td>2</td>
                            <td>Argamassa AC-III</td>
                            <td>Cinza / Granulada</td>
                            <td>20 Kg</td>
                            <td class="stock-status-cell low-stock">8</td>
                            <td><span class="badge bg-danger">Baixo Estoque</span></td>
                            <td><button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i> Editar</button></td>
                        </tr>
                        
                        </tbody>
                </table>
                
            </section>
        </main>
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
                window.location.href = '../../Tabelas/tabela.php'; 
            });
        }
    </script>
</body>
</html>