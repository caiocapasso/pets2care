<?php
session_start();
require_once(dirname(__DIR__) . "/controller/product.php");
require_once(dirname(__DIR__) . "/controller/user.php");
?>

<html>

<?php include("_head.php")?>

<body>
    <?php include("_header.php"); ?>
    <div id="content" class="row justify-content-center text-center" style="margin: 50px 25px 50px 25px">
        <div class="col-10 d-flex flex-column">
            <div id="mission" class="d-flex flex-column align-items-center">
                <h3 class="text-primary">Missão <i class="fa fa-crosshairs" style="margin-left:20px"></i></h3>
                <h4 class="text-success mx-auto">A petS2care surgiu com o objetivo de oferecer uma perspectiva de vida digna a todos os animais abandonados e carentes de atenção e cuidado.</h4>
                <h4 class="text-success mx-auto">O nosso maior propósito é unir um humano que possui disponibilidade e amor para adotar com um animal que por sua vez necessita de um lar.</h4>
            </div>
            <div class="border-top my-5"></div>
            <div id="vision" class="d-flex flex-column align-items-center">
                <h3 class="text-primary">Visão <i class="fa fa-eye" style="margin-left:20px"></i></h3>
                <h4 class="text-success mx-auto">A petS2care espera se tornar uma empresa referência na saúde e bem-estar animal, unindo pessoas dispostas a dar o cuidado e carinho necessário à animais em situação de abandono e negligência.</h4>
                <h4 class="text-success mx-auto">Através de parcerias com indivíduos, empresas, ONGs, e outras entidades da sociedade civil, visamos promover a união das ações ligadas à nossa missão por todo o Brasil.</h4>
            </div>
            <div class="border-top my-5"></div>
            <div id="values" class="d-flex flex-column align-items-center">
                <h3 class="text-primary">Valores <i class="fa fa-heart" style="margin-left:20px"></i></h3>
                <h4 class="text-success mx-auto">Carregamos na petS2care os seguintes valores:</h4>
                <ul class="list-unstyled">
                    <li><h5><i class="fa fa-paw" style="margin-right:20px"></i>O Cuidado</h5></li>
                    <li><h5><i class="fa fa-paw" style="margin-right:20px"></i>O Profissionalismo</h5></li>
                    <li><h5><i class="fa fa-paw" style="margin-right:20px"></i>O Amor e Respeito incondicionais aos animais</h5></li>
                    <li><h5><i class="fa fa-paw" style="margin-right:20px"></i>A Idoneidade, ética e transparência em todas as nossas atividades e relações</h5></li>
                </ul>
            </div>
            <div class="border-top my-5"></div>
            <img src="../content/img/PETS2LOVE_COMPLETO.png" class="img-fluid mx-auto" style="max-width:50%; height:auto; margin-bottom:20px" alt="Responsive image">
        </div>
    </div>
    <?php include("_footer.php"); ?>
</body>

</html>