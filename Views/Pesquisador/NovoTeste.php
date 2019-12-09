<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="../../Controllers/Pesquisador/GuardarTesteSessao.php", method="post">
            <input type="text" placeholder="Titulo..." name="nome">
            <br>
            <input type="text" placeholder="Descricao..." name="descricao">
            <br>
            <input type="submit" value="Cadastrar itens">
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
</head>

<body>
    <form action="../../Controllers/Pesquisador/GuardarTesteSessao.php" , method="post">
        <div class="section-cadastro">
            <div class="container-cadastro">
                <div class="row wrap-border">
                    <div class="col-4 col-sm-6">
                        <div>
                            <h1> Cadastrar novo teste</h1>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control" name="nome" placeholder="Titulo">
                            </div>
                        </div>
                        <div class="row margin-top">
                            <div class="col-12">
                                <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                            </div>
                        </div>
                        <div class="row margin-top">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Cadastrar Itens</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>