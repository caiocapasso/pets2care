<?php
require_once(dirname(__DIR__) . "/model/user.php");

class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function incluir()
    {
        $result = $this->model->incluir(
            trim($_POST["inputEmail"]),
            trim($_POST["inputSenha"]),
            trim($_POST["inputSenhaRepetir"]),
            trim($_POST["inputNome"]),
            trim($_POST["inputGenero"]),
            trim($_POST["inputNascimento"]),
            trim($_POST["inputTel"]),
            trim($_POST["inputEndereco"])
        );

        if ($result == 'sucesso') {
            echo "<script>alert('Usuário criado com sucesso!');document.location='../view/home.php';</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro! {$result}')</script>";
        }
    }

    public function alterar()
    {
        $result = $this->model->alterar(
            $_SESSION["usuarioLogado"]["ID"],
            trim($_POST["inputEmail"]),
            trim($_POST["inputSenha"]),
            trim($_POST["inputSenhaRepetir"]),
            trim($_POST["inputNome"]),
            trim($_POST["inputGenero"]),
            trim($_POST["inputNascimento"]),
            trim($_POST["inputTel"]),
            trim($_POST["inputEndereco"])
        );

        if ($result == 'sucesso') {
            echo "<script>alert('Usuário alterado com sucesso!');document.location='../view/home.php';</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro! {$result}')</script>";
        }
    }

    public function verTodos()
    {
        $result = $this->model->verTodos();


        if (!empty($result)) {
            echo "<div class='overflow-auto'>";
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th scope='col'>Id</th>";
            echo "<th scope='col'>Admin</th>";
            echo "<th scope='col'>E-mail</th>";
            echo "<th scope='col'>Senha</th>";
            echo "<th scope='col'>Nome</th>";
            echo "<th scope='col'>Gênero</th>";
            echo "<th scope='col'>Nascimento</th>";
            echo "<th scope='col'>Tel. Contato</th>";
            echo "<th scope='col'>Endereço</th>";
            echo "<th scope='col'>Data Cadastro</th>";
            echo "<th scope='col'>Excluir</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($result as $value) {

                echo "<tr>";
                echo "<td>{$value["ID"]}</td>";
                echo "<td>{$value["isAdmin"]}</td>";
                echo "<td>{$value["email"]}</td>";
                echo "<td>{$value["senha"]}</td>";
                echo "<td>{$value["nome"]}</td>";
                echo "<td>{$value["genero"]}</td>";
                echo "<td>{$value["nascimento"]}</td>";
                echo "<td>{$value["telefone"]}</td>";
                echo "<td>{$value["endereco"]}</td>";
                echo "<td>{$value["dataCadastro"]}</td>";
                echo "<td> <a href='home.php?removerUsuarioPorId=true&usuarioId={$value["ID"]}'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<h6 style='align-self:center; width:100%;'>Nenhum usuário encontrado. Utilize a tela <a href='user-register.php'>'Criar Usuário'</a> para começar!</h6>";
        }
    }

    public function pegarDadosUsuarioPorId($id)
    {
        return $this->model->verPorId($id);
    }

    public function removerPorId($id)
    {
        $result = $this->model->removerPorId($id);

        if ($result) {
            echo "<script>alert('Usuario removido com sucesso!');document.location='../view/home.php';</script>";
        } else {
            echo "<script>alert('Usuario não encontrado!');</script>";
        }
    }

    public function loginUsuario()
    {
        $result = $this->model->executarLogin(
            $_POST["inputEmail"],
            $_POST["inputSenha"]
        );

        if ($result == true) {
            echo "<script>alert('Usuário logado com sucesso! Redirecionando para tela de perfil'); document.location='../view/user-profile.php?usuarioLogado={$result}';</script>";
        } else {
            echo "<script>alert('Erro: usuário não encontrado! Tente novamente');</script>";
        }
    }

    public function logoutUsuario()
    {
        unset($_SESSION['usuarioLogado']);
        echo "<script>alert('Logout realizado com sucesso!'); document.location='../view/home.php';</script>";
    }

    public function redirecionarUsuario()
    {
        echo "<script>alert('Usuário não autorizado! Realize o Cadastro e Login primeiro'); document.location='../view/home.php';</script>";
    }
}

$user = new UserController();

if (isset($_GET['removerUsuarioPorId'])) {
    $user->removerPorId($_GET["usuarioId"]);
}

// if (!isset($_POST['submit-user-edit']) && isset($_SESSION['usuarioLogado'])) {
//     $recoveredUser = $user->preencherPerfil($_SESSION["usuarioLogado"]);
// }