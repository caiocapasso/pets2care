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
        <div class="col-10 d-flex flex-column">
            <img src="../content/img/PETS2LOVE_COMPLETO.png" class="img-fluid mx-auto" style="max-width:50%; height:auto; margin-bottom:20px" alt="Responsive image">
            <div class="d-flex align-items-center">
                <h4 class="text-success mx-auto col-7">O abandono de animais, em especial os animais domésticos, como cães e gatos, é um problema que afeta de maneira cada vez mais intensa os grandes centros urbanos ao redor do mundo</h4>
                <img src="../content/img/Dog_06.jpg" class="img-fluid col-5" style="margin-left: 20px; width:40%" alt="Responsive image">
            </div>
            <span style="margin-bottom: 50px;"></span>
            <div class="d-flex flex-column">
                <h4 class="text-success mx-auto">O petS2care tem como propósito diminuir os índices de abandono de animais, ser a ponte entre doador e adotante, e centralizar a base de dados de animais disponíveis para adoção no Brasil.</h4>
                <img src="../content/img/Background2.jpg" class="img-fluid" style="width:100%; height:auto;" alt="Responsive image">
            </div>
        </div>
    </div>
    <?php include("_footer.php"); ?>
</body>

<?php
if (isset($_GET['logoutUsuario'])) {
    $user->logoutUsuario($_SESSION["usuarioLogado"]);
}
?>

</html>