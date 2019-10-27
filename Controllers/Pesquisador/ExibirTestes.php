<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/TesteDAO.php";
    require_once "../../Models/PerguntaDAO.php";

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
    // Busca as perguntas
    $perguntaDAO = new PerguntaDAO();
    $matriz_perguntas = array();
    foreach($lista_testes as $teste) {
        $lista_perguntas = $perguntaDAO->buscar($conexao->getLink(), $teste->getId());
        if(! $lista_perguntas) {
            $lista_perguntas = array();
        }
        array_push($matriz_perguntas, $lista_perguntas);
    }

    // Redireciona para a view
    $_SESSION["lista_testes"] = $lista_testes;
    $_SESSION["matriz_perguntas"] = $matriz_perguntas;
    $_SESSION["matriz_imagens"] = array();
    header("Location:../../Views/Pesquisador/Testes.php");
?>
