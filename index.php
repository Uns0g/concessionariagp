<?php
include('includeAll.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Cadastro - Concessionária GP</title>
</head>

<body>
    <header>
        <div id="header__logo-container">
            <img src="./img/logo.png" alt="Logo Da Página">
        </div>
        <div id="header__buttons-container">
            <a href="#">HOME</a>
            <div class="dropdown-menu">
                <span class="dropdown-menu__button">NOVO</span>
                <ul>
                    <li>Carro</li>
                    <li>Cor</li>
                    <li>Marca</li>
                    <li>Modelo</li>
                </ul>
            </div>
            <div class="dropdown-menu">
                <span class="dropdown-menu__button">ALTERAR</span>
                <ul>
                    <li><a href="tables/tabelaCor.php">Cor</a></li>
                    <li><a href="tables/tabelaMarca.php">Marca</a></li>
                    <li><a href="tables/tabelaModelo.php">Modelo</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <h1 id="main-title">Carros Cadastrados</h1>
        <div id="add-button-container">
            <button>Novo Carro <i class="ri-add-circle-line"></i></button>
        </div>
        <section id="cars-container">
            <?php
            $select = "SELECT * FROM consultarVeiculo;";
            $retornoDaConsulta = $PDO->prepare($select);
            $retornoDaConsulta->execute();
            foreach ($retornoDaConsulta as $registro) {
                $idCarro = $registro["IDVEICULO"];
                $placa = $registro["PLACA"];
                $ano = $registro["ANO"];
                $imagem = $registro["IMAGEM"];
                $carroCor = $registro["COR"];
                $carroModelo = $registro["MODELO"];
            ?>
                <div class="car-viewer">
                    <div class="car-viewer__header">
                        <u><b>Placa:</b> <span><?php echo $placa; ?></span></u>
                        <u><b>Ano:</b> <span><?php echo $ano; ?></span></u>
                        <u><b>Cor:</b> <span><?php echo strtolower($carroCor); ?></span></u>
                        <u><b>Modelo:</b> <span><?php echo $carroModelo; ?></span></u>
                    </div>
                    <div class="car-viewer__image-container">
                        <img src="img/<?php echo $imagem; ?>" alt="">
                    </div>
                    <div class="car-viewer__buttons-container">
                        <button class="car-viewer__button alterarBtn" data-car-index="<?php echo $idCarro ?>"><i class="ri-pencil-fill"></i></button>
                        <a class="car-viewer__button excluirBtn" href="savendelete/excluirCarro.php?idCarro=<?php echo $idCarro; ?>"><i class="ri-delete-bin-5-fill"></i></a>
                    </div>
                </div>
                </div>
            <?php
            }
            ?>
        </section>
    </main>
    <footer>
        <h3><a href="">Desenvolvido Por Gabriel Ledolini Morais E Pedro Rossi</a></h3>
    </footer>
    <section class="forms-container">
        <form class="form" method="POST" action="savendelete/salvarCarro.php" enctype="multipart/form-data">
            <div class="form__close"><i class="ri-close-line"></i></div>
            <h1>Cadastrar Carro</h1>
            <div class="form__input-container">
                <label for="inputIdCarro">Código Do Carro: </label>
                <input type="text" id="inputIdCarro" name="inputId" class="inputHidden" value="<?php echo $carro->getIdCarro(); ?>" readonly>
            </div>
            <div class="form__input-container">
                <div class="form__input-container--inside">
                    <label for="inputPlaca">Placa: </label>
                    <input type="text" id="inputPlaca" name="inputPlaca" value="<?php echo $carro->getPlaca(); ?>" pattern="[A-Z ]{3}+[A-Z0-9]{4}" placeholder="AAA 0A00" required>
                </div>
                <div class="form__input-container--inside">
                    <label for="inputAno">Ano: </label>
                    <select type="text" id="selectAno" name="selectAno" required>
                        <?php
                        for ($i = 2012; $i <= 2023; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form__input-container">
                <label for="inputImagem">Insira Uma Imagem: </label>
                <input type="file" id="inputImagem" name="imageFile" accept="image/png, image/jpg, image/jpeg" required>
            </div>
            <div class="form__input-container">
                <div class="form__input-container--inside">
                    <label for="selectCor">Selecionar Cor: </label>
                    <select id="selectCor" name="selectCor" required>
                        <?php
                        $select = "SELECT * FROM cor;";
                        $retornoDaConsulta = $PDO->prepare($select);
                        $retornoDaConsulta->execute();
                        foreach ($retornoDaConsulta as $registro) {
                            $codigo = $registro["IDCOR"];
                            $nome = $registro["NOME"];
                            if ($carro->getIdCor() != $codigo) {
                                echo "<option value='$codigo'>$nome</option>";
                            } else {
                                echo "<option value='$codigo' selected>$nome</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form__input-container--inside">
                    <label for="selectModelo">Selecionar Modelo: </label>
                    <select id="selectModelo" name="selectModelo" required>
                        <?php
                        $select = "SELECT * FROM modelo;";
                        $retornoDaConsulta = $PDO->prepare($select);
                        $retornoDaConsulta->execute();
                        foreach ($retornoDaConsulta as $registro) {
                            $codigo = $registro["IDMODELO"];
                            $nome = $registro["NOME"];
                            if ($carro->getIdModelo() != $codigo) {
                                echo "<option value='$codigo'>$nome</option>";
                            } else {
                                echo "<option value='$codigo' selected>$nome</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form__input-container">
                <input type="reset" class="form__button form__reset" value="Apagar">
                <input type="submit" class="form__button form__submit" value="Salvar">
            </div>
        </form>
        <form class="form" method="GET" action="savendelete/salvarCor.php">
            <div class="form__close"><i class="ri-close-line"></i></div>
            <h1>Cadastrar Cor</h1>
            <div class="form__input-container">
                <label for="inputIdCor">Código Da Cor: </label>
                <input type="text" id="inputIdCor" name="inputId" class="inputHidden" value="<?php echo $cor->getIdCor(); ?>" placeholder="Gerado automaticamente..." readonly>
            </div>
            <div class="form__input-container">
                <label for="inputCor">Cor: </label>
                <input type="text" id="inputCor" name="inputName" value="<?php echo $cor->getNome(); ?>" required>
            </div>
            <div class="form__input-container">
                <input type="reset" class="form__button form__reset" value="Apagar">
                <input type="submit" class="form__button form__submit" value="Salvar">
            </div>
        </form>
        <form class="form" method="GET" action="savendelete/salvarMarca.php">
            <div class="form__close"><i class="ri-close-line"></i></div>
            <h1>Cadastrar Marca</h1>
            <div class="form__input-container">
                <label for="inputIdMarca">Código Da Marca: </label>
                <input type="text" id="inputIdMarca" name="inputId" class="inputHidden" value="<?php echo $marca->getIdMarca(); ?>" placeholder="Gerado automaticamente..." readonly>
            </div>
            <div class="form__input-container">
                <label for="inputMarca">Marca: </label>
                <input type="text" id="inputMarca" name="inputName" value="<?php echo $marca->getNome(); ?>" required>
            </div>
            <div class="form__input-container">
                <input type="reset" class="form__button form__reset" value="Apagar">
                <input type="submit" class="form__button form__submit" value="Salvar">
            </div>
        </form>
        <form class="form" method="GET" action="savendelete/salvarModelo.php">
            <div class="form__close"><i class="ri-close-line"></i></div>
            <h1>Cadastrar Modelo</h1>
            <div class="form__input-container">
                <label for="inputIdModelo">Código Do Modelo: </label>
                <input type="text" id="inputIdModelo" name="inputId" class="inputHidden" value="<?php echo $modelo->getIdModelo(); ?>" placeholder="Gerado automaticamente..." readonly>
            </div>
            <div class="form__input-container">
                <label for="inputModelo">Modelo: </label>
                <input type="text" id="inputModelo" name="inputName" value="<?php echo $modelo->getNome(); ?>" required>
            </div>
            <div class="form__input-container">
                <label for="selectMarca">Marca: </label>
                <select id="selectMarca" name="selectMarca" required>
                    <?php
                    $select = "SELECT * FROM marca;";
                    $retornoDaConsulta = $PDO->prepare($select);
                    $retornoDaConsulta->execute();
                    foreach ($retornoDaConsulta as $registro) {
                        $codigo = $registro["IDMARCA"];
                        $nome = $registro["NOME"];
                        if ($modelo->getIdMarca() != $codigo) {
                            echo "<option value='$codigo'>$nome</option>";
                        } else {
                            echo "<option value='$codigo' selected>$nome</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form__input-container">
                <input type="reset" class="form__button form__reset" value="Apagar">
                <input type="submit" class="form__button form__submit" value="Salvar">
            </div>
        </form>
        <form class="form" method="POST" action="savendelete/salvarCarro.php" enctype="multipart/form-data">
            <div class="form__close"><i class="ri-close-line"></i></div>
            <h1>Alterar Carro</h1>
            <div class="form__input-container">
                <label for="inputId">Código Do Carro: </label>
                <input type="text" id="inputId" name="inputId" class="inputHidden" value="<?php echo $carro->getIdCarro(); ?>" readonly>
            </div>
            <div class="form__input-container">
                <div class="form__input-container--inside">
                    <label for="alterarPlaca">Placa: </label>
                    <input type="text" id="alterarPlaca" name="inputPlaca" value="<?php echo $carro->getPlaca(); ?>" pattern="[A-Z ]{3}+[A-Z0-9]{4}" placeholder="AAA 0A00" required>
                </div>
                <div class="form__input-container--inside">
                    <label for="alterarAno">Ano: </label>
                    <select type="text" id="alterarAno" name="selectAno" required>
                        <?php
                        for ($i = 2012; $i <= 2023; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form__input-container">
                <label for="alterarImagem">Insira Uma Imagem: </label>
                <input type="file" id="alterarImagem" name="imageFile" accept="image/png, image/jpg, image/jpeg" required>
            </div>
            <div class="form__input-container">
                <label for="alterarCor">Selecionar Cor: </label>
                <select id="alterarCor" name="selectCor" required>
                    <?php
                    $select = "SELECT * FROM cor;";
                    $retornoDaConsulta = $PDO->prepare($select);
                    $retornoDaConsulta->execute();
                    foreach ($retornoDaConsulta as $registro) {
                        $codigo = $registro["IDCOR"];
                        $nome = $registro["NOME"];
                        if ($carro->getIdCor() != $codigo) {
                            echo "<option value='$codigo'>$nome</option>";
                        } else {
                            echo "<option value='$codigo' selected>$nome</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form__input-container">
                <label for="alterarModelo">Selecionar Modelo: </label>
                <select id="alterarModelo" name="selectModelo" required>
                    <?php
                    $select = "SELECT * FROM modelo;";
                    $retornoDaConsulta = $PDO->prepare($select);
                    $retornoDaConsulta->execute();
                    foreach ($retornoDaConsulta as $registro) {
                        $codigo = $registro["IDMODELO"];
                        $nome = $registro["NOME"];
                        if ($carro->getIdModelo() != $codigo) {
                            echo "<option value='$codigo'>$nome</option>";
                        } else {
                            echo "<option value='$codigo' selected>$nome</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form__input-container">
                <input type="reset" class="form__button form__reset" value="Apagar">
                <input type="submit" class="form__button form__submit" value="Salvar">
            </div>
        </form>
    </section>
</body>
<script src="js/script.js"></script>
<script src="js/alterarCarro.js"></script>

</html>