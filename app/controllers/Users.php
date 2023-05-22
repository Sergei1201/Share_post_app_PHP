<?php
// Create a users class to register, login, etc
class Users extends Controller
{
    // Constructor
    public function __construct()
    {
    }

    // Register a user
    public function register()
    {

        // Check if the method is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
        } else {
            // Define user data as an associative array
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // Load form 
            $this->view('/users/register', $data);
        }
    }
    // Login user
    public function login()
    {
        // Check if the method is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process the form
        } else {
            // Define user data as an associative array
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            // Load form
            $this->view('/users/login', $data);
        }
    }
}
