<!--
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
!-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Styles/home.css">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
    <body>
    <div class="section-login">
        <div class="container-cadastro">
            <div class="row wrap-border">
                <div class="col-8 col-sm-6 login100-pic js-tilt" data-tilt>
                    <img src="../Styles/img-01.png" alt="IMG">
                </div>
                <div class="col-4 col-sm-6">
                <div class="login100-form-title">
						<h1> Dados demograficos </h1>
                </div>
                <form action="../../Controllers/Participante/Cadastrar.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <input  type="email"  class="form-control" name="email" placeholder="Email">
                            </div>

                        </div>
                        <div class="row margin-top">
                            <div class="col-12">
                                <input type="text" class="form-control" name="telefone" placeholder="Telefone">
                            </div>
                        </div>

                        <div class="row margin-top">
                            <div class="col-12">
                                <input type="text" class="form-control" name="idade" placeholder="Idade">
                            </div>
                        </div>


                        <div class="row margin-top">
                            Sexo: <select name="sexo">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            </select><br>
                        </div>

                        <div class="row margin-top">
                            <div class="col-12">
                                <input type="text" class="form-control" name="cep" placeholder="CEP">
                            </div>
                        </div>
                        
                        <div class="row margin-top">
                        Etnia: <select name="etnia">
                            <option value="branco">Branco</option>
                            <option value="pardo">Pardo</option>
                            <option value="negro">Negro</option>
                            <option value="amarelo">Amarelo</option>
                            <option value="indigena">Indigena</option>
                        </select><br>
                        </div>


                        <div class="row margin-top">
                            <div class="col-12">
                            <button type="submit" class="button-form-btn">Entrar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
       
    </body>
</html>
