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
    protected $Vedrutweets;
    public function __construct($id, $userName, $email, $password, $description, $createDate){
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->description = $description;
        $this->createDate = $createDate;
        $this->usersFollowed = [];
        $this->usersFollowers = [];
        $this->Vedrutweets = [];
    }

    public function __get($atributo){
        return $this->$atributo;
    }


}
?>