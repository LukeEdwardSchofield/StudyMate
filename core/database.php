<?php  

/*
If a class has a namespace, 
every object that are instantiated inside that class 
assumes the namespace of that class
*/
namespace Core;

//just use the PDO to not include the namespace
use PDO;
class Database
{
    public $connection;

    public function __construct($config, $username = "root", $password = ""){

        $dsn = "mysql: " . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, 
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query($query, $params = []){

        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}