<!DOCTYPE html>
<!--
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
        /*
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
            */
        ?>
        <form action="../../Controllers/Pesquisador/ExibirTestes.php">
            <input type="submit" value="Voltar para seus testes">
        </form>
    </body>
</html>
!-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../Styles/home.css">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class='section-teste'>
        <div class='container-teste'>
            <div class='row'>
                <div class='col-12 wrap-border'>
                    <table class='table table-hover table-dark'>
                        <thead>
                            <div class="button-new">
                            <form action="../../Controllers/Pesquisador/ExibirTestes.php">
                                    <button type="submit" class="button-item-btn">
                                    
                                        <span class="glyphicon glyphicon-plus"></span>Voltar
                                    </button>
                                </form>
                            </div>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Usuário</th>
                              
                            </tr>
                        </thead>
                        <?php
                         require_once "../../Models/Pesquisador.php";

                         session_start();
                         $lista_pesquisadores = $_SESSION["lista_pesquisadores"];
                         $pesquisador_logado = $_SESSION["pesquisador"];


                        $cont = 0;
                        foreach($lista_pesquisadores as $pesquisador) {
                            /*
                            echo "<form action='TesteDetalhado.php', method='post'>";
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<th scope = 'row'>", $teste->getId(), "</th>";
                            echo "<td>", $teste->getCodigoAcesso(), "</td>";
                            echo "<td>", $teste->getNome(), "</td>";
                            echo "<td>", $teste->getDescricao(), "</td>";
                            echo "<td>", "<input type='submit' value='>'>", "</td>";
                            echo "</tr>";
                            echo "<input type='hidden' name='pos_teste' value='" . $cont . "'>";
                            echo "</form>";
                            echo "</tbody>";
                            $cont++;
                            */
                            echo "<tbody>";
                            echo "<td>", $pesquisador->getId(), "</td>";
                            echo "<td>", $pesquisador->getNome(), "</td>";
                            if($pesquisador_logado->getId() != $pesquisador->getId()) {
                                echo "<form action='../../Controllers/Pesquisador/ExcluirPesquisador.php', method='post'>";
                                    echo "<td>", "<input type='submit' value='x'>", "</td>";
                                    echo "<input type='hidden' name='id_pesquisador' value='".$pesquisador->getId()."'>";
                                echo "</form>";
                            }
                            echo "<tr>";
                            echo "</tbody>";
                        }
                        ?>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
