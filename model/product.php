<?php
require_once(dirname(__DIR__) . "/config.php");

//TODO: pegar como ficar no usuário e duplicar aqui, código velho
class Product
{
    public $mysqli;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }

    public function incluir($idUsuario, $inputPetNome, $inputPetEspecie, $inputPetRaca, $inputPetNascimento, $inputPetSexo, $inputPetVacinado, $inputPetVermifugado, $inputPetCastrado, $inputPetDeficit, $inputPetDescricao, $inputPetArquivo)
    {
        if ($inputPetNome == "" || $inputPetNome == null || strlen($inputPetNome) < 2) {
            return "campo nome do animal inválido. Mínimo 2 caracteres";
        }

        if ($inputPetEspecie == "" || $inputPetEspecie == null || strlen($inputPetEspecie) < 2) {
            return "campo espécie do animal inválido.";
        }

        if ($inputPetNascimento == "" ||  $inputPetNascimento == null || strlen($inputPetNascimento) < 2) {
            return "campo data de nascimento do animal inválido.";
        }

        if ($inputPetSexo == "" || $inputPetSexo == null || strlen($inputPetSexo) < 2) {
            return "campo sexo do animal inválido.";
        }

        if ($inputPetVacinado == "" || $inputPetVacinado == null || strlen($inputPetVacinado) < 2) {
            return "campo vacinado do animal inválido.";
        }

        if ($inputPetVermifugado == "" || $inputPetVermifugado == null || strlen($inputPetVermifugado) < 2) {
            return "campo vermifugado do animal inválido.";
        }

        if ($inputPetCastrado == "" || $inputPetCastrado == null || strlen($inputPetCastrado) < 2) {
            return "campo castrado do animal inválido.";
        }

        if ($inputPetDescricao == "" || $inputPetDescricao == null || strlen($inputPetDescricao) < 2) {
            return "campo descrição do animal inválido. Mínimo 2 caracteres";
        }

        if ($inputPetArquivo == null) {
            return "campo foto inválido. Adicionar uma foto.";
        }

        $info = pathinfo($inputPetArquivo);
        $ext = $info['extension'];
        $origName = $info['filename'];
        $newFileName = random_int(0, 1000000) . $origName . "." . $ext;

        $target = '../uploadedImages/' . $newFileName;
        move_uploaded_file($_FILES['inputPetArquivo']['tmp_name'], $target);

        $nowDate = date("Y-m-d");

        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sql = "INSERT INTO `ANIMAIS` (id_Usuario,nome,especie,raca,nascimento,sexo,vacinado,vermifugado,castrado,deficit,descricao,foto,dataCadastro) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("issssssssssss", $idUsuario, $inputPetNome, $inputPetEspecie, $inputPetRaca, $inputPetNascimento, $inputPetSexo, $inputPetVacinado, $inputPetVermifugado, $inputPetCastrado, $inputPetDeficit, $inputPetDescricao, $newFileName, $nowDate);


        if ($stmt->execute() === TRUE) {
            $stmt->close();
            $mysqli->close();
            return "sucesso";
        } else {
            return "erro no banco";
        }

    }

    public function verTodos()
    {
        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sql ="SELECT * FROM `ANIMAIS`";
        $result = $mysqli->query($sql);

        $array = [];
        if ($result != false) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public function verTodosPorUsuario($idUsuario)
    {
        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sql ="SELECT * FROM `ANIMAIS` WHERE id_Usuario='{$idUsuario}'";
        $result = $mysqli->query($sql);

        $array = [];
        if ($result != false) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
        }
        
        $mysqli->close();

        return $array;
    }

    public function verPorId($id)
    {
        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sqlProduct ="SELECT * FROM `ANIMAIS` WHERE ID='{$id}'";
        $resultProduct = $mysqli->query($sqlProduct);

        $result = [];

        if ($resultProduct != false) {
            while ($row = $resultProduct->fetch_array(MYSQLI_ASSOC)) {
                $result[] = $row;
            }
        }

        $userId = $result[0]["id_Usuario"];
        $sqlUser = "SELECT * FROM `USUARIOS` WHERE ID='{$userId}'";
        $resultUser = $mysqli->query($sqlUser);

        if ($resultUser != false) {
            while ($row = $resultUser->fetch_array(MYSQLI_ASSOC)) {
                $result[] = $row;
            }
        }

        $mysqli->close();

        return $result;
    }

    public function removerPorId($id)
    {
        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sql ="DELETE FROM `ANIMAIS` WHERE ID='{$id}'";
        $result = $mysqli->query($sql);

        $mysqli->close();

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function listarPorTipo($tipo)
    {
        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sql ="SELECT * FROM `ANIMAIS` WHERE especie='{$tipo}'";
        $result = $mysqli->query($sql);

        $array = [];
        if ($result != false) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
        }

        $mysqli->close();
        return $array;
    }
}
