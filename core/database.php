<?php  

class Database{

    public $connection;

    public function __construct($config, $user = "root", $password = ""){

        $dsn = "mysql:" . http_build_query($config, "", ';');

       $this->connection = new PDO($dsn, $user, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
       ]);
    }

    public function query($query, $params = []){
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}