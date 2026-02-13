<?php
//Connect to our MySQL database 
//Initalize PDO PHP DATA OBJECTS

namespace Core;

use PDO; // Tells PHP: "PDO means the BUILT-IN \PDO class, not Core\PDO"
//Warning: require(C:\Users\aj_am\OneDrive\Documents\GitHub\inventory-tutorial\public/../Core\PDO.php): Failed to open stream: No such file or directory in C:\Users\aj_am\OneDrive\Documents\GitHub\inventory-tutorial\public\index.php on line 39


//Connect to db, and execute query
class Database{

    public $connection;
    public $stmt; //real life would be protected 

    /**
     * __construct
     *
     * Build out data source name and establish connection when we instansiate 
     * @param  mixed $config - we can now pass envionmnet based on situation 
     * @param  mixed $username - you can now enter specific user name or use default values
     * @param  mixed $password - same thing for password 
     * @return void
     */
    public function __construct($config, $username = 'root', $password = '')
    {
        //$dsn = data source name aka a string that declares your connection to db
        $dsn = "mysql:" . http_build_query($config, '' , ';');
        
        //Refactor dsn so now we build the string cleaner: string(60) "mysql:host=localhost;port=3306;dbname=phpapp;charset=utf8mb4"
        

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ,       //you can see the default fetch here 

        ]);
    }
    
    /**
     * Query and execute mysql statements 
     *
     * @param  mixed $query
     * @return void
     */
    public function query($query, $params = [])
    {
        //Prepare your query and run it 
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
        // PDO says: "Here's the SQL structure, and separately here's the DATA"
        // Database receives them as TWO separate things:
        //   1. SQL command: "select * from users where id = ?"
        //   2. Data value: 5 (flagged as "this is DATA, not code")
        
        //Better to return just the statement on its own to not limit what you can do with it
        return $this;
    }

    public function getAll(){
        return $this->stmt->fetchAll();
    }

    public function find(){
        return $this->stmt->fetch();
    }

    public function findOrFail(){

        $result = $this->find();

        if(!$result){
            abort();
        }

        return $result;
    }

    

}