<?php
/*
* Create a Database class
* Instantiate a PDO class to connecto to the database
* Fetch rows from the database
* Display the results from DB
*/
class Database
{

    // DB params
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;

    // Some other params for dealing with PDO
    private $dbh;
    private $error;

    // Create a constructor
    public function __construct()
    {
        // Create a connection string
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        // Set initial PDO params in an array
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        );
        // Create a PDO instance and try connecting to the database
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}
