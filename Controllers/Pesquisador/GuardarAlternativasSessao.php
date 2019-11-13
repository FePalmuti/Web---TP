<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/Alternativa.php";
    require_once "../../Models/Imagem.php";
    require_once "../../Persistence/ImagemDAO.php";

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    session_start();
    $qnt_imagens = $_SESSION["qnt_imagens"];
    $teste = $_SESSION["teste"];
    $num_pergunta = count($teste->getListaPerguntas());

    $lista_alternativas = array();
    $imagemDAO = new ImagemDAO();
    // Verifica a caixa de texto e depois o campo de upload
    for($grau=1; $grau<=$qnt_imagens; $grau++) {
        if($_POST["dir_img_".$grau] != "") {
            $diretorio_imagem = $_POST["dir_img_".$grau];
        }
        else if(isset($_FILES["arq_img_".$grau])) {
            // Verifica quantidade de imagens
            $qnt = $imagemDAO->quantidadeImagens($conexao->getLink());
            if(! $qnt) {
                $qnt = 0;
            }
            $id_imagem = $qnt + 1;
            //
            $arq_imagem = $_FILES["arq_img_".$grau];
            $extensao = strtolower(substr($arq_imagem["name"], -4));
            $diretorio_imagem = "../../Img/".$id_imagem.$extensao;
            move_uploaded_file($arq_imagem["tmp_name"], $diretorio_imagem);
            $imagem = new Imagem($id_imagem, $diretorio_imagem, $_POST["tag_img_".$grau]);
            // Grava a imagem
            $result = $imagemDAO->cadastrar($conexao->getLink(), $imagem);
            if(! $result) {
                header("Location:../../Views/Erros/ErroSQL.php");
                die();
            }
            //
        }
        else {
            $diretorio_imagem = "erro";
        }
        $alternativa = new Alternativa($diretorio_imagem, $grau, $num_pergunta, $teste->getId());
        array_push($lista_alternativas, $alternativa);
    }

    $_SESSION["teste"]->adicionarAlternativasNaUltimaPergunta($lista_alternativas);

    header("Location:../../Views/Pesquisador/NovaPergunta.php");
?>
