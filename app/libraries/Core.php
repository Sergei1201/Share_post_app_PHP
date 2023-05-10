<?php
/*
App core class
Creates URLs & loads core controllers
URL format: /controllers/methods/params
*/
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    // Create a constructor
    public function __construct()
    {
        $url = $this->getUrl();
        // Check if there's a controller in the controllers folder that matches our URL
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // If the file exists, set the controller from the file as a default
            $this->currentController = ucwords($url[0]);
            // Unset the zero index 
            unset($url[0]);
        }
        // Require controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        // Instantiate controller class by creating a new object
        $this->currentController = new $this->currentController;

        // Check if a method is set and exists in the class
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                // If the method exists, set it as a default
                $this->currentMethod = $url[1];
                // Unset the first index
                unset($url[1]);
            }
        }

        // Handle URL params
        $this->params = $url ? array_values($url) : [];
        // Callback function
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // GetUrl method
    public function getUrl()
    {   // Check if the URL is set
        if (isset($_GET['url'])) {
            // Strip slashes from the URL
            $url = rtrim($_GET['url']);
            // Sanitize the URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Turn the URL into an associative array to use it in our app
            $url = explode('/', $url);
            // Return the URL (array)
            return $url;
        }
    }
}
