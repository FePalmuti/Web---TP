<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="../../Controllers/Pesquisador/GuardarImagensSessao.php", method="post", enctype="multipart/form-data">
            <?php
                session_start();
                $qnt_imagens = $_SESSION["qnt_imagens"];
                for ($i=1; $i<=$qnt_imagens; $i++) {
                    echo "<input type='file' name='arq_img_".$i."'>";
                    echo "<br>";
                }
            ?>
            <br>
            <input type="submit" value="Guardar imagens">
        </form>
    </body>
</html>
