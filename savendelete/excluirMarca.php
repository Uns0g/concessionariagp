<?php 
    $idMarca = $_GET["idMarca"];
    include('../classes/classeMarca.php');
    $marca = new classeMarca();
    $marca -> setIdMarca($idMarca);
    $resultado = $marca -> excluirMarca();
    if($resultado == 0){
        echo "<script>alert('A marca foi excluída');</script>";
        echo "<script>window.location.assign('../tables/tabelaMarca.php');</script>";
    }
    else{
        echo "<script>alert('Não é possível excluir a marca, pois há $resultado modelos com essa marca.');</script>";
        echo "<script>window.location.assign('../tables/tabelaMarca.php');</script>";
    }