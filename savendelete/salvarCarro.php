<?php
    $idCarro = $_POST["inputId"];
    $placa = $_POST["inputPlaca"];
    $ano = $_POST["selectAno"];
    $imagem = $_FILES['imageFile']['name'];
    $idCor = $_POST["selectCor"];
    $idModelo = $_POST["selectModelo"];

    # ---- getando a imagem ----
    $imagemDir = "../img/" . $imagem;

    if (move_uploaded_file($_FILES['imageFile']['tmp_name'], $imagemDir)) {
        include("../classes/classeCarro.php");
        $carro = new classeCarro();
        $carro->setIdCarro($idCarro);
        $carro->setPlaca(strtoupper($placa));
        $carro->setAno($ano);
        $carro->setIdCor($idCor);
        $carro->setIdModelo($idModelo);
        $carro->setImagem($imagem);

        if ($carro->getIdCarro() == 0) {
            $carro->inserirCarro();
            echo "<script>alert('O carro com placa $placa foi cadastrado');</script>";
            echo "<script>window.location.assign('../index.php');</script>"; // redireciona o usuário
        } else {
            $carro->alterarCarro();
            echo "<script>alert('O carro com placa $placa foi alterado');</script>";
            echo "<script>window.location.assign('../index.php');</script>";
        }
    } else {
        echo "<script>alert('Ocorreu um erro ao inserir a imagem!');</script>";
    }
