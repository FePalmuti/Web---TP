<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="../../Controllers/Pesquisador/Cadastrar.php" method="post">
            CADASTRO<br>
            Nome: <input type="text" name="nome"><br>
            Senha: <input type="text" name="senha"><br>
            Administrador?<br>
            <input type="radio" name="adm" value="sim">Sim
            <input type="radio" name="adm" value="nao">Não
            <br>
            <input type="submit" value="Ok">
        </form>
    </body>
</html>
