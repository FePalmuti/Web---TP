        <?php

            require_once "../../Models/Teste.php";
            require_once "../../Models/Pesquisador.php";

            session_start();
            $pesquisador = $_SESSION["pesquisador"];
            $lista_testes = $_SESSION["lista_testes"];
            /*
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
            */
        ?>



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
    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
        <a class="navbar-brand" href="../Home.php">HOME</a>
    </nav>

    <div class='section-teste'>
        <div class='container-teste'>
            <div class='row'>
                <div class='col-12 wrap-border'>
                    <table class='table table-hover table-dark'>
                        <thead>
                            <div class="button-new">

        <form action="NovoTeste.php">
            <tr>
            <button type="submit" class="btn btn-success">Cadastrar Novo Teste</button>
            <br>
        </form>
        <?php
            if($pesquisador->isAdm()) {
                echo "<tr>";

                echo "<form action='Cadastro.php'>";
                    /*echo "<input type='submit' value='Cadastrar Novo Pesquisador'>";*/
                    echo "<button type='submit' class='btn btn-success'>Cadastrar Novo Pesquisador</button>";
                echo "</form>";
                echo "<tr>";
                echo "<form action='../../Controllers/Pesquisador/ExibirPesquisadores.php'>";
                    /*echo "<input type='submit' value='Lista de Pesquisadores'>";*/
                    echo "<button type='submit' class='btn btn-success'>Lista de Pesquisadores</button>";
                echo "</form>";
            }
        ?>


                        </thead>
                        <th scope='col'>ID</th>
                        <th scope='col'>Código de acesso</th>
                        <th scope='col'>Título</th>
                        <th scope='col'>Descrição</th>

                        <?php



                          $cont = 0;
                          foreach($lista_testes as $teste) {

                            echo "<tbody>";
                            echo "<td>", $teste->getId(), "</td>";
                            echo "<td>", $teste->getCodigoAcesso(), "</td>";
                            echo "<td>", $teste->getNome(), "</td>";
                            echo "<td>", $teste->getDescricao(), "</td>";
                            // Detalhes
                            echo "<form action='TesteDetalhado.php', method='post'>";
                            //echo "<td>", "<input type='submit' value='Detalhes'>", "</td>";
                            echo "<td>", "<button type='submit' class='btn btn-success' value='Detalhes'>Detalhes</button>", "</td>";
                            echo "<input type='hidden' name='pos_teste' value='".$cont."'>";

                            echo "</form>";
                            // Respostas
                            echo "<form action='../../Controllers/Pesquisador/ExibirRespostas.php', method='post'>";
                            //echo "<td>", "<input type='submit' value='Repostas'>", "</td>";
                            echo "<td>", "<button type='submit' class='btn btn-success' value='Detalhes'>Respostas</button>", "</td>";
                            echo "<input type='hidden' name='pos_teste' value='".$cont."'>";
                            echo "</form>";
                            // Excluir
                            echo "<form action='../../Controllers/Pesquisador/ExcluirTeste.php', method='post'>";
                            //echo "<td>", "<input type='submit' value='x'>", "</td>";
                            echo "<td>", "<button type='submit' class='btn btn-success' value='Detalhes'>X</button>", "</td>";
                            echo "<input type='hidden' name='pos_teste' value='".$cont."'>";
                            echo "</form>";
                            echo "</tr>";
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
