<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="../../Controllers/Pesquisador/GuardarPerguntaSessao.php", method="post">
            <input type="text" placeholder="Instrucoes..." name="instrucoes">
            <br>
            <input type="text" placeholder="Descricao..." name="descricao">
            <br>
            <select name="tipo">
                <option value="discreto">Discreto</option>
                <option value="continuo">Continuo</option>
            </select>
            <br>
            <select name="qnt_imagens">
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="7">7</option>
            </select>
            <br>
            <input type="submit" value="Guardar item">
        </form>
        <form action="../../Controllers/Pesquisador/FinalizarTeste.php">
            <input type="submit" value="Finalizar teste">
        </form>
    </body>
</html>
