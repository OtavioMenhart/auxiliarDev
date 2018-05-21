<?php
class LoginPrestadores extends Crud {
    protected $tablePrestadores = "Tab_LoginPrestadores";
    private $ID_PRESTADOR;
    private $LOGIN;
    private $SENHA;
    
    function getID_PRESTADOR() {
        return $this->ID_PRESTADOR;
    }

    function getLOGIN() {
        return $this->LOGIN;
    }

    function getSENHA() {
        return $this->SENHA;
    }

        
    function setID_PRESTADOR($ID_PRESTADOR) {
        $this->ID_PRESTADOR = $ID_PRESTADOR;
    }
    
    function setLOGIN($LOGIN) {
        $this->LOGIN = $LOGIN;
    }

    function setSENHA($SENHA) {
        $this->SENHA = $SENHA;
    }
    
    //put your code here
    public function insert() {
        
    }

    public function update() {
        
    }
    
    public function verificaLogin() {
        $sql = "SELECT * FROM $this->tablePrestadores WHERE LOGIN = :LOGIN AND SENHA = :SENHA";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':LOGIN', $this->LOGIN, PDO::PARAM_STR);
        $stmt->bindParam(':SENHA', $this->SENHA, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            if (!isset($_SESSION)) @session_start();
            $_SESSION['LOGIN'] = $this->LOGIN;
            return true;
        }else{
            return false;
        }
    }
    
    public function pegarID() {
        $sql = "SELECT ID_PRESTADOR as idPrestador FROM $this->tablePrestadores WHERE LOGIN = :LOGIN";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":LOGIN",$this->LOGIN, PDO::PARAM_STR);
        $stmt->execute();
        $idPrestador = $stmt->fetch(PDO::FETCH_OBJ);
        return $idPrestador;
    }
}
