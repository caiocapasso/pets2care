<?php
session_start();
require_once(dirname(__DIR__) . "/controller/product.php");
require_once(dirname(__DIR__) . "/controller/user.php");
?>

<html>

<?php
if (isset($_GET['produtoSelecionado'])) {
    $recoveredProduct = $product->pegarDadosProdutoPorId();
}
?>

<?php include("_head.php") ?>

<body>
    <?php include("_header.php"); ?>
    <div class="container card bg-secondary" style="margin: 50px 25px 50px 25px">
        <div id="content" class="row">
            <div class="col-8 item-photo card">
                <div id="carousel" class="carousel slide">
                    <!-- TODO: trocar isso para uma função do php que pega e coloca múltiplas imagens associadas ao pet e coloca aqui -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner mt-5" style="height:400px">
                        <div class="carousel-item active">
                            <img class="d-block mx-auto h-100" src="../uploadedImages/<?php echo $recoveredProduct[0]["foto"]; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 card bg-primary">
                <div class="m-2">
                    <h3 class="font-weight-bold mt-5"><?php echo $recoveredProduct[0]["nome"]; ?></h3>
                    <h6>Anúncio criado em <?php echo date("d/M/Y", strtotime($recoveredProduct[0]["dataCadastro"])); ?></h3>
                        <hr>
                        <br>
                </div>
                <div class="ml-1 mt-2">
                    <h5 >Dados do Anunciante</h5>
                    <h6>Nome: <?php echo $recoveredProduct[1]["nome"]; ?></h6>
                    <h6>E-mail: <?php echo $recoveredProduct[1]["email"]; ?></h6>
                    <h6>Tel. Contato: <?php echo $recoveredProduct[1]["telefone"]; ?></h6>
                    <h6>Endereço: <?php echo $recoveredProduct[1]["endereco"]; ?></h6>
                </div>
            </div>
        </div>
        <div class="m-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="true">Dados Gerais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">Detalhes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Descrição</a>
                </li>
            </ul>
            <div class="tab-content card bg-light" id="myTabContent" style="min-height:300px">
                <div class="tab-pane fade show active m-3" id="data" role="tabpanel" aria-labelledby="data-tab">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-light">
                            <h6><span class="font-weight-bold">Nome:</span> <?php echo $recoveredProduct[0]["nome"]; ?></h6>
                        </li>
                        <li class="list-group-item bg-light">
                            <h6><span class="font-weight-bold">Espécie:</span> <?php echo $recoveredProduct[0]["especie"]; ?></h6>
                        </li>
                        <li class="list-group-item bg-light">
                            <h6><span class="font-weight-bold">Raça:</span> <?php echo $recoveredProduct[0]["raca"]; ?></h6>
                        </li>
                        <li class="list-group-item bg-light">
                            <h6><span class="font-weight-bold">Data de Nascimento*:</span> <?php echo $recoveredProduct[0]["nascimento"]; ?></h6>
                        </li>
                        <li class="list-group-item bg-light">
                            <h6><span class="font-weight-bold">É castrado(a)?</span> <?php echo $recoveredProduct[0]["castrado"]; ?></h6>
                        </li>
                        <li class="list-group-item bg-light">
                            <h6><span class="font-weight-bold">É castrado(a)?</span> <?php echo $recoveredProduct[0]["castrado"]; ?></h6>
                        </li>
                        <li class="list-group-item bg-light">
                            <h6><span class="font-weight-bold">Está Vacinado?</span> <?php echo $recoveredProduct[0]["vacinado"]; ?></h6>
                        </li>
                        <li class="list-group-item bg-light">
                            <h6><span class="font-weight-bold">Está Vermifugado?</span> <?php echo $recoveredProduct[0]["vermifugado"]; ?></h6>
                        </li>
                    </ul>
                    <br>
                    <p>*em alguns casos a data de nascimento é aproximada, com base nas características fisiológicas do animal.
                </div>
                <div class="tab-pane fade ml-3 mt-3" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <h6><?php echo strlen($recoveredProduct[0]["deficit"]) > 0 ? $recoveredProduct[0]["deficit"] : "Nenhhuma informação"; ?></h6>
                </div>
                <div class="tab-pane fade ml-3 mt-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <h6><?php echo $recoveredProduct[0]["descricao"]; ?></h6>
                </div>
            </div>
        </div>

    </div>
    <?php include("_footer.php"); ?>

</html>