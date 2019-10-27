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
            require_once "../../Models/Imagem.php";

            session_start();
            $lista_testes = $_SESSION["lista_testes"];

            foreach($lista_testes as $teste) {
                echo $teste->getId(), " - ", $teste->getNome();
                foreach($teste->getListaPerguntas() as $pergunta) {
                    echo "<br>";
                    echo "---", $pergunta->getDescricao(), " - ", $pergunta->getTipo();
                    echo "<br>";
                    foreach($pergunta->getListaImagens() as $imagem) {
                        $arquivo = $imagem->getArquivo();
                        echo "<img src=".$arquivo." height='100'>";
                    }
                }
                echo "<br>";
                echo "<br>";
            }
        ?>
        <form action="../../Views/Pesquisador/NovoTeste.php">
            <input type="submit" value="Novo">
        </form>
    </body>
</html>
