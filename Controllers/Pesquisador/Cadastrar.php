<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Pesquisador.php";
    require_once "../../Persistence/PesquisadorDAO.php";

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $adm = $_POST["adm"];
    // Criptografa senha
    $senha = md5($senha);

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Verifica proximo id
    $pesquisadorDAO = new PesquisadorDAO();
    $retornos = $pesquisadorDAO->proximoId($conexao->getLink());
    if($retornos[0] == null) {
        header("Location:../../Views/Erros/ErroSQL.php?id_erro=".$retornos[1]."&erro=".$retornos[2]);
        die();
    }
    else {
        $id = $retornos[0];
    }

    // Cria o pesquisador
    $pesquisador = new Pesquisador($id, $nome, $senha, $adm);
    $retornos = $pesquisadorDAO->cadastrar($conexao->getLink(), $pesquisador);
    if($retornos[0] == null) {
        header("Location:../../Views/Erros/ErroSQL.php?id_erro=".$retornos[1]."&erro=".$retornos[2]);
        die();
    }

    header("Location:../../Views/Pesquisador/PesquisadorCadastrado.php");
?>
