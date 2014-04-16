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
        $this->db = new Database();
    }
    
    /**
     * Loads the model with the given name, and pass the db object to the model
     * 
     * @param string $modelName the name of the model to load
     * 
     * @return object
     */
    protected function loadModel ( $modelName ) {
        $modelName = strtolower($modelName) . 'Model';
        return new $modelName($this->db);
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
