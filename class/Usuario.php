<?php

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($value){
        $this->idusuario = $value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDeslogin($value){
        $this->deslogin = $value;
    }

    public function getDessenha(){
        return $this->dessenha;
    }

    public function setDessenha($value){
        $this->dessenha = $value;
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }

    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if(count($results) > 0) {

            $this->setData($results[0]);
        }
    }

    public function loadByLogin($login){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN", array(
            ":LOGIN"=>$login
        ));
        
        if(count($results) > 0) {

            $this->setData($results[0]);
        }
    }


    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");                
    }

    public static function search($login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ":SEARCH"=>"%".$login."%"
        ));
    }

    public function login($login,$senha){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA",array(
            ":LOGIN"=>$login,
            ":SENHA"=>$senha
        ));

        if(count($results) > 0) {

            $this->setData($results[0]);
            
        }else{

            throw new Exception("Login e/ou senha inválidos", 1);
            
        }

    }

    public function setData($data){

        // RECEBE UM ARRAY COM DADOS DO USUÁRIO

        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));

    }

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("EXEC sp_usuarios_insert @pdeslogin = :LOGIN, @pdessenha = :PASSWORD", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha()
             
        ));

        // VERIFICA SE HOUVE RETORNO E RETORNA UM ARRAY COM USUÁRIO INSERIDO.    
        if(count($results) > 0) {
            $this->setData($results[0]);            
        }
    }

    public function update($login,$password){

        $this->setDeslogin($login);
        $this->setDessenha($password);

        $sql = new Sql();
        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD where idusuario = :ID", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha(),
            ':ID'=>$this->getIdusuario()
        ));
    }

    public function delete(){

        $sql = new Sql();
        $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
            ':ID'=>$this->getIdusuario()
        ));

        $this->setIdusuario(0);
        $this->setDeslogin("");
        $this->setDessenha("");
        $this->setDtcadastro(new DateTime());


    }


    public function __construct($login = "",$senha = ""){ 

        $this->setDeslogin($login);
        $this->setDessenha($senha);

    }
    
    public function __toString(){

        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y")
        ));
    }

}


?>