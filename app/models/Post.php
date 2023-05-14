<?php
class Post
{
    private $db;

    // Create a constructor 
    public function __construct()
    {
        $this->db = new Database;
    }
}
