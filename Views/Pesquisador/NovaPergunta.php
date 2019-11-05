<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script type="text/javascript">
            function verificarTipo() {
                if(document.getElementById("tipo").value == "continuo") {
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
                <option value="discreto">Discreto</option>
                <option value="continuo">Continuo</option>
            </select>
            <br>
            <select name="qnt_imagens" id="qnt_imagens">
                <option disabled value="3">3</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            <br>
            <input type="submit" value="Guardar item">
        </form>
        <form action="../../Controllers/Pesquisador/FinalizarTeste.php">
            <input type="submit" value="Finalizar teste">
        </form>
    </body>
</html>
