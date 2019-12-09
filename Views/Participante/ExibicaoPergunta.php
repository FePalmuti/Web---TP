<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Styles/home.css">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
    <body>

    <div class="section-login">
        <div class="container-cadastro">
            <div class="row wrap-border">
                <div class="col-4 col-sm-6">
                <div class="login100-form-title">
						<h1> Teste </h1>
                </div>

                <?php
            require_once "../../Models/Teste.php";
            require_once "../../Models/Pergunta.php";
            require_once "../../Models/Alternativa.php";
            session_start();
            $teste = $_SESSION["teste"];
            $indice = $_SESSION["contador_perguntas"];
            $pergunta = $teste->getListaPerguntas()[$indice];
            echo "<form action='../../Controllers/Participante/AvancarPergunta.php' method='post'>";
                // Printa informacoes sobre a pergunta
                echo $pergunta->getNumero(), "<br>";
                // Possibilidade de entrada do usuario
                if($pergunta->getDescricao() == "X") {
                    echo "<input type='text' name='entrada_participante'>", "<br>";
                }
                else {
                    echo $pergunta->getDescricao(), "<br>";
                }
                foreach($pergunta->getListaAlternativas() as $alternativa) {
                    $arquivo = $alternativa->getArquivoImagem();
                    
                    echo "<img src=".$arquivo." height='70' style = 'padding: 1px'>";
                }
                echo "<br>";
                // Se eh discreta ou continua
                if($pergunta->getTipo() == "discreta") {
                    for($i=1; $i<=count($pergunta->getListaAlternativas()); $i++) {
                        echo "<input type='radio' name='escolha' value='".$i."'>";
                    }
                }
                else if($pergunta->getTipo() == "continua") {
                    echo "<input type='range' name='escolha' min='0' max='100' step='1' style='width:400px'>";
                }
                echo "<br>";
                echo "<input type='submit' value='Continuar'>";
            echo "</form>";
        ?>
        </div>
            </div>
        </div>
    </div>
    </body>
</html>
