<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/Pergunta.php";
    require_once "../../Models/Imagem.php";
    require_once "../../Persistence/ImagemDAO.php";

    session_start();
    $teste = $_SESSION["teste"];
    $qnt_perguntas = count($teste->getListaPerguntas());

    $numero = $qnt_perguntas + 1;
    $instrucoes = $_POST["instrucoes"];
    $descricao = $_POST["descricao"];
    $tipo = $_POST["tipo"];
    $id_teste = $teste->getId();

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Cria a pergunta
    $pergunta = new Pergunta($numero, $instrucoes, $descricao, $tipo, $id_teste, array());
    // Guarda a pergunta como pendente
    $_SESSION["pergunta_pendente"] = $pergunta;

    // Obtem todas as imagens
    $imagemDAO = new ImagemDAO();
    $retornos = $imagemDAO->buscarTodas($conexao->getLink());
    if($retornos[0] == null) {
        $todas_imagens = array();
    }
    else {
        $todas_imagens = $retornos[0];
    }

    // Guarda na sessao a quantidade de imagens que devem ser dadas pelo usuario
    $qnt_imagens = $_POST["qnt_imagens"];
    $_SESSION["qnt_imagens"] = $qnt_imagens;
    $_SESSION["todas_imagens"] = $todas_imagens;
    header("Location:../../Views/Pesquisador/DefinicaoImagens.php");
?>
