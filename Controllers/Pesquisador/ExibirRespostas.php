<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/RespostaTesteDAO.php";
    require_once "../../Models/Teste.php";

    session_start();
    $pos_teste = $_POST["pos_teste"];
    $teste = $_SESSION["lista_testes"][$pos_teste];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Busca as resposta do teste
    $respostaTesteDAO = new RespostaTesteDAO();
    $lista_respostas = $respostaTesteDAO->buscar($conexao->getLink(), $teste->getId());
    if(! $lista_respostas) {
        $lista_respostas = array();
    }

    // Redireciona para a view
    $_SESSION["lista_respostas"] = $lista_respostas;
    header("Location:../../Views/Pesquisador/Respostas.php");
?>
