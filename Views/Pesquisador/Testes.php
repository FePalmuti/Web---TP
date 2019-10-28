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
            $lista_testes = $_SESSION["lista_testes"];

            $cont = 0;
            foreach($lista_testes as $teste) {
                echo "<form action='TesteDetalhado.php', method='post'>";
                    echo $teste->getId(), " - ", $teste->getNome(), " - ", $teste->getCodigoAcesso(), " - ";
                    echo "<input type='hidden' name='pos_teste' value='".$cont."'>";
                    echo "<input type='submit' value='>'>";
                echo "</form>";
                echo "<br>";
                $cont++;
            }
        ?>
        <form action="NovoTeste.php">
            <input type="submit" value="Novo">
        </form>
    </body>
</html>
