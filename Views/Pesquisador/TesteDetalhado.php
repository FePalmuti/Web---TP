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
                    <h1>Teste Detalhado</h1>
                        <thead>
                            <div class="button-new">
                                    </button>
                                </form>
                            </div>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Título</th>
                                <th scope='col'>Código de acesso</th>
                            </tr>
                        </thead>
        <?php
            require_once "../../Models/Teste.php";
            require_once "../../Models/Pergunta.php";
            require_once "../../Models/Alternativa.php";

            session_start();
            $lista_testes = $_SESSION["lista_testes"];
            $pos_teste = $_POST["pos_teste"];

            $teste = $lista_testes[$pos_teste];
            // Printa informacoes sobre o teste
            //echo $teste->getId(), "<br>", $teste->getNome(), "<br>", $teste->getCodigoAcesso(), "<br>";
            foreach($teste->getListaPerguntas() as $pergunta) 
            {
                // Printa informacoes sobre a pergunta
                echo "<br>", $pergunta->getNumero(), " - ", $pergunta->getDescricao(), " - ", $pergunta->getTipo(), "<br>";
                foreach($pergunta->getListaAlternativas() as $alternativa) {
                    $arquivo = $alternativa->getArquivoImagem();
                    echo "<img src=".$arquivo." height='100'>";
                    echo "</tr>";
                }
                echo "<br>";
            }

            
            echo "<form action='TesteDetalhado.php', method='post'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope = 'row'>", $teste->getId(), "</th>";
            echo "<td>", $teste->getNome(), "</td>";
            echo "<td>", $teste->getCodigoAcesso(), "</td>";
            
        ?>
    </body>
</html>
