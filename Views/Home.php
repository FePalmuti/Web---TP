<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="Pesquisador/Cadastro.php">
            <input type="submit" value="Cadastrar">
        </form>
        <form action="Pesquisador/Login.php">
            <input type="submit" value="Login">
        </form>
        <br>
        <form action="../Controllers/Participante/VerificarCodigoAcesso.php" method="post">
            <input type="text" placeholder="Codigo do teste..." name="codigo">
            <input type="submit" value="Procurar">
        </form>
    </body>
</html>
