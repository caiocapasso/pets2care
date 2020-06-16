<?php
session_start();
require_once(dirname(__DIR__) . "/controller/product.php");
require_once(dirname(__DIR__) . "/controller/user.php");
?>

<html>

<?php include("_head.php") ?>

<body>
    <?php include("_header.php"); ?>
    <div id="content" class="row justify-content-center text-center" style="margin: 50px 25px 50px 25px">
        <h1>Usuários Cadastrados</h1>
        <?php $user->verTodos();  ?>
        <h1>Animais Cadastrados</h1>
        <?php $product->verTodos();  ?>
    </div>
    <pre>
    <?php include("_footer.php"); ?>
</body>

<?php
if (!isset($_SESSION['usuarioLogado'])) {
    $user->redirecionarUsuario();
}

if (isset($_SESSION['usuarioLogado']) && $_SESSION['usuarioLogado']["isAdmin"] != 1) {
    $user->redirecionarUsuario();
}
?>

</html>