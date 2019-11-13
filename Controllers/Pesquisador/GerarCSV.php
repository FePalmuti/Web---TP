<?php
    require_once "../../Models/RespostaTeste.php";
    require_once "../../Models/DadosDemograficos.php";
    require_once "../../Models/RespostaPergunta.php";

    session_start();
    $lista_respostas = $_SESSION["lista_respostas"];
    $lista_linhas = array();
    foreach($lista_respostas as $resposta_teste) {
        $linha = array();
        array_push($linha, $resposta_teste->getId());
        array_push($lista_linhas, $linha);
        //
        $dados_demograficos = $resposta_teste->getDadosDemograficos();
        $linha = array();
        array_push($linha, $dados_demograficos->getEmail());
        array_push($linha, $dados_demograficos->getCep());
        array_push($lista_linhas, $linha);
        //
        foreach($resposta_teste->getListaRespostaPergunta() as $resposta_pergunta) {
            $linha = array();
            array_push($linha, ".");
            array_push($linha, $resposta_pergunta->getEntradaParticipante());
            array_push($linha, $resposta_pergunta->getGrauEscolhido());
            array_push($lista_linhas, $linha);
        }
    }

    $arquivo = fopen("../../Respostas.csv", "w");
    foreach($lista_linhas as $linha) {
        fputcsv($arquivo, $linha);
    }
    fclose($arquivo);

    header("Location:../../Views/Pesquisador/RelatorioGeradoComSucesso.php");
?>
