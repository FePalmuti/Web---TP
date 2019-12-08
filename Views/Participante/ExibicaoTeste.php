<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once "../../Models/Teste.php";

            session_start();
            $teste = $_SESSION["teste"];
            $_SESSION["contador_perguntas"] = 0;

            echo $teste->getNome(), "<br>", $teste->getDescricao(), "<br>";

            echo "<br>";
        ?>
        <form action="ExibicaoPergunta.php">
            <input type="submit" value="Continuar">
        </form>
    </body>
</html>
