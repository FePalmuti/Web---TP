<!--
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
    <div class="section-cadastro">
        <div class="container-cadastro">
            <div class="row wrap-border">
                <div class="col-8 col-sm-6 login100-pic js-tilt" data-tilt>
                    <img src="../Styles/img-01.png" alt="IMG">
                </div>
                <div class="col-4 col-sm-6">
                <div class="login100-form-title">
						<h1> Cadastro</h1>
                </div>
                    
				<form action="../../Controllers/Pesquisador/Cadastrar.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control" name="nome" placeholder="Nome">
                            </div>

                        </div>
                        <div class="row margin-top">
                            <div class="col-12">
                                <input type="password" class="form-control" name="senha" placeholder="Senha">
                            </div>
                        </div>

                        <h1> Administrador ? </h1>
                        <br>
                
                        <input type="radio" name="adm" value="sim">Sim
                        <input type="radio" name="adm" value="nao">Não
                        <br>
                        <br>
                        <br>
                        <div class="row margin-top">
                            <div class="col-12">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
