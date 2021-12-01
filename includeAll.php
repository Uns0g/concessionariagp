<?php
include('conexao.php');
include("classes/classeCarro.php");
include("classes/classeCor.php");
include("classes/classeMarca.php");
include("classes/classeModelo.php");

$carro = new classeCarro();
$carro->setIdCarro(0);
$carro->setPlaca("");
$carro->setAno("");
$carro->setIdCor(0);
$carro->setIdModelo(0);
if ($carro->getIdCarro() != 0) {
    $carro->consultarCarro();
}

// Cor          
$cor = new classeCor();
$cor->setIdCor(0);
$cor->setNome("");
if ($cor->getIdCor() != 0) {
    $cor->consultarCor();
}

// Marca
$marca = new classeMarca();
$marca->setIdMarca(0);
$marca->setNome("");
if ($marca->getIdMarca() != 0) {
    $marca->consultarMarca();
}

// Modelo
$modelo = new classeModelo();
$modelo->setIdModelo(0);
$modelo->setNome("");
$modelo->setIdMarca(0);
if ($modelo->getIdModelo() != 0) {
    $modelo->consultarModelo();
}