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
            require_once "../../Models/Pesquisador.php";

            session_start();
            $pesquisador = $_SESSION["pesquisador"];
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
                    echo "<tr>";
                        echo "<td>", $teste->getId(), "</td>";
                        echo "<td>", $teste->getCodigoAcesso(), "</td>";
                        echo "<td>", $teste->getNome(), "</td>";
                        echo "<td>", $teste->getDescricao(), "</td>";
                        // Detalhes
                        echo "<form action='TesteDetalhado.php', method='post'>";
                            echo "<td>", "<input type='submit' value='Detalhes'>", "</td>";
                            echo "<input type='hidden' name='pos_teste' value='".$cont."'>";
                        echo "</form>";
                        // Respostas
                        echo "<form action='../../Controllers/Pesquisador/ExibirRespostas.php', method='post'>";
                            echo "<td>", "<input type='submit' value='Repostas'>", "</td>";
                            echo "<input type='hidden' name='pos_teste' value='".$cont."'>";
                        echo "</form>";
                        // Excluir
                        echo "<form action='../../Controllers/Pesquisador/ExcluirTeste.php', method='post'>";
                            echo "<td>", "<input type='submit' value='x'>", "</td>";
                            echo "<input type='hidden' name='pos_teste' value='".$cont."'>";
                        echo "</form>";
                    echo "</tr>";
                    $cont++;
                }
            echo "</table>";
            echo "<br>";
        ?>
        <form action="NovoTeste.php">
            <input type="submit" value="Cadastrar Novo Teste">
        </form>
        <?php
            if($pesquisador->isAdm()) {
                echo "<form action='Cadastro.php'>";
                    echo "<input type='submit' value='Cadastrar Novo Pesquisador'>";
                echo "</form>";
            }
        ?>
    </body>
</html>
