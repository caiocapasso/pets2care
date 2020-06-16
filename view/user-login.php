<?php
session_start();
require_once(dirname(__DIR__) . "/controller/product.php");
require_once(dirname(__DIR__) . "/controller/user.php");
?>

<html>

<?php include("_head.php") ?>

<body>
    <?php include("_header.php"); ?>
    <div id="content" class="justify-content-center text-center" style="margin: 50px 25px 50px 25px">
        <div id="form" class="text-center col-6 mx-auto align-content-center">
            <form method="POST" action="" id="user-edit-form" style="margin:50px">
                <h3>Realizar Login</h3>
                <!--EMAIL-->
                <div class="form-group">
                    <label for="inputEmail">E-mail</label>
                    <input required minlength="1" maxlength="30" type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="E-mail">
                </div>
                <!--SENHA-->
                <div class="form-group">
                    <label for="inputSenha">Senha</label>
                    <input required minlength="1" maxlength="30" type="password" class="form-control" name="inputSenha" placeholder="Senha">
                </div>
                <button name="submit-user-login" type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
        <div class="d-flex flex-column">
            <a href="user-register.php">
                <p class="text-center text-primary" style="margin-bottom:50px">Registre-se em nosso portal e entre nesse time que deseja fazer o bem.<br> É totalmente gratuito!</p>
            </a>

        </div>
    </div>
    <?php include("_footer.php"); ?>
</body>

</html>

<?php
if (isset($_POST['submit-user-login'])) {
    $user->loginUsuario();
}
?>