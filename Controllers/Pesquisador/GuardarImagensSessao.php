<?php
    require_once "../../Models/Teste.php";
    require_once "../../Models/Imagem.php";

    session_start();
    $qnt_imagens = $_SESSION["qnt_imagens"];
    $teste = $_SESSION["teste"];
    $num_pergunta = count($teste->getListaPerguntas());

    $lista_imagens = array();
    for($grau=1; $grau<=$qnt_imagens; $grau++) {
        // Verifica se foi passado um arquivo, caso contrario, obtem a URL
        // passada, mesmo que seja uma string vazia.
        $url_imagem = $_POST["url_img_".$grau];
        if($url_imagem != "") {
            echo "1";
            $arquivo = $url_imagem;
        }
        else {
            echo "2";
            $arq_imagem = $_FILES["arq_img_".$grau];
            if(isset($arq_imagem)) {
                echo "3";
                $novo_nome = $grau."-".$num_pergunta."-".$teste->getId();
                $extensao = strtolower(substr($arq_imagem["name"], -4));
                $diretorio = "../../Img/".$novo_nome.$extensao;
                move_uploaded_file($arq_imagem["tmp_name"], $diretorio);
                $arquivo = $diretorio;
            }
            else {
                echo "4";
                $arquivo = "";
            }
        }
        $imagem = new Imagem($arquivo, $grau, $num_pergunta, $teste->getId());
        array_push($lista_imagens, $imagem);
    }
    $_SESSION["teste"]->adicionarImagensNaUltimaPergunta($lista_imagens);

    header("Location:../../Views/Pesquisador/NovaPergunta.php");
?>
