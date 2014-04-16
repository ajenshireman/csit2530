<?php
/**
 * main controller for the application
 * parses the url, 
 *  loads the correct controller,
 *  and calls the correct method for that controller
 * Calls the index() method of the controller as a fallback
 * Call the index() method of the main page as a fallback
 */
class Router {
    /**
     * @var mixed the controller
     */    
    private $controller;
    
    /**
     * @varmixed the method to invoke
     */
    private $action;
    
    /**
     * @var mixed additional parameters
     */
    private $parameters = null;
    
    /**
     * start the application
     * parse the url and call the appropriate controller/method or fallback
     */
    function __construct () {
        // use the url to figure out what to do
        $this->parseUrl();
        
        if ( file_exists('./application/controller/' . $this->controller . '.php') ) {
            $this->controller = new $this->controller();
            
            if ( method_exists($this->controller, $this->action) ) {
                if ( isset($this->parameters) ) {
                    $this->controller->{$this->action}($this->parameters);
                } else {
                    $this->controller->{$this->action}();
                }
            }
        } else {
            $main = new Main();
            $main->index();
        }
    }
    
    /**
     * parse the url and set the correct variables
     */
    function parseUrl () {
        if ( isset($_GET['url']) ) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            
            $this->controller = ( isset($url[0]) ) ? $url[0] : 'main';
            $this->action = ( isset($url[1]) ) ? $url[1] : 'index';
            
            if ( count($url) > 2 ) {
                $this->parameters = array();
                for ( $i = 2; $i < count($url); $i++ ) {
                    array_push($this->parameters, $url[$i]);
                }
            }
            
            /* debug *
            echo 'Controller: ' . $this->controller . '<br />';
            echo 'Action: ' . $this->action . '<br />';
            foreach ( $this->parameters as $parameter ) {
                echo 'Parameter: ' . $parameter . '<br />';
            }
            /* */
        }
    }
}
