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
            <h3 class="text-center text-primary" style="margin-bottom:50px">Registre-se em nosso portal e entre nesse
                time que deseja fazer o bem.<br> É totalmente gratuito!</h3>
            <ul class="list-unstyled text-center align-content-center">
                <li>
                    <h5><i class="fa fa-paw" style="margin-right:20px"></i>Preencha todos os dados abaixo para fazer seu
                        cadastro e ter acesso à plataforma de cadastro e
                        busca
                        de bichos para adoção. Através dela você poderá entrar em contato com centenas de outros
                        benfeitores no Brasil todo.</h5>
                </li>
                <li>
                    <h5><i class="fa fa-paw" style="margin-right:20px"></i>Utilize nosso portal para cadastrar os bichos
                        que você tem para adoção, preenchendo um perfil
                        super completo do animal.
                </li>
                <li>
                    <h5><i class="fa fa-paw" style="margin-right:20px"></i>Utilize nosso portal para encontrar um animal
                        para adotar e fazer parte de sua família.</h5>
                </li>
            </ul>
            <div class="border-top"></div>
            <div id="form" class="text-center col-6 mx-auto align-content-center">
                <form method="POST" action="" id="user-register-form" style="margin:50px">
                    <h3>Formulário de Cadastro</h3>
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
                    <!--REPETIR SENHA-->
                    <div class="form-group">
                        <label for="inputSenhaRepetir">Repetir Senha</label>
                        <input required minlength="1" maxlength="30" type="password" class="form-control" name="inputSenhaRepetir" placeholder="Repetir Senha">
                    </div>
                    <!--NOME-->
                    <div class="form-group">
                        <label for="inputNome">Nome Completo</label>
                        <input required minlength="1" maxlength="30" type="text" class="form-control" name="inputNome" placeholder="Nome Completo">
                    </div>
                    <!--GÊNERO-->
                    <div class="form-group">
                        <label for="inputGenero">Gênero</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="inputGenero" value="Masculino">
                                <label class="form-check-label" for="inputMasculino">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="inputGenero" value="Feminino">
                                <label class="form-check-label" for="inputFeminino">Feminino</label>
                            </div>
                        </div>
                    </div>
                    <!--NASCIMENTO-->
                    <div class="form-group">
                        <label for="inputNascimento">Data de Nascimento</label>
                        <input required type="date" name="inputNascimento" max="2020-12-31" min="1900-01-01" class="form-control">
                    </div>
                    <!--TEL RESIDENCIAL-->
                    <div class="form-group">
                        <label for="inputTel">Telefone de Contato</label>
                        <input required minlength="1" maxlength="30" type="tel" class="form-control" name="inputTel" placeholder="Telefone de Contato">
                    </div>
                    <!--ENDEREÇO-->
                    <div class="form-group">
                        <label for="inputTelComercial">Endereço</label>
                        <input required minlength="1" maxlength="50" type="text" class="form-control" name="inputEndereco" placeholder="Endereço Completo">
                    </div>
                    <button name="submit-user-register" type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
                <div>
                </div>
            </div>
        </div>
    </div>
    <?php include("_footer.php"); ?>

</html>

<?php 
if (isset($_POST['submit-user-register'])) {
    $user->incluir();
}
?>
