<?php

class Web{
    protected $users;
    protected $vedrutweets;
    public function __construct(){
        $this->users = [];
        $this->Vedrutweets = [];
    }

    #Patron singleton
    /*
     private static $instance;

    private function __construct() {
        // Constructor privado para evitar la creación de instancias fuera de la clase.
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Métodos y propiedades de la clase aquí. 

    $singletonInstance1 = SingletonClass::getInstance();
    $singletonInstance2 = SingletonClass::getInstance();

    var_dump($singletonInstance1 === $singletonInstance2); // Devolverá true, ya que ambas variables apuntan a la misma instancia.


    */
}

?>