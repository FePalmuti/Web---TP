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

    // Verifica quantidade de pesquisadores
    $pesquisadorDAO = new PesquisadorDAO();
    $qnt = $pesquisadorDAO->quantidadePesquisadores($conexao->getLink());
    if(! $qnt) {
        $qnt = 0;
    }
    $id = $qnt + 1;

    // Cria o pesquisador
    $pesquisador = new Pesquisador($id, $nome, $senha, True);
    $result = $pesquisadorDAO->cadastrar($conexao->getLink(), $pesquisador);
    if(! $result) {
        require_once "../../Views/Erros/ErroSQL.php";
        die();
    }

    // Inicia sessao
    session_start();
    $_SESSION["id_pesquisador"] = $pesquisador->getId();
    require_once "ExibirTestes.php";
?>
