<?php
/**
 * main controller for the application
 * parses the url, 
 *  loads the correct controller,
 *  and calls the correct method for that controller
 * Calls the index() method of the controller as a fallback
 * Call the index() method of the main page as a fallback
 */
class Application {
    /**
     * @var string the controller
     */    
    private $urlController;
    
    /**
     * @var string the method to invoke
     */
    private $urlAction;
    
    /**
     * @var array additional parameters
     */
    private $urlParameters;
    
    /**
     * start the application
     * parse the url and call the appropriate controller/method or fallback
     */
    function __construct () {
        // use the url to figure out what to do
        $this->parseUrl();
        
        if ( file_exists('./application/controller/' . $this->urlController . 'php') ) {
            require './application/controller/' . $this->urlController . 'php';
            $this->urlController = new $this->urlController();
        } else {
            require './application/controller/main.php';
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
            
            echo $url;
            
            $url = explode('/', $url);
        }
    }
}
