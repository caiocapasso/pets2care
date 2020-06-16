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
        <div class="card-deck">
        <?php $product->listarPorTipo('Gato') ?>    
        </div>
    </div>
    <?php include("_footer.php"); ?>
</body>
</html>