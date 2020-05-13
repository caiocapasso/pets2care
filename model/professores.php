<?php 
class Professores {
    private $dados = array(
        1 => 'professor josé',
        2 => 'professor mosé',
        3 => 'professor nosé',
        4 => 'professor osé',
        5 => 'professor posé'
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
