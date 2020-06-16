<?php
session_start();
require_once(dirname(__DIR__) . "/controller/product.php");
require_once(dirname(__DIR__) . "/controller/user.php");
?>

<html>

<?php 
if (isset($_SESSION['usuarioLogado'])) {
    $recoveredUser = $user->pegarDadosUsuarioPorId($_SESSION["usuarioLogado"]["ID"]);
}
?>

<?php include("_head.php") ?>

<body>
    <?php include("_header.php"); ?>
    <div id="content" class="row justify-content-center text-center" style="margin: 50px 25px 50px 25px">
        <h3>Meus Animais Anunciados</h3>
        <?php $product->verTodosPorUsuario($_SESSION["usuarioLogado"]["ID"]); ?>
        <div id="form" class="text-center col-6 mx-auto align-content-center">
            <form method="POST" action="" id="user-edit-form" style="margin:50px">
                <h3>Atualizar Dados de Usuário</h3>
                <!--EMAIL-->
                <div class="form-group">
                    <label for="inputEmail">E-mail</label>
                    <input required value="<?php echo $recoveredUser["email"]; ?>" minlength="1" maxlength="30" type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="E-mail">
                </div>
                <!--SENHA-->
                <div class="form-group">
                    <label for="inputSenha">Nova Senha</label>
                    <input required value="<?php echo $recoveredUser["senha"]; ?>" minlength="1" maxlength="30" type="password" class="form-control" name="inputSenha" placeholder="Senha">
                </div>
                <!--REPETIR SENHA-->
                <div class="form-group">
                    <label for="inputSenhaRepetir">Repetir Nova Senha</label>
                    <input required value="<?php echo $recoveredUser["senha"]; ?>" minlength="1" maxlength="30" type="password" class="form-control" name="inputSenhaRepetir" placeholder="Repetir Senha">
                </div>
                <!--NOME-->
                <div class="form-group">
                    <label for="inputNome">Nome Completo</label>
                    <input required value="<?php echo $recoveredUser["nome"]; ?>" minlength="1" maxlength="30" type="text" class="form-control" name="inputNome" placeholder="Nome Completo">
                </div>
                <!--GÊNERO-->
                <div class="form-group">
                    <label for="inputGenero">Gênero</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" name="inputGenero" value="Masculino" <?php echo ($recoveredUser["genero"] == 'Masculino') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="inputMasculino">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" name="inputGenero" value="Feminino" <?php echo ($recoveredUser["genero"] == 'Feminino') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="inputFeminino">Feminino</label>
                        </div>
                    </div>
                </div>
                <!--NASCIMENTO-->
                <div class="form-group">
                    <label for="inputNascimento">Data de Nascimento</label>
                    <input required value="<?php echo $recoveredUser["nascimento"]; ?>" type="date" name="inputNascimento" max="2020-12-31" min="1900-01-01" class="form-control">
                </div>
                <!--TEL RESIDENCIAL-->
                <div class="form-group">
                    <label for="inputTel">Telefone de Contato</label>
                    <input required value="<?php echo $recoveredUser["telefone"]; ?>" minlength="1" maxlength="30" type="tel" class="form-control" name="inputTel" placeholder="Telefone de Contato">
                </div>
                <!--ENDEREÇO-->
                <div class="form-group">
                    <label for="inputEndereco">Endereço</label>
                    <input required value="<?php echo $recoveredUser["endereco"]; ?>" minlength="1" maxlength="50" type="text" class="form-control" name="inputEndereco" placeholder="Endereço Completo">
                </div>
                <button name="submit-user-edit" type="submit" class="btn btn-primary">Atualizar Cadastro</button>
            </form>
        </div>
    </div>
    <?php include("_footer.php"); ?>
</body>

</html>
<?php
if (!isset($_SESSION['usuarioLogado'])) {
    $user->redirecionarUsuario();
}

if (isset($_POST['submit-user-edit'])) {
    $user->alterar();
}
?>