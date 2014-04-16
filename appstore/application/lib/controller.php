<?php
/**
 * Controller base class. All controllers extend this class
 */
class Controller {
    /**
     * @var null database connection
     */
    public $db = null;
    
    function __construct () {
        $this->getConnection();
    }
    
    /**
     * set p the database connection
     * use credentials from application/config/config.php
     */
    private  function getConnection () {
        // Set the PDO options
        $options = array(
        	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_WARNING
        );
        
        // connect to the database
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }
    
    /**
     * load the model with the given name, and pass the db object to the model
     * The mode class is in camelCase, but the file is all lowercase
     * 
     * @pram string $modelName the name of the model to load
     */
    protected function loadModel ( $modelName ) {
        require MODEL_PATH . strtolower($modelName);
    }
    
    /**
     * renders the specified page
     * 
     * @param string $filename php page to render, without extension
     * @param boolean $renderHeadAndFoot render the common header and footer, 
     *          defaluts to true
     */
    protected function render ( $filename, $renderHeadAndFoot = true ) {
        if ( $renderHeadAndFoot == true ) {
            require COMMON_HEAD;
            require VIEW_PATH . $filename . '.php';
            require COMMON_FOOT;
        } else {
            require VIEW_PATH . $filename . '.php';
        }
    }
}