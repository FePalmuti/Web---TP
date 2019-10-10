<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/Pergunta.php";

    session_start();
    $lista_perguntas = $_SESSION["lista_perguntas"];
    $id_teste = $_SESSION["teste"]->getId();

    $numero = count($lista_perguntas) + 1;
    $instrucoes = $_POST["instrucoes"];
    $descricao = $_POST["descricao"];
    $tipo = $_POST["tipo"];

    // Cria a pergunta
    $pergunta = new Pergunta($numero, $instrucoes, $descricao, $tipo, $id_teste);

    // Guarda na sessao
    array_push($_SESSION["lista_perguntas"], $pergunta);
    require_once "../../Views/Pesquisador/NovaPergunta.php";
?>
