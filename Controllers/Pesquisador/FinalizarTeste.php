<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/TesteDAO.php";
    require_once "../../Models/PerguntaDAO.php";

    session_start();
    $teste = $_SESSION["teste"];
    $lista_perguntas = $_SESSION["lista_perguntas"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Gravacao do teste
    $testeDAO = new TesteDAO();
    $result = $testeDAO->cadastrar($conexao->getLink(), $teste);
    if(! $result) {
        header("Location:../../Views/Erros/ErroSQL.php");
        die();
    }

    // Gravacao de perguntas
    $perguntaDAO = new PerguntaDAO();
    foreach ($lista_perguntas as $pergunta) {
        $perguntaDAO->cadastrar($conexao->getLink(), $pergunta);
    }

    //-----------------------------------------
    // Salvar imagens no BD
    //-----------------------------------------

    header("Location:ExibirTestes.php");
?>
