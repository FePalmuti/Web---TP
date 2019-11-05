<?php
    require_once "../../Models/Teste.php";

    session_start();
    $contador = ++$_SESSION["contador_perguntas"];
    $qnt = count($_SESSION["teste"]->getListaPerguntas());
    if($contador < $qnt) {
        header("Location:../../Views/Participante/ExibirPergunta.php");
    }
    else {
        header("Location:../../Views/Home.php");
    }
?>
