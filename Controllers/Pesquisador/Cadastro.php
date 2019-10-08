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
    $result = $pesquisadorDAO->cadastrar($conexao->getLink(), $nome, $senha);
    if(! $result) {
        require_once "../../Views/Erros/ErroSQL.php";
        die();
    }

    // Processa o resultado
    echo("Cadastro efetuado!")
?>
