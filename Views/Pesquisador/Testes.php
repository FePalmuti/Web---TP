<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once "../../Models/Teste.php";

            $lista_testes = $_SESSION["lista_testes"];
            foreach($lista_testes as $teste) {
                echo $teste->getId(), " - ", $teste->getNome();
                echo "<br>";
            }
        ?>
        <form action="../../Views/Pesquisador/NovoTeste.php">
            <input type="submit" value="Novo">
        </form>
    </body>
</html>
