<?php
class Post
{
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }
}
