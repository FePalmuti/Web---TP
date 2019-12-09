<!--
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
    !--> 
        <?php 
        /*
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
            */
        ?>
<!--
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
