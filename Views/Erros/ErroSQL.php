<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            $id_erro =  $_GET["id_erro"];
            $erro =  $_GET["erro"];

            if($id_erro == "") {
                echo "Dados digitados incorretamente!";
            }
            elseif($id_erro == "1062") {
                echo "Usuario ja cadastrado!";
            }
            else {
                echo $id_erro;
                echo "<br>";
                echo $erro;
            }
        ?>
    </body>
</html>
