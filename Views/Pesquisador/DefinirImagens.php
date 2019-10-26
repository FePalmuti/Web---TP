<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="../../Controllers/Pesquisador/GuardarImagensSessao.php", method="post">
            <?php
                $qnt_imagens = $_SESSION["qnt_imagens"];
                for ($i=0; $i<$qnt_imagens; $i++) {
                    echo "<input type='text' name='img_".$i."'>";
                    echo "<br>";
                }
            ?>
            <br>
            <input type="submit" value="Guardar imagens">
        </form>
    </body>
</html>
