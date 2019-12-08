<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/Alternativa.php";
    require_once "../../Persistence/TesteDAO.php";
    require_once "../../Persistence/PerguntaDAO.php";
    require_once "../../Persistence/AlternativaDAO.php";

    $codigo_digitado = $_POST["codigo"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Executa os comandos SQL
    $testeDAO = new TesteDAO();
    $retornos = $testeDAO->buscarPorCA($conexao->getLink(), $codigo_digitado);
    if($retornos[0] == null) {
        header("Location:../../Views/Erros/ErroSQL.php?id_erro=".$retornos[1]."&erro=".$retornos[2]);
        die();
    }
    else {
        $teste = $retornos[0];
    }

    // Inicia sessao
    session_start();
    $_SESSION["teste"] = $teste;
    header("Location:../../Views/Participante/DadosDemograficos.php");
?>
