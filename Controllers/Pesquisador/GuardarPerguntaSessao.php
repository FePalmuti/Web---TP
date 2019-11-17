<?php
    require_once "../../Models/Teste.php";
    require_once "../../Models/Pergunta.php";

    session_start();
    $teste = $_SESSION["teste"];
    $qnt_perguntas = count($teste->getListaPerguntas());

    $numero = $qnt_perguntas + 1;
    $instrucoes = $_POST["instrucoes"];
    $descricao = $_POST["descricao"];
    if($descricao == "X") {
        $sem_descricao = True;
    }
    else {
        $sem_descricao = False;
    }
    $tipo = $_POST["tipo"];
    $id_teste = $teste->getId();

    // Cria a pergunta
    $pergunta = new Pergunta($numero, $instrucoes, $descricao, $sem_descricao, $tipo, $id_teste, array());
    // Guarda a pergunta no teste
    $_SESSION["teste"]->adicionarPergunta($pergunta);

    // Guarda na sessao a quantidade de imagens que devem ser dadas pelo usuario
    $qnt_imagens = $_POST["qnt_imagens"];
    $_SESSION["qnt_imagens"] = $qnt_imagens;
    header("Location:../../Views/Pesquisador/DefinicaoImagens.php");
?>
