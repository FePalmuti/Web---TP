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
                echo $teste->getId(), " - ", $teste->getNome(), " - ", $teste->getCodigoAcesso();
                echo "<a href='TesteDetalhado.php?pos_teste=".$cont."'>></a>";
                echo "<br>";
                $cont++;
            }
            echo "<br>";
        ?>
        <form action="NovoTeste.php">
            <input type="submit" value="Novo">
        </form>
    </body>
</html>
