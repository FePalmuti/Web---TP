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
						<h1> Exibicao Teste </h1>
                </div>

             

                <form action="../../Controllers/Participante/Cadastrar.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <h4> Nome:  <?php echo $teste->getNome()  ?>  </h4> 
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4> Descrição: <?php echo $teste->getDescricao() ?> </h4> 
                            </div>

                        </div>                
                    </form>

                    <form action="ExibicaoPergunta.php">
                    <div class="row margin-top">
                            <div class="col-12">                           
                            <button type="submit" class="button-form-btn">Continuar</button>                          
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
       
    </body>
</html>
