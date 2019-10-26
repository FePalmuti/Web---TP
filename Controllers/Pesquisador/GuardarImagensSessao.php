<?php
    session_start();
    $qnt_imagens = $_SESSION["qnt_imagens"];
    $lista_imagens = array();
    for($i=0; $i<$qnt_imagens; $i++) {
        $nome_imagem = "img_".$i;
        $imagem = $_POST[$nome_imagem];
        array_push($lista_imagens, $imagem);
    }
    array_push($_SESSION["matriz_imagens"], $lista_imagens);

    require_once "../../Views/Pesquisador/NovaPergunta.php"
?>
