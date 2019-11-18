<?php
    require_once "../../Models/Teste.php";
    require_once "../../Models/Pergunta.php";
    require_once "../../Models/RespostaTeste.php";
    require_once "../../Models/RespostaPergunta.php";

    session_start();

    // Guarda na sessao a resposta da pergunta
    $teste = $_SESSION["teste"];
    $contador = $_SESSION["contador_perguntas"];
    $pergunta = $teste->getListaPerguntas()[$contador];

    // Verifica se ha entrada do participante
    if($pergunta->getDescricao() == "X") {
        $entrada_participante = $_POST["entrada_participante"];
    }
    else {
        $entrada_participante = "Nada digitado";
    }

    $grau_escolhido = $_POST["escolha"];
    $numero_pergunta = $pergunta->getNumero();
    $id_resposta_teste = $_SESSION["resposta_teste"]->getId();

    // Cria resposta pergunta
    $resposta_pergunta = new RespostaPergunta($entrada_participante, $grau_escolhido, $numero_pergunta, $id_resposta_teste);

    // Guarda resposta pergunta na resposta teste
    $_SESSION["resposta_teste"]->adicionarRespostaPergunta($resposta_pergunta);

    // Avanca o contador e chama a proxima view
    $contador = ++$_SESSION["contador_perguntas"];
    $qnt = count($_SESSION["teste"]->getListaPerguntas());
    if($contador < $qnt) {
        header("Location:../../Views/Participante/ExibicaoPergunta.php");
    }
    else {
        header("Location:FinalizarRespostaTeste.php");
    }
?>
