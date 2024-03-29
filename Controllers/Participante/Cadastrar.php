<?php
    require_once "../../Models/Conexao.php";
    require_once "../../Models/Teste.php";
    require_once "../../Models/RespostaTeste.php";
    require_once "../../Models/DadosDemograficos.php";
    require_once "../../Persistence/RespostaTesteDAO.php";

    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $cep = $_POST["cep"];
    $etnia = $_POST["etnia"];

    // Estabelece conexao com o BD
    $conexao = new Conexao();
    if(! $conexao->conectar()) {
        header("Location:../../Views/Erros/ErroConexao.php");
        die();
    }

    // Verifica quantidade de respostas de testes
    $respostaTesteDAO = new RespostaTesteDAO();
    $retornos = $respostaTesteDAO->quantidadeRespostasTestes($conexao->getLink());
    if($retornos[0] == null) {
        $qnt = 0;
    }
    else {
        $qnt = $retornos[0];
    }
    $id_resposta_teste = $qnt + 1;

    // Cria dados demograficos
    $dadosDemograficos = new DadosDemograficos($email, $telefone, $idade, $sexo, $cep, $etnia, $id_resposta_teste);

    // Cria a resposta teste
    session_start();
    $id_teste = $_SESSION["teste"]->getId();
    $respostaTeste = new RespostaTeste($id_resposta_teste, $dadosDemograficos, array(), $id_teste);

    $_SESSION["resposta_teste"] = $respostaTeste;
    header("Location:../../Views/Participante/ExibicaoTeste.php");
?>
