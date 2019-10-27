<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/TesteDAO.php";
    require_once "../../Models/PerguntaDAO.php";
    require_once "../../Models/ImagemDAO.php";
    require_once "../../Models/Imagem.php";

    session_start();
    $teste = $_SESSION["teste"];
    $lista_perguntas = $_SESSION["lista_perguntas"];
    $matriz_imagens = $_SESSION["matriz_imagens"];
    echo count($matriz_imagens);

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
        header("Location:../../Views/Erros/ErroSQL.php");
        die();
    }

    // Gravacao de perguntas
    $perguntaDAO = new PerguntaDAO();
    foreach($lista_perguntas as $pergunta) {
        $perguntaDAO->cadastrar($conexao->getLink(), $pergunta);
    }

    // Gravacao de imagens
    $imagemDAO = new ImagemDAO();
    // Os indices das iteracoes comecam em 1 para facilitar nas instanciacoes das imagens;
    // Por isso eh necessario corrigir os acessos com "-1";
    for($num_pergunta=1; $num_pergunta<=count($matriz_imagens); $num_pergunta++) {
        $lista_imagens = $matriz_imagens[$num_pergunta-1];
        for($grau=1; $grau<=count($lista_imagens); $grau++) {
            $arq_imagem = $lista_imagens[$grau-1];
            $imagem = new Imagem($arq_imagem, $grau, $num_pergunta, $teste->getId());
            $imagemDAO->cadastrar($conexao->getLink(), $imagem);
        }
    }

    header("Location:ExibirTestes.php");
?>
