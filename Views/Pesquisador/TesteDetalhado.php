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
            require_once "../../Models/Alternativa.php";

            session_start();
            $lista_testes = $_SESSION["lista_testes"];
            $pos_teste = $_POST["pos_teste"];

            $teste = $lista_testes[$pos_teste];
            // Printa informacoes sobre o teste
            echo $teste->getId(), "<br>", $teste->getNome(), "<br>", $teste->getCodigoAcesso(), "<br>";
            foreach($teste->getListaPerguntas() as $pergunta) {
                // Printa informacoes sobre a pergunta
                echo "<br>", $pergunta->getNumero(), " - ", $pergunta->getDescricao(), " - ", $pergunta->getTipo(), "<br>";
                foreach($pergunta->getListaAlternativas() as $alternativa) {
                    $arquivo = $alternativa->getArquivoImagem();
                    echo "<img src=".$arquivo." height='100'>";
                }
                echo "<br>";
            }
        ?>
    </body>
</html>
