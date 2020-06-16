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
            <h3 class="text-center text-primary" style="margin-bottom:50px">Nossos Fundadores</h3>
            <div id="jessica" class="d-flex align-items-center" style="margin-bottom: 50px">
                <img src="../content/img/User_02.png" class="img-fluid rounded-circle border" style="width: 200px; height: auto;"
                    alt="Responsive image">
                <div style="margin-left: 50px">
                    <h4 class="text-success" style="margin-bottom: 20px">Jessica Santos, 23</h4>
                    <h5 class="col-10">Apaixonada por animais, a estudante é apoiadora de ONG's de proteção animal e
                        realiza doações
                        milionária à causa.</h5>
                </div>
            </div>
            <div id="caio" class="d-flex align-items-center" style="margin-bottom: 50px">
                <div class="d-flex flex-column" style="margin-right: 50px">
                    <h4 class="text-right align-self-end text-success" style="margin-bottom: 20px">Caio Capasso, 52</h4>
                    <h5 class="text-right align-self-end col-10">Realiza constribuições sempre que pode para tratamento
                        e alimentação de cães de rua. Parece lenhador hipster, mas não corta árvore nem usa modelador
                        capilar.</h5>
                </div>
                <img src="../content/img/User_04.png" class="img-fluid rounded-circle border" style="width: 200px; height: auto;"
                    alt="Responsive image">
            </div>
            <div id="erika" class="d-flex align-items-center" style="margin-bottom: 50px">
                <img src="../content/img/User_03.png" class="img-fluid rounded-circle border" style="width: 200px; height: auto;"
                    alt="Responsive image">
                <div style="margin-left: 50px">
                    <h4 class="text-success" style="margin-bottom: 20px">Erika Juliana, 22</h4>
                    <h5 class="col-10">Aficionada por gatos, a empresária realiza parcerias entre clínicas veterinárias e
                        ONG's, nas quais particpa ativamente desde 2009.</h5>
                </div>
            </div>
            <div id="luiz" class="d-flex align-items-center" style="margin-bottom: 50px">
                <div class="d-flex flex-column" style="margin-right: 50px">
                    <h4 class="text-right align-self-end text-success" style="margin-bottom: 20px">Luiz Rioja, 17</h4>
                    <h5 class="text-right align-self-end col-10">Garoto prodígio que apadrinhou mais de 100 animais nos
                        últimos três anos, desde que teve contato com ONG's de proteção animal. Desde então promove a
                        causa sempre que pode.</h5>
                </div>
                <img src="../content/img/User_01.png" class="img-fluid rounded-circle border" style="width: 200px; height: auto;"
                    alt="Responsive image">
            </div>

            <h3 class="text-center text-primary" style="margin-bottom:50px">Nosso Time de Colaboradores</h3>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Contato</th>
                        <th scope="col">Função</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bartolomeu Frederico</td>
                        <td>bartolomeu@pets2care.com</td>
                        <td>adimistrativo</td>
                    </tr>
                    <tr>
                        <td>Roberson Silva</td>
                        <td>rb_silva@pets2care.com</td>
                        <td>comercial</td>
                    </tr>
                    <tr>
                        <td>Marli Marlene Miranda</td>
                        <td>mmm@pets2care.com</td>
                        <td>marketing, promoção e mídias sociais</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php include("_footer.php"); ?>
</body>

</html>