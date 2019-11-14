<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/Imagem.php";
    require_once "../../Persistence/TesteDAO.php";
    require_once "../../Persistence/ImagemDAO.php";
    require_once "../../Utilidades.php";

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
    $retornos = $testeDAO->quantidadeTestes($conexao->getLink());
    if($retornos[0] == null) {
        $qnt = 0;
    }
    else {
        $qnt = $retornos[0];
    }
    $id = (int) $qnt + 1;
    $codigo_acesso = Utilidades::gerarCodigoDeAcesso($id);
    // Cria um teste, ainda sem perguntas
    $teste = new Teste($id, $codigo_acesso, $nome, $descricao, $id_pesquisador, array());

    // Obtem todas as imagens
    $imagemDAO = new ImagemDAO();
    $retornos = $imagemDAO->buscarTodas($conexao->getLink());
    if($retornos[0] == null) {
        $todas_imagens = array();
    }
    else {
        $todas_imagens = $retornos[0];
    }

    // Guarda na sessao
    $_SESSION["teste"] = $teste;
    $_SESSION["todas_imagens"] = $todas_imagens;
    header("Location:../../Views/Pesquisador/NovaPergunta.php");
?>
