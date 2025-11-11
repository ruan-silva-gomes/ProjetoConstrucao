<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Constru Casa - Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="display:none;"> <!-- Esconde o corpo até a senha ser validada -->
  
  <!-- ✅ Modal de Senha -->
  <div class="modal fade" id="senhaModal" tabindex="-1" aria-labelledby="senhaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3 rounded-4 shadow-lg">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="senhaModalLabel"><i class="bi bi-lock-fill"></i> Acesso Restrito</h5>
        </div>
        <div class="modal-body">
          <p>Digite a senha para acessar o Dashboard:</p>
          <input type="password" id="senhaInput" class="form-control" placeholder="Senha">
          <div id="senhaErro" class="text-danger mt-2" style="display:none;">Senha incorreta!</div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" id="verificarSenhaBtn" class="btn btn-primary w-100">Entrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ✅ Conteúdo do Dashboard -->
  <div id="dashboard-screen" class="container" style="display: flex; flex-direction: column; flex: 1;">
    <header class="header">
      <div class="logo-area">
        <div class="dashboard-logo">
          <img src="../imagens/logo_casa.png" alt="Logo Constru Casa">
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
            <a href="http://localhost/aula_PHP/ProjetoConstrucao/cadastroProduto/"><i class="bi bi-tools"></i> Cadastro de produtos</a>
          </li>
          <li class="menu-item">
            <a href="http://localhost/aula_PHP/ProjetoConstrucao/entradaSaida/"><i class="bi bi-boxes"></i> entrada e saída dos produtos</a>
          </li>
          <li class="menu-item">
            <a href="http://localhost/aula_PHP/ProjetoConstrucao/gestaoEstoque/"><i class="bi bi-cart-plus"></i> gestão de estoque</a>
          </li>
        </ul>
      </nav>

      <section class="content-area">
        <h1>Bem-vindo ao Sistema de Gestão da Constru Casa!</h1>
        <p>Use o menu lateral para navegar pelas funcionalidades do sistema.</p>
        <nav class="sidebar_menu-table">
          <ul>
            <li class="menu-item">
              <a href="http://localhost/aula_PHP/ProjetoConstrucao/Tabelas/tabela.php"><i class="bi bi-table"></i>  Tabelas</a>
            </li>
          </ul>
        </nav>
      </section>
    </main>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const logoutBtn = document.getElementById('logoutBtn');
    const userGreetingElement = document.getElementById('userGreeting');

    // Carrega nome do usuário
    function loadUserName() {
      const userName = localStorage.getItem('userName');
      if (userName) {
        userGreetingElement.textContent = `olá ${userName}`;
      } else {
        window.location.href = '../pagina_login/index.php';
      }
    }

    // Função de Logout
    logoutBtn.addEventListener('click', function() {
      localStorage.removeItem('userName');
      window.location.href = '../pagina_login/index.php';
    });

    loadUserName();

    // ✅ Modal de senha
    const senhaCorreta = "1234"; // altere a senha aqui
    const senhaModal = new bootstrap.Modal(document.getElementById('senhaModal'));
    const verificarBtn = document.getElementById('verificarSenhaBtn');
    const senhaInput = document.getElementById('senhaInput');
    const senhaErro = document.getElementById('senhaErro');

    // Mostra o modal de senha ao carregar
    window.addEventListener('load', () => {
      senhaModal.show();
    });

    // Verifica a senha digitada
    verificarBtn.addEventListener('click', () => {
      if (senhaInput.value === senhaCorreta) {
        senhaErro.style.display = 'none';
        senhaModal.hide();
        document.body.style.display = 'block'; // Mostra o conteúdo
      } else {
        senhaErro.style.display = 'block';
        senhaInput.value = "";
        senhaInput.focus();
      }
    });

    // Permite pressionar Enter
    senhaInput.addEventListener('keypress', e => {
      if (e.key === 'Enter') verificarBtn.click();
    });
  </script>
</body>
</html>
