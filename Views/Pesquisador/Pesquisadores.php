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
            require_once "../../Models/Pesquisador.php";

            session_start();
            $lista_pesquisadores = $_SESSION["lista_pesquisadores"];
            $pesquisador_logado = $_SESSION["pesquisador"];

            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Usuário</th>";
                echo "</tr>";
                foreach($lista_pesquisadores as $pesquisador) {
                    echo "<tr>";
                        echo "<td>", $pesquisador->getId(), "</td>";
                        echo "<td>", $pesquisador->getNome(), "</td>";
                        // Excluir
                        if($pesquisador_logado->getId() != $pesquisador->getId()) {
                            echo "<form action='../../Controllers/Pesquisador/ExcluirPesquisador.php', method='post'>";
                                echo "<td>", "<input type='submit' value='x'>", "</td>";
                                echo "<input type='hidden' name='id_pesquisador' value='".$pesquisador->getId()."'>";
                            echo "</form>";
                        }
                    echo "</tr>";
                }
            echo "</table>";
            echo "<br>";
        ?>
        <form action="../../Controllers/Pesquisador/ExibirTestes.php">
            <input type="submit" value="Voltar para seus testes">
        </form>
    </body>
</html>
