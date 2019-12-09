<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://d3js.org/d3.v5.js"></script>
        <style>
            .scroll {
                overflow-x: hidden;
                overflow-y: scroll;
                width: 700px;
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
/*                border:solid 2px red;*/
            }
            html, body {
                background-color: #A8D8D6;
            }
        </style>
        <script type="text/javascript">
            var label_img_selecionada = "Nenhuma";
            var img_selecionada = null;
            var todas_imagens = [];

            function marcarImagemSelecionada(id_img, caminho_imagem) {
                label_img_selecionada = caminho_imagem;
                if(img_selecionada != null) {
                    img_selecionada.removeClass("selecionada");
                }
                img_selecionada = $("#"+id_img).addClass("selecionada");
            }

            function encaminharImagem(nome_botao) {
                // Ignora o "bt_"
                numero = nome_botao.substring(3);
                if(label_img_selecionada != "Nenhuma") {
                    document.getElementById("lb_img_" + numero).innerHTML = label_img_selecionada;
                    document.getElementById("dir_img_" + numero).value = label_img_selecionada;
                }
            }

            function atualizarGradeImagens() {
                tag = document.getElementById("pesquisa").value;
                var grade = d3.select("#grade");
                // Limpa a grade
                grade.html("");
                if(tag == "") {
                    todas_imagens.forEach(function(imagem, ind) {
                        grade.append("img")
                            .attr("src", imagem["arq"])
                            .attr("id", "img_"+ind)
                            .attr("name", imagem["arq"])
                            .on("click", function() {
                                marcarImagemSelecionada("img_"+ind, imagem["arq"]);
                            });
                    });
                }
                // Tag diferente de ""
                else {
                    var ind = 0;
                    todas_imagens.forEach(function(imagem) {
                        if(imagem["tag"] == tag) {
                            grade.append("img")
                                .attr("src", imagem["arq"])
                                .attr("id", "img_"+ind)
                                .attr("name", imagem["arq"])
                                .on("click", function() {
                                    marcarImagemSelecionada("img_"+ind, imagem["arq"]);
                                });
                            ind++;
                        }
                    });
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
                        echo "<input class='margem_esq' type='text' name='tag_img_".$i."' placeholder='Tag'>";
                        echo "<br>";
                    }
                echo "</div>";
                echo "<br>";
                echo "<input type='text' id='pesquisa' placeholder='Digite a tag...'></input>";
                echo "<input type='button' onclick='atualizarGradeImagens();' value='Pesquisar'></input>";
                echo "<br><br>";
                echo "<div class='scroll' id='grade'>";
                    foreach($todas_imagens as $imagem) {
                        echo "<script>todas_imagens.push({arq:'".$imagem->getArquivo()."', tag:'".$imagem->getTag()."'});</script>";
                    }
                    echo "<script>atualizarGradeImagens();</script>";
                echo "</div>";
            ?>
            <br>
            <input type="submit" value="Guardar imagens">
        </form>
    </body>
</html>
