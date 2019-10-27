<?php
    require_once "../../Models/Teste.php";
    require_once "../../Models/Pergunta.php";

    session_start();
    $lista_perguntas = $_SESSION["lista_perguntas"];

    $numero = count($lista_perguntas) + 1;
    $instrucoes = $_POST["instrucoes"];
    $descricao = $_POST["descricao"];
    $tipo = $_POST["tipo"];
    $qnt_imagens = $_POST["qnt_imagens"];
    $id_teste = $_SESSION["teste"]->getId();

    // Cria a pergunta
    $pergunta = new Pergunta($numero, $instrucoes, $descricao, $tipo, $id_teste);

    // Guarda a pergunta na sessao
    array_push($_SESSION["lista_perguntas"], $pergunta);
    $_SESSION["qnt_imagens"] = $qnt_imagens;
    header("Location:../../Views/Pesquisador/DefinirImagens.php");
?>
