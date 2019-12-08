<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/RespostaTeste.php";
    require_once "../../Models/RespostaPergunta.php";
    require_once "../../Models/DadosDemograficos.php";
    require_once "../../Persistence/RespostaTesteDAO.php";
    require_once "../../Persistence/RespostaPerguntaDAO.php";
    require_once "../../Persistence/DadosDemograficosDAO.php";

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
    $retornos = $respostaTesteDAO->buscar($conexao->getLink(), $teste->getId());
    if($retornos[0] == null) {
        $lista_respostas = array();
    }
    else {
        $lista_respostas = $retornos[0];
    }

    // Redireciona para a view
    $_SESSION["lista_respostas"] = $lista_respostas;
    header("Location:../../Views/Pesquisador/Respostas.php");
?>
