<?php
    require_once "../../Models/Pesquisador.php";
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Persistence/TesteDAO.php";
    require_once "../../Utilidades.php";

    session_start();
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $id_pesquisador = $_SESSION["pesquisador"]->getId();

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Verifica proximo id
    $testeDAO = new TesteDAO();
    $retornos = $testeDAO->proximoId($conexao->getLink());
    if($retornos[0] == null) {
        header("Location:../../Views/Erros/ErroSQL.php?id_erro=".$retornos[1]."&erro=".$retornos[2]);
        die();
    }
    else {
        $id = $retornos[0];
    }

    $codigo_acesso = Utilidades::gerarCodigoDeAcesso($id);
    // Cria um teste, ainda sem perguntas
    $teste = new Teste($id, $codigo_acesso, $nome, $descricao, $id_pesquisador, array());

    // Guarda na sessao
    $_SESSION["teste"] = $teste;
    header("Location:../../Views/Pesquisador/NovaPergunta.php");
?>
