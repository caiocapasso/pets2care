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
        <div id="form" class="text-center col-6 mx-auto align-content-center">
            <form method="POST" action="" id="user-register-form" style="margin:50px" enctype='multipart/form-data'>
                <h3>Formulário de Cadastro de Adoção</h3>
                <!--NOME-->
                <div class="form-group">
                    <label for="inputPetNome">Nome do Animal</label>
                    <input required minlength="1" maxlength="30" type="text" class="form-control" name="inputPetNome" placeholder="Nome do Animal">
                </div>
                <!-- ESPECIE -->
                <div class="form-group">
                <label for="inputPetEspecie">Espécie do Animal</label>
                <select required class="custom-select" name="inputPetEspecie">
                        <option value="Cachorro">Cachorro</option>
                        <option value="Gato">Gato</option>
                    </select>
                </div>
                <!--RAÇA-->
                <div class="form-group">
                    <label for="inputPetRaca">Raça do Animal</label>
                    <input required minlength="1" maxlength="30" type="text" class="form-control" name="inputPetRaca" placeholder='Raça do Animal (ou SRD para "Sem Raça Definida")'>
                </div>
                <!--NASCIMENTO-->
                <div class="form-group">
                    <label for="inputPetNascimento">Data de Nascimento (Aproximada) do Animal</label>
                    <input required type="date" name="inputPetNascimento" max="2020-12-31" min="1900-01-01" class="form-control">
                </div>
                <!--SEXO-->
                <div class="form-group">
                    <label for="inputPetSexo">Sexo do Animal</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" id="inputPetSexM" name="inputPetSexo" value="Macho">
                            <label class="form-check-label" for="inputPetSexM">Macho</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" id="inputPetSexF" name="inputPetSexo" value="Fêmea">
                            <label class="form-check-label" for="inputPetSexF">Fêmea</label>
                        </div>
                    </div>
                </div>
                <!--VACINADO-->
                <div class="form-group">
                    <label for="inputPetVacinado">Vacinado?</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" id="inputPetVaccinatedY" name="inputPetVacinado" value="Sim">
                            <label class="form-check-label" for="inputPetVaccinatedY">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" id="inputPetVaccinatedN" name="inputPetVacinado" value="Não">
                            <label class="form-check-label" for="inputPetVaccinatedN">Não</label>
                        </div>
                    </div>
                </div>
                <!--VERMIFUGADO-->
                <div class="form-group">
                    <label for="inputPetVermifugado">Vermifugado?</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" id="inputPetVermifugatedY" name="inputPetVermifugado" value="Sim">
                            <label class="form-check-label" for="inputPetVermifugatedY">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" id="inputPetVermifugatedN" name="inputPetVermifugado" value="Não">
                            <label class="form-check-label" for="inputPetVermifugatedN">Não</label>
                        </div>
                    </div>
                </div>
                <!--CASTRADO-->
                <div class="form-group">
                    <label for="inputPetCastrado">Castrado?</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" id="inputPetCastratedY" name="inputPetCastrado" value="Sim">
                            <label class="form-check-label" for="inputPetCastratedY">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input required class="form-check-input" type="radio" id="inputPetCastratedN" name="inputPetCastrado" value="Não">
                            <label class="form-check-label" for="inputPetCastratedN">Não</label>
                        </div>
                    </div>
                </div>
                <!--DEFICIT-->
                <div class="form-group">
                    <label for="inputPetDeficit">Deficiências e Necessidades Especiais do Animal</label>
                    <textarea minlength="0" maxlength="3000" class="form-control" name="inputPetDeficit" id="inputPetDeficit" placeholder="Descreva as eventuais Deficiências e Necessidades Especiais do animal" rows="5"></textarea>
                </div>
                <!--DESCRICAO-->
                <div class="form-group">
                    <label for="inputPetDescricao">Descrição e Demais Observações a Respeito do Animal</label>
                    <textarea required minlength="0" maxlength="3000" class="form-control" name="inputPetDescricao" id="inputPetDescricao" placeholder="Descreva e cite outras informações importantes a respeito do animal aqui" rows="5"></textarea>
                </div>
                <!--FOTOS-->
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto do Animal</label>
                    <input required type="file" accept="image/*" class="form-control-file" name="inputPetArquivo" id="exampleFormControlFile1">
                </div>
                <button name="submit-product-register" type="submit" class="btn btn-primary">Cadastrar</button>
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

if (isset($_POST['submit-product-register'])) {
    $product->incluir();
}
?>