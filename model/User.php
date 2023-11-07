<?php
class User {
    #atributos de tablas
    protected $id;
    protected $userName;
    protected $email;
    protected $password;
    protected $description;
    protected $createDate;
    #Mapeo de relaciones tabla follows
    protected $usersFollowed;
    protected $usersFollowers;
    #Mapeo relacion con publications
    protected $vedrutweets;
    public function __construct($id, $userName, $email, $password, $description, $createDate){
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->description = $description;
        $this->createDate = $createDate;
        $this->usersFollowed = [];
        $this->usersFollowers = [];
        $this->vedrutweets = [];
    }

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
    public function pushToData($data,$value) {
        $this->{$data}[] = $value;
    }


}
?>