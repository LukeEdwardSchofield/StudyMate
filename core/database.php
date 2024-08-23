<?php  
//Connect to the database, and execute a query
class Database 
{
   public $connection; //$pdo
  
   //So that the connection to the database is created only one time when an instance of the database is called
    public function __construct($config, $username = "root", $password = "")
    {
        //builds or parses the associative array database config into a dsn connection
                                                          //Separator
        $dsn = "mysql:" . http_build_query($config, '', ';');


        //PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
            //So that the default fetch mode is an associative array
       $this->connection = new PDO($dsn, $username, $password, [
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
       ]);
    }

    //$params for not inlining a input to the query
    public function query($query, $params = [])
    {
        

        //prepare statement
        $statement = $this->connection->prepare($query);

        //execute statement
        $statement ->execute($params);

        return $statement;
    }
}


