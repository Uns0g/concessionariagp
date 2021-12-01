<?php
    $idMarca = $_GET["inputId"];
    $nome = $_GET["inputName"];

    include("../classes/classeMarca.php");
    $marca = new classeMarca();
    $marca -> setIdMarca($idMarca);
    $marca -> setNome($nome);

    $nome = strtoupper($nome);
    if($marca -> getIdMarca() == 0){
        $marca -> inserirMarca();  
        echo "<script>alert('Marca $nome cadastrada');</script>";
        echo "<script>window.location.assign('../tables/tabelaMarca.php');</script>"; // redireciona o usuário
    }
    else{
        $marca -> alterarMarca();
        echo "<script>alert('Marca $nome alterado');</script>";
        echo "<script>window.location.assign('../tables/tabelaMarca.php');</script>";
    }