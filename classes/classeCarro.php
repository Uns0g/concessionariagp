<?php 

class classeCarro{
    // atributos
    private $idCarro;
    private $placa;
    private $ano;
    private $imagem;
    private $idCor;
    private $idModelo;

    // Getters e Setters
    function getIdCarro(){ return $this -> idCarro;}
    function setIdCarro($idCarro){ $this -> idCarro = $idCarro;}
    function getPlaca(){ return $this -> placa;}
    function setPlaca($placa){ $this -> placa = $placa;}
    function getAno(){ return $this -> ano;}
    function setAno($ano){ $this -> ano = $ano;}
    function getImagem(){ return $this -> imagem;}
    function setImagem($imagem){ $this -> imagem = $imagem;}

    function getIdCor(){ return $this -> idCor;}
    function setIdCor($idCor){ $this -> idCor = $idCor;}
    function getIdModelo(){ return $this -> idModelo;}
    function setIdModelo($idModelo){ $this -> idModelo = $idModelo;}

    // Métodos CRUD
    function inserirCarro(){
        include('../conexao.php');

        $comando = "SELECT inserirVeiculo(?, ?, ?, ?, ?) AS IdGerado;";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> placa);
        $resposta -> bindValue(2, $this -> ano);
        $resposta -> bindValue(3, $this -> idCor);
        $resposta -> bindValue(4, $this -> idModelo);
        $resposta -> bindValue(5, $this -> imagem);
        $resposta -> execute();

        foreach($resposta as $registro){
            $this -> idCarro = $registro["IDVEICULO"];
        }
    }

    # implementar consultar viewCarro() 
    function consultarCarro(){
        include('../conexao.php');

        $comando = "SELECT * FROM veiculo WHERE IDVEICULO=?;";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> idCarro);
        $resposta -> execute();

        foreach($resposta as $registro){
            $this -> idCarro = $registro["IDVEICULO"];
            $this -> placa = $registro["PLACA"];
            $this -> ano = $registro["ANO"];
            $this -> imagem = $registro["IMAGEM"];
            $this -> idCor = $registro["IDCOR"];
            $this -> idModelo = $registro["IDMODELO"];
        }
    }

    function alterarCarro(){
        include('../conexao.php');

        $comando = "CALL alterarVeiculo(?,?,?,?,?,?)";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> idCarro);
        $resposta -> bindValue(2, $this -> placa);
        $resposta -> bindValue(3, $this -> ano);
        $resposta -> bindValue(4, $this -> imagem);
        $resposta -> bindValue(5, $this -> idCor);
        $resposta -> bindValue(6, $this -> idModelo);
        $resposta -> execute();
    }

    function excluirCarro(){
        include('../conexao.php');

        $comando = "SELECT excluirVeiculo(?) AS ExclusaoRealizada;";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> idCarro);
        $resposta -> execute();

        foreach($resposta as $registro){
            $exclusaoRealizada = $registro["ExclusaoRealizada"];
        }
        return $exclusaoRealizada;
    }
}