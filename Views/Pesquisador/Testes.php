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
                <div class='col-12 wrap-login100'>
                    <table class='table table-hover table-dark'>
                        <thead>
                            <div class="button-new">
                                <form action="NovoTeste.php">
                                    <button type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-plus"></span> novo item
                                    </button>
                                </form>
                            </div>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Código de acesso</th>
                                <th scope='col'>Título</th>
                                <th scope='col'>Descrição</th>
                                <th scope='col'>Ação</th>
                            </tr>
                        </thead>
                        <?php
                        require_once "../../Models/Teste.php";

                        session_start();
                        $lista_testes = $_SESSION["lista_testes"];


                        $cont = 0;
                        foreach ($lista_testes as $teste) {
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