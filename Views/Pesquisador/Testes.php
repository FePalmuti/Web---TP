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
            $matriz_perguntas = $_SESSION["matriz_perguntas"];
            $matriz_imagens = $_SESSION["matriz_imagens"];

            for($i=0; $i<count($lista_testes); $i++) {
                $teste = $lista_testes[$i];
                $lista_perguntas = $matriz_perguntas[$i];
                echo $teste->getId(), " - ", $teste->getNome();
                for($j=0; $j<count($lista_perguntas); $j++) {
                    $pergunta = $matriz_perguntas[$i][$j];
                    echo "<br>";
                    echo "---", $pergunta->getDescricao(), " - ", $pergunta->getTipo();
                    echo "<br>";
                    $lista_imagens = $matriz_imagens[$i][$j];
                    for($k=0; $k<count($lista_imagens); $k++) {
                        $imagem = $matriz_imagens[$i][$j][$k];
                        $arquivo = $imagem->getArquivo();
                        echo "<img src=".$arquivo." height='100'>";
                    }
                }
                echo "<br>";
            }
        ?>
        <form action="../../Views/Pesquisador/NovoTeste.php">
            <input type="submit" value="Novo">
        </form>
    </body>
</html>
