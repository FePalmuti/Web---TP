<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/TesteDAO.php";
    require_once "../../Models/Teste.php";

    session_start();
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $id_pesquisador = $_SESSION["id_pesquisador"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Verifica quantidade de testes
    $testeDAO = new TesteDAO();
    $qnt = $testeDAO->quantidadeTestes($conexao->getLink());
    if(! $qnt) {
        $qnt = 0;
    }
    $id = (int) $qnt + 1;
    $codigo_acesso = Utilidades::gerarCodigoDeAcesso($id);
    // Cria um teste, ainda sem perguntas
    $teste = new Teste($id, $codigo_acesso, $nome, $descricao, $id_pesquisador, array());

    // Guarda na sessao
    $_SESSION["teste"] = $teste;
    header("Location:../../Views/Pesquisador/NovaPergunta.php");
?>
