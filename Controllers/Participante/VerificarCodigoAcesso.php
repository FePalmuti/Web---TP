<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/TesteDAO.php";
    require_once "../../Models/Teste.php";

    $codigo_digitado = $_POST["codigo"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Executa os comandos SQL
    $testeDAO = new TesteDAO();
    $teste = $testeDAO->buscarPorCA($conexao->getLink(), $codigo_digitado);
    if(! $teste) {
        header("Location:../../Views/Erros/ErroEntrada.php");
        die();
    }

    // Inicia sessao
    session_start();
    $_SESSION["teste"] = $teste;
    header("Location:../../Views/Participante/DadosDemograficos.php");
?>