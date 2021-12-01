<?php

class classeModelo{
    // atributos
    private $idModelo;
    private $nome;
    private $idMarca;

    // Getters e Setters
    function getIdModelo(){
        return $this -> idModelo;
    }

    function setIdModelo($idModelo){
        $this -> idModelo = $idModelo;
    }

    function getNome(){
        return $this -> nome;
    }

    function setNome($nome){
        $this -> nome = $nome;
    }

    function getIdMarca(){
        return $this -> idMarca;
    }

    function setIdMarca($idMarca){
        $this -> idMarca = $idMarca;
    }

    // Métodos CRUD
    function inserirModelo(){
        include('../conexao.php');

        $comando = "SELECT inserirModelo(?, ?) AS IdGerado;";
        $resposta = $PDO -> prepare($comando); 
        $resposta -> bindValue(1, $this -> nome);
        $resposta -> bindValue(2, $this -> idMarca);
        $resposta -> execute();

        foreach($resposta as $registro){
            $this -> idModelo = $registro["IDMODELO"];
        }
    }

    function consultarModelo(){
        include('../conexao.php');

        $comando = "SELECT * FROM modelo WHERE IDMODELO=?;";
        $resposta = $PDO -> prepare($comando); 
        $resposta -> bindValue(1, $this -> nome);
        $resposta -> execute();

        foreach($resposta as $registro){
            $this -> idModelo = $registro["IDMODELO"];
            $this -> nome = $registro["NOME"];
            $this -> idMarca = $registro["IDMARCA"];
        }
    }

    function alterarModelo(){
        include('../conexao.php');

        $comando = "CALL alterarModelo(?, ?, ?);";
        $resposta = $PDO -> prepare($comando); 
        $resposta -> bindValue(1, $this -> idModelo);
        $resposta -> bindValue(2, $this -> nome);
        $resposta -> bindValue(3, $this -> idMarca);
        $resposta -> execute();
    }

    function excluirModelo(){
        include('../conexao.php'); 
        
        $comando = "SELECT excluirModelo(?) AS ExclusaoRealizada;";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> idModelo);
        $resposta -> execute();

        foreach($resposta as $registro){
            $exclusaoRealizada = $registro["ExclusaoRealizada"];
        }
        return $exclusaoRealizada;
    }
}