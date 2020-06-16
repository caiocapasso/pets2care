<?php
require_once(dirname(__DIR__) . "/config.php");
class User
{
    public function incluir($inputEmail, $inputSenha, $inputSenhaRepetir, $inputNome, $inputGenero, $inputNascimento, $inputTel, $inputEndereco)
    {
        if ($inputEmail == "" || $inputEmail == null || strlen($inputEmail) < 3) {
            return "campo e-mail inválido. Mínimo 3 caracteres";
        }

        if ($inputSenha == "" || $inputSenha == null || strlen($inputSenha) < 3) {
            return "campo senha inválido. Mínimo 3 caracteres";
        }

        if ($inputSenhaRepetir == "" || $inputSenhaRepetir == null || strlen($inputSenhaRepetir) < 3) {
            return "campo repetir senha inválido. Mínimo 3 caracteres";
        }

        if ($inputNome == "" || $inputNome == null || strlen($inputNome) < 3) {
            return "campo nome inválido. Mínimo 3 caracteres";
        }

        if ($inputGenero == "" || $inputGenero == null || strlen($inputGenero) < 3) {
            return "campo gênero inválido. Mínimo 3 caracteres";
        }

        if ($inputNascimento == "" || $inputNascimento == null || strlen($inputNascimento) < 3) {
            return "campo nascimento inválido. Mínimo 3 caracteres";
        }

        if ($inputTel == "" || $inputTel == null || strlen($inputTel) < 8) {
            return "campo telefone inválido. Mínimo 8 caracteres";
        }

        if ($inputEndereco == "" || $inputEndereco == null || strlen($inputEndereco) < 3) {
            return "campo endereço inválido. Mínimo 3 caracteres";
        }

        if ($inputSenha !== $inputSenhaRepetir) {
            return "senhas são diferentes!";
        }

        $senhaCriptografada = md5($inputSenha);
        $nowDate = date("Y-m-d");
        $adminStatus = 0;

        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sql = "INSERT INTO `USUARIOS` (isAdmin,email,senha,nome,genero,nascimento,telefone,endereco,dataCadastro) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("issssssss", $adminStatus, $inputEmail, $senhaCriptografada, $inputNome, $inputGenero, $inputNascimento, $inputTel, $inputEndereco, $nowDate);

        if ($stmt->execute() === TRUE) {
            $stmt->close();
            $mysqli->close();
            return "sucesso";
        } else {
            return "erro no banco";
        }

    }

    public function alterar($id, $inputEmail, $inputSenha, $inputSenhaRepetir, $inputNome, $inputGenero, $inputNascimento, $inputTel, $inputEndereco)
    {
        $usuario = $this->verPorId(intval($id));

        if (!$usuario) {
            return 'erro ao procurar usuário';
        }

        $newInputEmail = $usuario["email"];
        if ($inputEmail != "" && $inputEmail != null && strlen($inputEmail) >= 3) {
            $newInputEmail = $inputEmail;
        } else {
            return 'novo e-mail inválido.';
        }

        $newInputSenha = $usuario["senha"];
        if ($inputSenha != "" && $inputSenha != null && strlen($inputSenha) >= 3) {
            if ($inputSenhaRepetir != "" && $inputSenhaRepetir != null && strlen($inputSenhaRepetir) >= 3) {
                if ($inputSenha == $inputSenhaRepetir) {
                    $newInputSenha = $inputSenha;
                } else {
                    return 'nova senha inválida.';
                }
            }
        }

        $newInputNome = $usuario["nome"];
        if ($inputNome != "" && $inputNome != null && strlen($inputNome) >= 3) {
            $newInputNome = $inputNome;
        } else {
            return 'novo nome inválido.';
        }

        $newInputGenero = $usuario["genero"];
        if ($inputGenero != "" && $inputGenero != null && strlen($inputGenero) >= 2) {
            $newInputGenero = $inputGenero;
        } else {
            return 'novo genero inválido.';
        }

        $newInputNascimento = $usuario["nascimento"];
        if ($inputNascimento != "" && $inputNascimento != null && strlen($inputNascimento) >= 2) {
            $newInputNascimento = $inputNascimento;
        } else {
            return 'novo nascimento inválido.';
        }

        $newInputTel = $usuario["telefone"];
        if ($inputTel != "" && $inputTel != null && strlen($inputTel) >= 8) {
            $newInputTel = $inputTel;
        } else {
            return 'novo telefone inválido.';
        }

        $newInputEndereco = $usuario["endereco"];
        if ($inputEndereco != "" && $inputEndereco != null && strlen($inputEndereco) >= 3) {
            $newInputEndereco = $inputEndereco;
        } else {
            return 'novo endereço inválido.';
        }

        $senhaCriptografada =  md5($newInputSenha);



       $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sql = "UPDATE `USUARIOS` SET email=?,senha=?,nome=?,genero=?,nascimento=?,telefone=?,endereco=? WHERE ID=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssssi", $newInputEmail, $senhaCriptografada, $newInputNome, $newInputGenero, $newInputNascimento, $newInputTel, $newInputEndereco, $id);
        
        if ($stmt->execute() == TRUE) {
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

        $sql = "SELECT * FROM `USUARIOS`";
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

        $sql = "SELECT * FROM `USUARIOS` WHERE ID='{$id}'";
        $result = $mysqli->query($sql);

        $array = [];

        if ($result != false) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
        }
        $mysqli->close();

        return $array[0];
    }

    public function removerPorId($id)
    {
        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $sql = "DELETE FROM `USUARIOS` WHERE ID='{$id}'";
        $result = $mysqli->query($sql);
        $mysqli->close();
        if ($result == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //TODO: falta esse
    public function executarLogin($email, $senha)
    {
        $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

        if ($mysqli->connect_error){
            die("<p>Serviço indisponível. Por favor tente mais tarde</p>");
        }

        $senhaCriptografada =  md5($senha);
        $sql = "SELECT * FROM `USUARIOS` WHERE email='{$email}' and senha='{$senhaCriptografada}'";
        $result = $mysqli->query($sql);

        if ($result != false) {
            $array = [];
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }

            $mysqli->close();

            if (count($array) > 0) {
                $_SESSION['usuarioLogado'] = $array[0];

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
