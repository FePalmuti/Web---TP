<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Pesquisador.php";
    require_once "../../Persistence/PesquisadorDAO.php";

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    // Criptografa senha
//    $senha = md5($senha);

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Executa os comandos SQL
    $pesquisadorDAO = new PesquisadorDAO();
    $pesquisador = $pesquisadorDAO->buscar($conexao->getLink(), $nome, $senha);
    if(! $pesquisador) {
        header("Location:../../Views/Erros/ErroEntrada.php");
        die();
    }

    // Inicia sessao
    session_start();
    $_SESSION["id_pesquisador"] = $pesquisador->getId();
    header("Location:ExibirTestes.php");
?>
