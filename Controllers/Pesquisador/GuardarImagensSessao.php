<?php
    require_once "../../Models/Teste.php";
    require_once "../../Models/Imagem.php";

    session_start();
    $qnt_imagens = $_SESSION["qnt_imagens"];
    $teste = $_SESSION["teste"];
    $num_pergunta = count($teste->getListaPerguntas());

    $lista_imagens = array();
    for($grau=1; $grau<=$qnt_imagens; $grau++) {
        $nome_imagem = "img_".$grau;
        $arquivo = $_POST[$nome_imagem];
        $imagem = new Imagem($arquivo, $grau, $num_pergunta, $teste->getId());
        array_push($lista_imagens, $imagem);
    }
    $_SESSION["teste"]->adicionarImagensNaUltimaPergunta($lista_imagens);

    header("Location:../../Views/Pesquisador/NovaPergunta.php");
?>
