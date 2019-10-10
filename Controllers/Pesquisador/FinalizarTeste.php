<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/Pergunta.php";

    session_start();
    $teste = $_SESSION["teste"];
    echo $teste->getId(), " ", $teste->getNome();
    echo "<br>";

    $lista_perguntas = $_SESSION["lista_perguntas"];
    echo count($lista_perguntas);
    foreach ($lista_perguntas as $pergunta) {
        echo "____", $pergunta->getNumero(), " ", $pergunta->getInstrucoes(), " ", $pergunta->getDescricao(), " ", $pergunta->getTipo(), " ", $pergunta->getIdTeste();
        echo "<br>";
    }
?>
