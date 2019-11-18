<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/PesquisadorDAO.php";
    require_once "../../Models/Pesquisador.php";

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    
    // Criptografa senha
<<<<<<< HEAD
    // $senha = md5($senha);
=======
//    $senha = md5($senha);
>>>>>>> master

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Verifica quantidade de pesquisadores
    $pesquisadorDAO = new PesquisadorDAO();
    $qnt = $pesquisadorDAO->quantidadePesquisadores($conexao->getLink());
    if(! $qnt) {
        $qnt = 0;
    }
    $id = $qnt + 1;

    // Cria o pesquisador
    $pesquisador = new Pesquisador($id, $nome, $senha, True);
    $result = $pesquisadorDAO->cadastrar($conexao->getLink(), $pesquisador);
    if(! $result) {
        header("Location:../../Views/Erros/ErroSQL.php");
        die();
    }

    // Inicia sessao
    session_start();
    $_SESSION["id_pesquisador"] = $pesquisador->getId();
    header("Location:ExibirTestes.php");
?>
