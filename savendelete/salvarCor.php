<?php
    $idCor = $_GET["inputId"];
    $nome = $_GET["inputName"];

    include("../classes/classeCor.php");
    $cor = new classeCor(); 
    $cor -> setIdCor($idCor);
    $cor -> setNome($nome);

    $nome = strtoupper($nome);
    if($cor -> getIdCor() == 0){
        $cor -> inserirCor();
        echo "<script>alert('Cor $nome cadastrada');</script>";
        echo "<script>window.location.assign('../tables/tabelaCor.php');</script>"; // redireciona o usuário
    }
    else{
        $cor -> alterarCor();
        echo "<script>alert('Cor $nome alterada');</script>";
        echo "<script>window.location.assign('../tables/tabelaCor.php');</script>";
    }