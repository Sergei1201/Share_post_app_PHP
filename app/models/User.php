<?php
class User
{
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }
    // Query
    public function getUsers()
    {
        $this->db->queryDB('SELECT * FROM users');
        // Get results
        return $this->db->getResults();
    }
}
