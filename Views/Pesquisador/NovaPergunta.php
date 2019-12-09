<!--
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script type="text/javascript">
            function verificarTipo() {
                if(document.getElementById("tipo").value == "continua") {
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[0].disabled = false;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[1].disabled = true;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[2].disabled = true;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[3].disabled = true;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[4].disabled = true;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[5].disabled = true;
                    //
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[0].selected = true;
                }
                else {
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[0].disabled = true;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[1].disabled = false;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[2].disabled = false;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[3].disabled = false;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[4].disabled = false;
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[5].disabled = false;
                    //
                    document.getElementById("qnt_imagens").getElementsByTagName("option")[1].selected = true;
                }
            }
        </script>
    </head>
    <body>
        <form action="../../Controllers/Pesquisador/GuardarPerguntaSessao.php", method="post">
            <input type="text" placeholder="Instrucoes..." name="instrucoes">
            <br>
            <input type="text" placeholder="Descricao..." name="descricao">
            <br>
            <select name="tipo" id="tipo" onchange="verificarTipo()">
                <option value="continua">Continuo</option>
                <option value="discreta">Discreto</option>
            </select>
            <br>
            <select name="qnt_imagens" id="qnt_imagens">
                <option value="3">3</option>
                <option disabled value="5">5</option>
                <option disabled value="6">6</option>
                <option disabled value="7">7</option>
                <option disabled value="8">8</option>
                <option disabled value="9">9</option>
            </select>
            <br>
            <input type="submit" value="Guardar item">
        </form>
        <form action="../../Controllers/Pesquisador/FinalizarTeste.php">
            <input type="submit" value="Finalizar teste">
        </form>
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
    <script type="text/javascript">
    function verificarTipo() {
        if(document.getElementById("tipo").value == "continua") {
            document.getElementById("qnt_imagens").getElementsByTagName("option")[0].disabled = false;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[1].disabled = true;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[2].disabled = true;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[3].disabled = true;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[4].disabled = true;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[5].disabled = true;
            //
            document.getElementById("qnt_imagens").getElementsByTagName("option")[0].selected = true;
        }
        else {
            document.getElementById("qnt_imagens").getElementsByTagName("option")[0].disabled = true;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[1].disabled = false;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[2].disabled = false;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[3].disabled = false;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[4].disabled = false;
            document.getElementById("qnt_imagens").getElementsByTagName("option")[5].disabled = false;
            //
            document.getElementById("qnt_imagens").getElementsByTagName("option")[1].selected = true;
        }
    }
    </script>
</head>

<body>
    <form action="../../Controllers/Pesquisador/GuardarPerguntaSessao.php" , method="post">
        <div class="section-cadastro">
            <div class="container-cadastro">
                <div class="row wrap-border">
                    <div class="col-4 col-sm-6">
                        <div class = "margin-topfonte">
                            <h1> Pergunta </h1>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control" name="instrucoes" placeholder="Titulo">
                            </div>
                        </div>
                        <div class="row margin-top">
                            <div class="col-12">
                                <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                            </div>
                        </div>
                        <div class="row margin-top">
                            <div class="col-12">
                                <select name="tipo" id="tipo" onchange="verificarTipo()">
                                    <option value="continua">Continuo</option>
                                    <option value="discreta">Discreto</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="row margin-top">
                                <div class="col-12">
                                    <select name="qnt_imagens" id="qnt_imagens">
                                        <option value="3">3</option>
                                        <option disabled value="5">5</option>
                                        <option disabled value="6">6</option>
                                        <option disabled value="7">7</option>
                                        <option disabled value="8">8</option>
                                        <option disabled value="9">9</option>
                                    </select>
                                    <br>
                                </div>
                            </div>
                            <div class="row margin-top">
                                <div class="col-12">
                                    <input type="submit" value="Guardar item">
                                </div>
                            </div>
                            </form>
                            <div class="row margin-top">
                                <div class="col-12">
                                    <form action="../../Controllers/Pesquisador/FinalizarTeste.php">
                                    <div class = "area-button">
                                        <input type="submit" class="btn btn-success" value="Finalizar teste">
    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
