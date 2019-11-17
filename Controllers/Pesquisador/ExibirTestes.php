<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/TesteDAO.php";
    require_once "../../Models/PerguntaDAO.php";
    require_once "../../Models/Pergunta.php";
    require_once "../../Models/ImagemDAO.php";
    require_once "../../Models/Imagem.php";

    session_start();
    $id_pesquisador = $_SESSION["id_pesquisador"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Busca os testes
    $testeDAO = new TesteDAO();
    $lista_testes = $testeDAO->buscar($conexao->getLink(), $id_pesquisador);
    if(! $lista_testes) {
        $lista_testes = array();
    }

    // Redireciona para a view
    $_SESSION["lista_testes"] = $lista_testes;
    header("Location:../../Views/Pesquisador/Testes.php");
?>
