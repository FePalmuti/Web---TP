<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../Styles/home.css">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
            .scroll {
                overflow-x: hidden;
                overflow-y: scroll;
                height: 400px;
            }
            img {
                margin-left: 10px;
                margin-bottom: 10px;
                height: 100px;
            }
            .margem_esq {
                margin-left: 40px;
            }
            .selecionada {
                border:solid 1px red;
            }
        </style>
        <script type="text/javascript">
            var label_img_selecionada = "Nenhuma";
            var img_selecionada = null;

            function marcarImagemSelecionada(caminho_imagem) {
                this.label_img_selecionada = caminho_imagem;
                
                document.querySelectorAll('.container-image').forEach(
                    (element) => {
                        element.children[1].classList.remove('selected');
                    }
                );

                document.getElementsByName(caminho_imagem)[0].children[1].classList.add('selected');
            }

            function encaminharImagem(nome_botao) {
                // Ignora o "bt_"
                numero = nome_botao.substring(3);
                if(label_img_selecionada != "Nenhuma") {
                    document.getElementById("lb_img_" + numero).innerHTML = label_img_selecionada;
                    document.getElementById("dir_img_" + numero).value = label_img_selecionada;
                }
            }
        </script>
    </head>
    <body>
        <form action="../../Controllers/Pesquisador/GuardarAlternativasSessao.php", method="post", enctype="multipart/form-data">
            <?php
                require_once "../../Models/Imagem.php";

                session_start();
                $qnt_imagens = $_SESSION["qnt_imagens"];
                $todas_imagens = $_SESSION["todas_imagens"];

                echo "<div class = 'section-container'>";
                    for($i=1; $i<=$qnt_imagens; $i++) {
                        echo "<div>";
                        echo "<div class = 'row'>";
                        echo "<div class = 'col-12 container-inputs'>";
                        echo "<input type='button' id='bt_".$i."' value='Adicionar a imagem selecionada' onclick='encaminharImagem(this.id);'>";
                        echo " ";
                        echo "<label id='lb_img_".$i."'>Nenhuma</label>";
                      

                        echo "<input type='hidden' id='dir_img_".$i."' name='dir_img_".$i."'>";
                        
                        echo "<input class='margem_esq' type='file' name='arq_img_".$i."'>";
                        echo "<br>";
                    
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                echo "</div>";
                echo "<br>";
                echo "<div class='scroll' id='images-selector'>";
                    $cont = 0;
                    foreach($todas_imagens as $imagem) {
                        $arquivo = $imagem->getArquivo();
                        // echo "<div class='img-container'><div class='img-hover'></div></div>";
                        echo '<div class="container-image margin-5" name="'.$arquivo.'" onclick="marcarImagemSelecionada(\''.$arquivo.'\');"><img class = "img-hover" src="'.$arquivo.'"><div class="overlay"></div></div>';
                        $cont++;
                        // 3 imagens por linha
                        if($cont % 3 == 0) {
                            echo "<br>";
                        }
                    }
                echo "</div>";
            ?>
            <br>
            <input type="submit" value="Guardar imagens">
        </form>
    </body>
</html>
