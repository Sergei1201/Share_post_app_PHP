<?php
/*
* Create a Database class
* Instantiate a PDO class & connect to MySQL
* Query the database
* Fetch the results
*/
class Database
{
    // Define DB params
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;

    // Define some other properties that pertain to PDO
    private $dbh;
    private $error;
    private $stmt;

    // Create a constructor to instantiate a PDO class and connect to the database
    public function __construct()
    {
        // Define DSN connection string
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        // Define PDO options as an associative array
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        );
        // Instantiate a PDO class
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Query the database
    public function queryDB($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind params
    public function bindParams($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the query
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Get the results
    public function getResults()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    // Get a single result
    public function getSingle()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    // Get row count
    public function rowCount()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }
}
