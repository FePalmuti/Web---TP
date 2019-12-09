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
                //echo "Dados digitados incorretamente!";
               echo "<script>alert('Dados digitados incorretamente!');  onload = history.back(); </script>";
        
           
            }
            elseif($id_erro == "1062") {
                //echo "Elemento ja cadastrado!";
                echo "<script>alert('Elemento ja cadastrado!');  onload = history.back(); </script>";
            }
            else {
                echo $id_erro;
                echo "<br>";
                echo $erro;
            }
        ?>
    </body>
</html>
