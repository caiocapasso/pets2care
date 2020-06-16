<?php 
session_start();

$_SESSION['usuarioLogado'] = null;

// //TODO: substituir por SQL e remover
// $_SESSION['usuariosCount'] = 2;
// $_SESSION['usuarios'] = array(
//     array(0, "admin@admin", "admin", "Admin", "Masculino", "1986-10-10", "000000000000", "Rua Casa do Ator, 280"),
//     array(1, "bandre@gmail.com", "234", "Bandré", "Feminino", "1900-11-01", "37492748", "Rua Cardoso de Melo, 672")
// );

// //TODO: substituir por SQL e remover 
// $_SESSION['produtosCount'] = 3;
// $_SESSION['produtos'] = array(
//     array(0, 0, "Astolfo", "Cachorro", "Lulu da Pomerânia", "10/10/2010", "Macho", "Sim", "Não", "Sim", "Tem só três patas", "Amável menos com pessoas chatas, fedorentas e pentelhas. Adora um osso e cafunés. Late para qualquer coisa.", "Dog_03.jpg"),
//     array(1, 1, "Bernardo", "Cachorro", "Lulu da Pomerânia", "10/10/2010", "Macho", "Sim", "Sim", "Sim", "", "adora estragar um sofá", "Dog_02.jpg"),
//     array(2, 0, "Claudia", "Gato", "Siamês", "10/10/2010", "Fêmea", "Não", "Não", "Não", "gosta de comer cocô", "siamesa raça pura", "Cat_02.jpg"),

// );

echo "<script>window.location.href = './view/home.php';</script>";
?>