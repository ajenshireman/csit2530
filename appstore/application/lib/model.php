<?php
/**
 * Base Model class
 * 
 * When created, models should be passed a Database object to use
 */
class Model {
    /**
     * Constructs a model with the given database connection
     * 
     * @param Database $database
     */
    public function __construct ( $database ) {
        $this->db = $database;
    }
}
