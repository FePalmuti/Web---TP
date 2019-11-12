<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="../../Controllers/Participante/Cadastrar.php" method="post">
            DADOS DEMOGRAFICOS<br>
            e-mail: <input type="text" name="email"><br>
            Telefone: <input type="text" name="telefone"><br>
            Idade: <input type="text" name="idade"><br>
            Sexo: <select name="sexo">
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
            </select><br>
            CEP: <input type="text" name="cep"><br>
            Etnia: <select name="etnia">
                <option value="branco">Branco</option>
                <option value="pardo">Pardo</option>
                <option value="negro">Negro</option>
                <option value="amarelo">Amarelo</option>
                <option value="indigena">Indigena</option>
            </select><br>
            <input type="submit" value="Ok">
        </form>
    </body>
</html>
