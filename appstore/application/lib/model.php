<?php
/**
 * Base Model class
 * 
 * When created, models should be passed a Database object to use
 */
class Model {
    /**
     * No arg constructor
     */
    private function __construct () {}
    
    /**
     * Constructs a model with the given database connection
     * 
     * @param Database $database
     */
    public function __construct ( $database ) {
        $this->db = $database;
    }
}