<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/PesquisadorDAO.php";
    require_once "../../Models/Pesquisador.php";

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        require_once "../../Views/Erros/ErroConexao.php";
        die();
    }

    // Executa os comandos SQL
    $pesquisadorDAO = new PesquisadorDAO();
    $pesquisador = $pesquisadorDAO->buscar($conexao->getLink(), $nome, $senha);
    if(! $pesquisador) {
        require_once "../../Views/Erros/ErroEntrada.php";
        die();
    }

    // Inicia sessao
    session_start();
    $_SESSION["id_pesquisador"] = $pesquisador->getId();
    require_once "ExibirTestes.php";
?>
