<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Pesquisador.php";
    require_once "../../Persistence/PesquisadorDAO.php";

    $id_pesquisador = $_POST["id_pesquisador"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Exclusao do pesquisador
    $pesquisadorDAO = new PesquisadorDAO();
    $retornos = $pesquisadorDAO->excluir($conexao->getLink(), $id_pesquisador);
    if($retornos[0] == null) {
        header("Location:../../Views/Erros/ErroSQL.php?id_erro=".$retornos[1]."&erro=".$retornos[2]);
        die();
    }

    // Redireciona para a view
    header("Location:../../Views/Pesquisador/PesquisadorExcluido.php");
?>
