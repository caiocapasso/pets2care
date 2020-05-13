<?php 
class Alunos {
    private $dados = array(
        1 => 'aluno andré',
        2 => 'aluno bandré',
        3 => 'aluno candré',        
        4 => 'aluno dandré',        
        5 => 'aluno endré'
    );

    public function todos(){
        $data = $this->dados;
        return $data;
    }

    public function ver(){
        $data['registro'] = $this->dados[$_GET['id']];
        return $data;
    }
}
?>
