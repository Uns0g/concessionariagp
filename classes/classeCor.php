<?php

class classeCor{
    // atributos 
    private $idCor;
    private $nome;

    // getters e setters
    function getIdCor(){
        return $this -> idCor;
    }

    function getNome(){
        return $this -> nome;
    }

    function setIdCor($idCor){
        $this -> idCor = $idCor;
    }

    function setNome($nome){
        $this -> nome = $nome;
    }

    // métodos CRUD
    function inserirCor(){
        include('../conexao.php'); 

        $comando = "SELECT inserirCor(?) AS IdGerado;";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> nome);
        $resposta -> execute();

        foreach($resposta as $registro){
            $this -> idCor = $registro["IdGerado"];
        }
    }

    function consultarCor(){
        include('../conexao.php'); 
        
        $comando = "SELECT * FROM carro WHERE IDCOR=?;";
        $resposta = $PDO -> prepare($comando); 
        $resposta -> bindValue(1, $this -> idCor);
        $resposta -> execute();

        foreach($resposta as $registro){
            $this -> nome = $registro["NOME"];
        }
    }

    function alterarCor(){
        include('../conexao.php'); 

        $comando = "CALL alterarCor(?, ?);";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> idCor);
        $resposta -> bindValue(2, $this -> nome);
        $resposta -> execute();
    }

    function excluirCor(){
        include('../conexao.php'); 

        $comando = "SELECT excluirCor(?) AS ExclusaoRealizada;";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> idCor);
        $resposta -> execute();

        foreach($resposta as $registro){
            $exclusaoRealizada = $registro["ExclusaoRealizada"];
        }
        return $exclusaoRealizada;
    }
}