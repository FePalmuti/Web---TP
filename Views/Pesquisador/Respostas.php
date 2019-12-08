<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once "../../Models/RespostaTeste.php";
            require_once "../../Models/DadosDemograficos.php";
            require_once "../../Models/RespostaPergunta.php";

            session_start();
            $lista_respostas = $_SESSION["lista_respostas"];

            if(count($lista_respostas) == 0) {
                echo "Esse teste ainda nao foi respondido...";
            }
            else {
                foreach($lista_respostas as $resposta_teste) {
                    echo "------------------------------------------------------", "<br>";
                    echo $resposta_teste->getId(), "<br>";
                    echo "---", "<br>";
                    $dados_demograficos = $resposta_teste->getDadosDemograficos();
                    echo "(",$dados_demograficos->getEmail(),"/",$dados_demograficos->getCep(),")", "<br>";
                    echo "---", "<br>";
                    foreach($resposta_teste->getListaRespostaPergunta() as $resposta_pergunta) {
                        echo "(",$resposta_pergunta->getEntradaParticipante(),"/",$resposta_pergunta->getGrauEscolhido(),")", "<br>";
                    }
                    echo "------------------------------------------------------", "<br>";
                    echo "<br>";
                }
                echo "<form action='../../Controllers/Pesquisador/GerarCSV.php' method='post'>";
                    echo "<input type='submit' value='Gerar relatorio'>";
                echo "</form>";
            }
        ?>
    </body>
</html>
