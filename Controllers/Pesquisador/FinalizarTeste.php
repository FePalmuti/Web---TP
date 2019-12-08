<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/Pergunta.php";
    require_once "../../Models/Alternativa.php";
    require_once "../../Models/Imagem.php";
    require_once "../../Persistence/TesteDAO.php";
    require_once "../../Persistence/PerguntaDAO.php";
    require_once "../../Persistence/AlternativaDAO.php";
    require_once "../../Persistence/ImagemDAO.php";

    session_start();
    $teste = $_SESSION["teste"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Gravacao do teste
    $testeDAO = new TesteDAO();
    $retornos = $testeDAO->cadastrar($conexao->getLink(), $teste);
    if($retornos[0] == null) {
        header("Location:../../Views/Erros/ErroSQL.php?id_erro=".$retornos[1]."&erro=".$retornos[2]);
        die();
    }

    header("Location:ExibirTestes.php");
?>
