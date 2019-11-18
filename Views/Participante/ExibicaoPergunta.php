<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
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
                    echo "<img src=".$arquivo." height='100'>";
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
    </body>
</html>