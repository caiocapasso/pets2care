<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">pet<span class="text-primary">S2</span>care</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search-dogs.php">Encontrar Cachorros<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search-cats.php">Encontrar Gatos<span class="sr-only">(current)</span></a>
                </li>
                <?php if (!isset($_SESSION['usuarioLogado'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link ml-auto" href="user-login.php">Entrar</a>
                    </li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['usuarioLogado'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link ml-auto" href="user-register.php">Cadastrar Usuário</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['usuarioLogado'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link ml-auto" href="user-profile.php">Perfil de Usuário</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['usuarioLogado'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link ml-auto" href="product-register.php">Criar Anúncio</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['usuarioLogado'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link ml-auto" href="home.php?logoutUsuario=true">Logout</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado']["isAdmin"] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link ml-auto" href="admin.php">Painel Admin</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="staff.php">Equipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Sobre</a>
                </li>
            </ul>
        </div>
    </nav>
</header>