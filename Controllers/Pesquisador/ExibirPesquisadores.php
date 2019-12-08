<?php
    require_once "../../Models/Pesquisador.php";
    require_once "../../Models/Conexao.php";
    require_once "../../Persistence/PesquisadorDAO.php";

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Busca os pesquisadores
    $pesquisadorDAO = new PesquisadorDAO();
    $retornos = $pesquisadorDAO->buscarTodos($conexao->getLink());
    if($retornos[0] == null) {
        $lista_pesquisadores = array();
    }
    else {
        $lista_pesquisadores = $retornos[0];
    }

    // Redireciona para a view
    session_start();
    $_SESSION["lista_pesquisadores"] = $lista_pesquisadores;
    header("Location:../../Views/Pesquisador/Pesquisadores.php");
?>
