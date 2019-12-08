<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Persistence/TesteDAO.php";

    session_start();
    $pos_teste = $_POST["pos_teste"];
    $teste = $_SESSION["lista_testes"][$pos_teste];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Exclusao do teste
    $testeDAO = new TesteDAO();
    $retornos = $testeDAO->excluir($conexao->getLink(), $teste->getId());
    if($retornos[0] == null) {
        header("Location:../../Views/Erros/ErroSQL.php?id_erro=".$retornos[1]."&erro=".$retornos[2]);
        die();
    }

    // Redireciona para a view
    header("Location:../../Views/Pesquisador/TesteExcluido.php");
?>
