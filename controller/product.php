<?php
require_once(dirname(__DIR__) . "/model/product.php");

class ProductController
{
    private $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function incluir()
    {

        $result = $this->model->incluir(
            trim($_SESSION["usuarioLogado"]["ID"]),
            trim($_POST["inputPetNome"]),
            trim($_POST["inputPetEspecie"]),
            trim($_POST["inputPetRaca"]),
            trim($_POST["inputPetNascimento"]),
            trim($_POST["inputPetSexo"]),
            trim($_POST["inputPetVacinado"]),
            trim($_POST["inputPetVermifugado"]),
            trim($_POST["inputPetCastrado"]),
            trim($_POST["inputPetDeficit"]),
            trim($_POST["inputPetDescricao"]),
            $_FILES['inputPetArquivo']['name']
        );

        if ($result == 'sucesso') {
            echo "<script>alert('Anúncio incluído com sucesso!');document.location='../view/home.php';</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro! {$result}')</script>";
        }
    }

    public function shorten($string, $max)
    {
        $fixedString = $string;
        if (strlen($string) > $max) {
            $fixedString = substr($string, 0, $max) . "...";
        }

        return $fixedString;
    }

    //lista todos os anuncios de todos os usuários
    public function verTodos()
    {
        $result = $this->model->verTodos();


        if (!empty($result)) {
            echo "<div class='overflow-auto'>";
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th scope='col'>IdProduto</th>";
            echo "<th scope='col'>IdUsuario</th>";
            echo "<th scope='col'>Nome</th>";
            echo "<th scope='col'>Espécie</th>";
            echo "<th scope='col'>Raça</th>";
            echo "<th scope='col'>Nascimento</th>";
            echo "<th scope='col'>Sexo</th>";
            echo "<th scope='col'>Vacinado</th>";
            echo "<th scope='col'>Vermifugado</th>";
            echo "<th scope='col'>Castrado</th>";
            echo "<th scope='col'>Deficit </th>";
            echo "<th scope='col'>Descrição</th>";
            echo "<th scope='col'>Foto </th>";
            echo "<th scope='col'>Data Cadastro </th>";
            echo "<th scope='col'>Visualizar</th>";
            echo "<th scope='col'>Excluir</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($result as $value) {
                echo "<tr>";
                echo "<td>{$value["ID"]}</td>";  //idProduto
                echo "<td>{$value["id_Usuario"]}</td>";  //idUsuario
                echo "<td>{$value["nome"]}</td>";  //inputPetNome
                echo "<td>{$value["especie"]}</td>";  //inputPetEspecie
                echo "<td>{$value["raca"]}</td>";  //inputPetRaca
                echo "<td>{$value["nascimento"]}</td>";  //inputPetNascimento
                echo "<td>{$value["sexo"]}</td>";  //inputPetSexo
                echo "<td>{$value["vacinado"]}</td>";  //inputPetVacinado
                echo "<td>{$value["vermifugado"]}</td>";  //inputPetVermifugado
                echo "<td>{$value["castrado"]}</td>";  //inputPetCastrado
                echo "<td>{$this->shorten($value["deficit"], 40)}</td>"; //inputPetDeficit 
                echo "<td>{$this->shorten($value["descricao"], 40)}</td>"; //inputPetDescricao
                echo "<td><img height='100' src='../uploadedImages/{$value["foto"]}'></td>"; //inputPetArquivo
                echo "<td>{$value["dataCadastro"]}</td>";  //dataCadastro
                echo "<td> <a href='product-profile.php?produtoSelecionado={$value["ID"]}'>Visualizar</a></td>";
                echo "<td> <a href='home.php?removerProdutoPorId=true&produtoId={$value["ID"]}'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<h6 style='align-self:center; width:100%;'>Nenhum anúncio encontrado. Utilize a tela <a href='product-register.php'>'Criar Anúncio'</a> para começar!</h6>";
        }
    }


    //lista todos os anuncios do usuário passo
    public function verTodosPorUsuario($idUsuario)
    {
        $result = $this->model->verTodosPorUsuario($idUsuario);

        if (!empty($result)) {
            echo "<div class='overflow-auto'>";
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th scope='col'>IdProduto</th>";
            echo "<th scope='col'>IdUsuario</th>";
            echo "<th scope='col'>Nome</th>";
            echo "<th scope='col'>Espécie</th>";
            echo "<th scope='col'>Raça</th>";
            echo "<th scope='col'>Nascimento</th>";
            echo "<th scope='col'>Sexo</th>";
            echo "<th scope='col'>Vacinado</th>";
            echo "<th scope='col'>Vermifugado</th>";
            echo "<th scope='col'>Castrado</th>";
            echo "<th scope='col'>Deficit </th>";
            echo "<th scope='col'>Descrição</th>";
            echo "<th scope='col'>Foto </th>";
            echo "<th scope='col'>Data Cadastro </th>";
            echo "<th scope='col'>Visualizar</th>";
            echo "<th scope='col'>Excluir</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($result as $value) {
                echo "<tr>";
                echo "<td>{$value["ID"]}</td>";  //idProduto
                echo "<td>{$value["id_Usuario"]}</td>";  //idUsuario
                echo "<td>{$value["nome"]}</td>";  //inputPetNome
                echo "<td>{$value["especie"]}</td>";  //inputPetEspecie
                echo "<td>{$value["raca"]}</td>";  //inputPetRaca
                echo "<td>{$value["nascimento"]}</td>";  //inputPetNascimento
                echo "<td>{$value["sexo"]}</td>";  //inputPetSexo
                echo "<td>{$value["vacinado"]}</td>";  //inputPetVacinado
                echo "<td>{$value["vermifugado"]}</td>";  //inputPetVermifugado
                echo "<td>{$value["castrado"]}</td>";  //inputPetCastrado
                echo "<td>{$this->shorten($value["deficit"], 40)}</td>"; //inputPetDeficit 
                echo "<td>{$this->shorten($value["descricao"], 40)}</td>"; //inputPetDescricao
                echo "<td><img height='100' src='../uploadedImages/{$value["foto"]}'></td>"; //inputPetArquivo
                echo "<td>{$value["dataCadastro"]}</td>";  //dataCadastro
                echo "<td> <a href='product-profile.php?produtoSelecionado={$value["ID"]}'>Visualizar</a></td>";
                echo "<td> <a href='home.php?removerProdutoPorId=true&produtoId={$value["ID"]}'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<br><h6 style='align-self:center; width:100%;'>Nenhum anúncio encontrado. Utilize a tela <a href='product-register.php'>'Criar Anúncio'</a> para começar!</h6>";
        }
    }

    //utilizar preencherPorId() ao invés desse
    public function pegarDadosProdutoPorId()
    {
        return $this->model->verPorId($_GET["produtoSelecionado"]);
    }

    public function removerPorId($id)
    {
        $result = $this->model->removerPorId($id);

        if ($result) {
            echo "<script>alert('Produto removido com sucesso!');document.location='../view/home.php';</script>";
        } else {
            echo "<script>alert('Produto não encontrado!');</script>";
        }
    }

    function listarPorTipo($tipo)
    {
        $result = $this->model->listarPorTipo($tipo);

        if (!empty($result)) {
            foreach ($result as $value) {
                echo "<div class='card'>";
                echo "<img class='card-img-top' style='align-self:center; height:auto; max-width:200px;' src='../uploadedImages/{$value["foto"]}' alt='{$value["nome"]}'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>{$value["nome"]}</h5>";
                echo "<p class='card-text'>{$this->shorten($value["descricao"], 90)}</p>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "<a href='product-profile.php?produtoSelecionado={$value["ID"]}' class='btn btn-primary'>Mais Informações</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<br><h6 style='align-self:center; width:100%;'>Nenhum {$tipo} encontrado para adoção!</h6>";
        }
    }
}

$product = new ProductController();


if (isset($_GET['removerProdutoPorId'])) {
    $product->removerPorId($_GET["produtoId"]);
}
