<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <?php
            require_once "../../Models/Teste.php";

            session_start();
            $lista_testes = $_SESSION["lista_testes"];

            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Código de acesso</th>";
                    echo "<th>Título</th>";
                    echo "<th>Descrição</th>";
                echo "</tr>";
                $cont = 0;
                foreach($lista_testes as $teste) {
                    echo "<form action='TesteDetalhado.php', method='post'>";
                            echo "<tr>";
                                echo "<td>", $teste->getId(), "</td>";
                                echo "<td>", $teste->getCodigoAcesso(), "</td>";
                                echo "<td>", $teste->getNome(), "</td>";
                                echo "<td>", $teste->getDescricao(), "</td>";
                                echo "<td>", "<input type='submit' value='>'>", "</td>";
                            echo "</tr>";
                        echo "<input type='hidden' name='pos_teste' value='".$cont."'>";
                    echo "</form>";
                    $cont++;
                }
            echo "</table>";
            echo "<br>";
        ?>
        <form action="NovoTeste.php">
            <input type="submit" value="Novo">
        </form>
    </body>
</html>
