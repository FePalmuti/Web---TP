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
    // Busca imagens
    $imagemDAO = new ImagemDAO();
    $matriz_imagens = array();
    for($i=0; $i<count($matriz_perguntas); $i++) {
        array_push($matriz_imagens, array());
        $lista_perguntas = $matriz_perguntas[$i];
        for($j=0; $j<count($lista_perguntas); $j++) {
            array_push($matriz_imagens[$i], array());
            $pergunta = $lista_perguntas[$j];
            $lista_imagens = $imagemDAO->buscar($conexao->getLink(), $pergunta->getNumero(), $lista_testes[$i]->getId());
            if(! $lista_imagens) {
                $lista_imagens = array();
            }
            $matriz_imagens[$i][$j] = $lista_imagens;
        }
    }

    // Redireciona para a view
    $_SESSION["lista_testes"] = $lista_testes;
    $_SESSION["matriz_perguntas"] = $matriz_perguntas;
    $_SESSION["matriz_imagens"] = $matriz_imagens;
    header("Location:../../Views/Pesquisador/Testes.php");
?>
