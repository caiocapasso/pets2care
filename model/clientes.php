<?php 
class Clientes {
    private $dados = array(
        1 => 'andre',
        2 => 'bandre',
        3 => 'candre'
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
