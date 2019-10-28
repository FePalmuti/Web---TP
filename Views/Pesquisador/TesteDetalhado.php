<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once "../../Models/Teste.php";
            require_once "../../Models/Pergunta.php";
            require_once "../../Models/Imagem.php";

            session_start();
            $lista_testes = $_SESSION["lista_testes"];
            $pos_teste = $_POST["pos_teste"];

            $teste = $lista_testes[$pos_teste];
            echo $teste->getId(), " - ", $teste->getNome(), " - ", $teste->getCodigoAcesso();
            foreach($teste->getListaPerguntas() as $pergunta) {
                echo "<br>";
                echo "---", $pergunta->getDescricao(), " - ", $pergunta->getTipo();
                echo "<br>";
                foreach($pergunta->getListaImagens() as $imagem) {
                    $arquivo = $imagem->getArquivo();
                    echo "<img src=".$arquivo." height='100'>";
                }
            }
            echo "<br>";
            echo "<br>";
        ?>
    </body>
</html>
