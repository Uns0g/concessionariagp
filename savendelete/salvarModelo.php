<?php
    $idModelo = $_GET["inputId"];
    $nome = $_GET["inputName"];
    $idMarca = $_GET["selectMarca"];

    include("../classes/classeModelo.php");
    $modelo = new classeModelo(); 
    $modelo -> setIdModelo($idModelo);
    $modelo -> setNome($nome);
    $modelo -> setIdMarca($idMarca);

    $nome = strtoupper($nome);
    if($modelo -> getIdModelo() == 0){
        $modelo -> inserirModelo();
        echo "<script>alert('Modelo $nome cadastrado');</script>";
        echo "<script>window.location.assign('../tables/tabelaModelo.php');</script>"; // redireciona o usuário
    }
    else{
        $modelo -> alterarModelo();
        echo "<script>alert('Modelo $nome alterado');</script>";
        echo "<script>window.location.assign('../tables/tabelaModelo.php');</script>";
    }