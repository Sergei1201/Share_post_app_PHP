<?php
/*
* Create a database class
* Instantiate a PDO class
* Connect to the database
* Query the database
* Fetch the results
*/
class Database
{
    // DB params
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;

    // Define other properties for dealing with PDO and DB
    private $dbh;
    private $error;
    private $stmt;

    // Create a constructor
    public function __construct()
    {
        // Create a connectiong string to DB
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        // Set default PDO attributes as an associative array
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_PERSISTENT => true
        );
        // Intantiate a PDO class and try connecting to DB
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Query DB
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
                    break;
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

    // Get results
    public function getResults()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    // Get a single record
    public function getSingle()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    // Get row count
    public function getRowCount()
    {
        return $this->stmt->rowCount();
    }
}
