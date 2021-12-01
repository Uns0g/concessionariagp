<?php

class classeMarca{
    // Atributos
    private $idMarca;
    private $nome;

    // Getters e Setters
    function getIdMarca(){
        return $this -> idMarca;
    }

    function getNome(){
        return $this -> nome;
    }

    function setIdMarca($idMarca){
        $this -> idMarca= $idMarca;
    }

    function setNome($nome){
        $this -> nome = $nome;
    }

    // Métodos CRUD
    function inserirMarca(){
        include('../conexao.php'); 

        $comando = "SELECT inserirMarca(?) AS IdGerado;";
        $resposta = $PDO -> prepare($comando); 
        $resposta -> bindValue(1, $this -> nome);
        $resposta -> execute();

        foreach($resposta as $registro){
            $this -> idMarca = $registro["IdGerado"];
        }
    }

    function consultarMarca(){
        include('../conexao.php'); 

        $comando = "SELECT * FROM Marca WHERE IDMARCA=?;";
        $resposta = $PDO -> prepare($comando); 
        $resposta -> bindValue(1, $this -> idMarca);
        $resposta -> execute();

        foreach($resposta as $registro){
            $this -> nome = $registro["NOME"];
        }
    }

    function alterarMarca(){
        include('../conexao.php'); 

        $comando = "CALL alterarMarca(?, ?);";
        $resposta = $PDO -> prepare($comando); 
        $resposta -> bindValue(1, $this -> idMarca);
        $resposta -> bindValue(2, $this -> nome);
        $resposta -> execute();
    }

    function excluirMarca(){
        include('../conexao.php'); 
        
        $comando = "SELECT excluirMarca(?) AS ExclusaoRealizada;";
        $resposta = $PDO -> prepare($comando);
        $resposta -> bindValue(1, $this -> idMarca);
        $resposta -> execute();

        foreach($resposta as $registro){
            $exclusaoRealizada = $registro["ExclusaoRealizada"];
        }
        return $exclusaoRealizada;
    }
}