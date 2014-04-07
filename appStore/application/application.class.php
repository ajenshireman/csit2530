<?php

class Application {
    /** @var null the controller */
    private $urlController = null;
    
    /** @var null the method of the controler*/
    private $urlAction = null;
    
    /** @var null parameter one */
    private $urlParmeter1 = null;

    /** @var null parameter two */
    private $urlParmeter2 = null;
    
    /** @var null parameter three */
    private $urlParmeter3 = null;
    
    /**
     * start the application
     * 
     * Analyze the url elements and calls according to controller/method
     */
    public function __construct () {
        // create an array with url parts
        $this->splitUrl();
    }
    
    /**
     * get and split the url
     */
    private function splitUrl () {
        if ( isset($_GET['url']) ) {
            // split the url
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            
            // put the url parts into the correct vars
            $this->urlController = (isset($url[0])) ? $url[0] : null;
            $this->urlAcion = (isset($url[1])) ? $url[1] : null;
            $this->urlParamter1 = (isset($url[2])) ? $url[2] : null;
            $this->urlParamter2 = (isset($url[3])) ? $url[3] : null;
            $this->urlParamter3 = (isset($url[4])) ? $url[4] : null;
            
            /* debug */
            echo 'Controller: ' . $this->urlController . '<br />';
            echo 'Action: ' . $this->urlAction . '<br />';
            echo 'Parameter1: ' . $this->urlParameter1 . '<br />';
            echo 'Parameter2: ' . $this->urlParameter2 . '<br />';
            echo 'Parameter3: ' . $this->urlParameter3 . '<br />';
        }
    }
}
