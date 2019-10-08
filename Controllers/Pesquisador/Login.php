<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/PesquisadorDAO.php";
    require_once "../../Models/Pesquisador.php";

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Estabelece conexao com o BD
    $conexao = new Conexao("localhost", "root", "", "Dados");
    if(! $conexao->conectar()) {
        require_once "../../Views/Erros/ErroConexao.php";
        die();
    }

    // Executa o comando SQL
    $pesquisadorDAO = new PesquisadorDAO();
    $pesquisador = $pesquisadorDAO->buscarPesquisadorPorNome($conexao->getLink(), $nome);
    if(! $pesquisador) {
        require_once "../../Views/Erros/ErroSQL.php";
        die();
    }

    // Processa o resultado
    if($pesquisador->getSenha() == $senha) {
        echo("Login aprovado!");
    }
    else {
        echo("Senha incorreta!");
    }
?>
