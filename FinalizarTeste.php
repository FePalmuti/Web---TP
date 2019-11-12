<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/TesteDAO.php";
    require_once "../../Models/PerguntaDAO.php";
    require_once "../../Models/ImagemDAO.php";
    require_once "../../Models/Imagem.php";

    session_start();
    $teste = $_SESSION["teste"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Gravacao do teste
    $testeDAO = new TesteDAO();
    $result = $testeDAO->cadastrar($conexao->getLink(), $teste);
    if(! $result) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error($conexao->getLink());
        //header("Location:../../Views/Erros/ErroSQL.php");
        die();
    }

    header("Location:ExibirTestes.php");
?>
