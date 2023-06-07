<?php

    // create a namespace to autoload with composer
    namespace Database\MySQLi;


class Connection{

    // create an unique instance made with singleton //
    
    //create a private variable that contains the instance of the class
    private static $instance;
    private $connection;
    //private static $returnMysqli;
    //create a method where the instance can be accessed
    public static function getInstance(){
        if(!self::$instance instanceof self)
            self::$instance = new self();
        return self::$instance;
    }
    // to avoid create an instance outside this this is needed make a constructor with the property private
    // the function of this constructor is make conection. Call the function make_connection inside the class.
    private function __construct(){
        $this->make_connection();
    }

    public function get_db_connection(){
        return $this->connection;
    }

    //functio setNames 

    //create a method that make a connection this method must be private
    private function make_connection(){
        $server='localhost';
        $database='finanzas_personales';
        $username='ccrs11';
        $password='1234';
        // stablish a connection with programming object oriented manner
        // as namespace ahead the class to mysql the class thinks tat the class  mysqli is in that path or namespace 
        // but this is not true, mysqli function is part of the global namespace for that reason use put \
        // that character indicates to the class that the function is not taked from the class selected by namespace.
        $mysqli = new \mysqli($server,$username,$password,$database);
        //check the connection and find errors
        if($mysqli->connect_errno)
            die("The server connection failed:{$mysqli->connect_error}");
        //To use any character for each SELECT
        $setnames=$mysqli->prepare("SET NAMES 'utf8'");
        $setnames->execute();
        // I create the variable connection becouse i want private make_connection and for that reason I cannot 
        // returns $mysqli that is the variable that contains the connection. The idea is create a new variable named
        // private connection property created to access to $misqli without access directly to make_connection 
        $this->connection = $mysqli; 
    }
}