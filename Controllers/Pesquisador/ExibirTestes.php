<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/Pergunta.php";
    require_once "../../Models/Alternativa.php";
    require_once "../../Models/Imagem.php";
    require_once "../../Persistence/TesteDAO.php";
    require_once "../../Persistence/PerguntaDAO.php";
    require_once "../../Persistence/AlternativaDAO.php";
    require_once "../../Persistence/ImagemDAO.php";

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
    $retornos = $testeDAO->buscar($conexao->getLink(), $id_pesquisador);
    if($retornos[0] == null) {
        $lista_testes = array();
    }
    else {
        $lista_testes = $retornos[0];
    }

    // Redireciona para a view
    $_SESSION["lista_testes"] = $lista_testes;
    header("Location:../../Views/Pesquisador/Testes.php");
?>
