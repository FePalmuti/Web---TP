<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/RespostaTeste.php";
    require_once "../../Models/RespostaPergunta.php";
    require_once "../../Models/DadosDemograficos.php";
    require_once "../../Persistence/DadosDemograficosDAO.php";
    require_once "../../Persistence/RespostaTesteDAO.php";
    require_once "../../Persistence/RespostaPerguntaDAO.php";

    session_start();
    $resposta_teste = $_SESSION["resposta_teste"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Gravacao do resposta teste
    $respostaTesteDAO = new RespostaTesteDAO();
    $result = $respostaTesteDAO->cadastrar($conexao->getLink(), $resposta_teste);
    if(! $result) {
        header("Location:../../Views/Erros/ErroSQL.php");
        die();
    }

    header("Location:../../Views/Participante/Agradecimentos.php");
?>
