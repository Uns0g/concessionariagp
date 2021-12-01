<?php
    $idCor = $_GET["idCor"];
    include('../classes/classeCor.php');
    $cor = new classeCor();
    $cor -> setIdCor($idCor);
    $resultado = $cor -> excluirCor();
    if($resultado == 0){
        echo "<script>alert('Cor excluída.');</script>";
        echo "<script>window.location.assign('../tables/tabelaCor.php');</script>";
    }
    else{
        echo "<script>alert('Não é possível excluir a cor, pois há $resultado carros com essa cor.');</script>";
        echo "<script>window.location.assign('../tables/tabelaCor.php');</script>";
    }