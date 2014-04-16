<?php
/**
 * Class to handle the database connection
 * 
 * One object can be passed to the models to prevent multiple connections
 */
class Database extends PDO {
    /**
     * Creates a new Database object
     * 
     * Connects to the server using credientials from config.php
     */
    public function __construct () {
        // Set the PDO options
        $options = array(
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_WARNING
        );
        
        // connect to the database
        parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }
}
