<?php
    $idCarro = $_GET["idCarro"];
    include('../classes/classeCarro.php');
    $carro = new classeCarro();
    $carro->setIdCarro($idCarro);
    $resultado = $carro->excluirCarro();
    if ($resultado == 0) {
        echo "<script>alert('Carro excluído.');</script>";
        echo "<script>window.location.assign('../index.php');</script>";
    } else {
        echo "<script>alert('Não é possível excluir o carro.');</script>";
        echo "<script>window.location.assign('../index.php');</script>";
    }
