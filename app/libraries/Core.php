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

    // Create constructor
    public function __construct()
    {
        $url = $this->getUrl();
        /* Look in the controllers folder to figure out if there's a controller that matches the controller 
        from the URL
        If there's a match set it as a current controller */
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            // Unset the zero index
            unset($url[0]);
        }

        // Instantiate a new controller class
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // Get a method, the second argument of the $url array
        if (method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        }

        // Get params
        $this->params = $url ? array_values($url) : [];
        // Call a callback with URL of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Get URL
    public function getUrl()
    {
        // Strip slashes from the URL
        $url = rtrim($_GET['url'], '/');
        // Sanitize the URL
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // Turn the URL into an array
        $url = explode('/', $url);
        // Return the URL
        return $url;
    }
}
