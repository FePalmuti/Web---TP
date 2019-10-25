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

            $lista_testes = $_SESSION["lista_testes"];
            $matriz_perguntas = $_SESSION["matriz_perguntas"];
            for($i=0; $i<count($lista_testes); $i++) {
                $teste = $lista_testes[$i];
                $lista_perguntas = $matriz_perguntas[$i];
                echo $teste->getId(), " - ", $teste->getNome();
                foreach($lista_perguntas as $pergunta) {
                    echo "<br>";
                    echo "---", $pergunta->getDescricao(), " - ", $pergunta->getTipo();
                }
                echo "<br>";
            }
        ?>
        <form action="../../Views/Pesquisador/NovoTeste.php">
            <input type="submit" value="Novo">
        </form>
    </body>
</html>
