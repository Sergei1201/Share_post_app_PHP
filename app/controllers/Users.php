<?php
// Create a users controller to register, login, etc
class Users extends Controller
{
    // Constructor
    public function __construct()
    {
    }

    // Register user
    public function register()
    {
        // Check if the method is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize data
            $_POST = filter_input_array(INPUT_POST);
            // Initialize data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // Validate data
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter your name';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] !== $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            // Check if there are not any errors
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                die('Success');
            } else {
                $this->view('users/register', $data);
            }
        } else {
            // Initialize data variable to represent users input as an associative array
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
            $this->view('users/register', $data);
        }
    }


    // Login user
    public function login()
    {
        // Check if the method is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $_POST = filter_input_array(INPUT_POST);
            // Initialize data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim(($_POST['password'])),
                'email_err' => trim(($_POST['email_err'])),
                'password_err' => trim(($_POST['password_err']))
            ];
            // Validate input
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            if (empty($data['email_err']) && empty($data['password_err'])) {
                die('Success');
            } else {
                $this->view('users/login', $data);
            }
        } else {
            // Initialize data variable as an associative array
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            // Load form
            $this->view('users/login', $data);
        }
    }
}
