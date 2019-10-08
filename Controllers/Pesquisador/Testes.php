<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/TesteDAO.php";

    $id_pesquisador = $_SESSION["id_pesquisador"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        require_once "../../Views/Erros/ErroConexao.php";
        die();
    }

    // Executa os comandos SQL
    $testeDAO = new TesteDAO();
    $lista_testes = $testeDAO->buscar($conexao->getLink(), $id_pesquisador);
    if(! $lista_testes) {
        require_once "../../Views/Erros/ErroNenhumTeste.php";
        die();
    }

    // Redireciona para a view
    $_SESSION["lista_testes"] = $lista_testes;
    require_once "../../Views/Pesquisador/Testes.php";
?>
