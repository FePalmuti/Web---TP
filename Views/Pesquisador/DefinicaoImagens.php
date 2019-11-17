<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
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
        </style>
        <script type="text/javascript">
            var imagem_selecionada = "Nenhuma";

            function marcarImagemSelecionada(caminho_imagem) {
                imagem_selecionada = caminho_imagem;
            }

            function encaminharImagem(nome_botao) {
                // Ignora o "bt_"
                numero = nome_botao.substring(3);
                if(imagem_selecionada != "Nenhuma") {
                    document.getElementById("lb_img_" + numero).innerHTML = imagem_selecionada;
                    document.getElementById("dir_img_" + numero).value = imagem_selecionada;
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

                echo "<div>";
                    for($i=1; $i<=$qnt_imagens; $i++) {
                        echo "<input type='button' id='bt_".$i."' value='Adicionar a imagem selecionada' onclick='encaminharImagem(this.id);'>";
                        echo " ";
                        echo "<label id='lb_img_".$i."'>Nenhuma</label>";
                        echo "<input type='hidden' id='dir_img_".$i."' name='dir_img_".$i."'>";

                        echo "<input class='margem_esq' type='file' name='arq_img_".$i."'>";
                        echo "<br>";
                    }
                echo "</div>";
                echo "<br>";
                echo "<div class='scroll'>";
                    $cont = 0;
                    foreach($todas_imagens as $imagem) {
                        $arquivo = $imagem->getArquivo();
                        echo "<img src='".$arquivo."' name='".$arquivo."' onclick='marcarImagemSelecionada(this.name);'>";
                        $cont++;
                        // 3 imagens por linha
                        if($cont == 3) {
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
