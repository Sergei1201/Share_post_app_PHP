<?php
/*
* The base controller that loads vies & models
*/
class Controller
{
    // Load a model
    public function model($model)
    {
        // Require a model from a file
        require_once '../app/models/' . $model . '.php';
        // Instantiate a new model class / create a new object
        return new $model();
    }

    // Load a view
    public function view($view, $data = [])
    {
        // Check if a view exists 
        if (file_exists('../app/views/' . $view . '.php')) {
            // Require the view
            require_once '../app/views/' . $view . '.php';
        } else {
            die('The view does not exist');
        }
    }
}
