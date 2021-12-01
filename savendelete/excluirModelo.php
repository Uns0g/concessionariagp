<?php
    $idModelo = $_GET["idModelo"];
    include('../classes/classeModelo.php');
    $modelo = new classeModelo();
    $modelo -> setIdModelo($idModelo);
    $resultado = $modelo -> excluirModelo();
    if($resultado == 0){
        echo "<script>alert('Modelo excluído.');</script>";
        echo "<script>window.location.assign('../tables/tabelaModelo.php');</script>";
    }
    else{
        echo "<script>alert('Não é possível excluir o modelo, pois há $resultado carros com esse modelo.');</script>";
        echo "<script>window.location.assign('../tables/tabelaModelo.php');</script>";
    }