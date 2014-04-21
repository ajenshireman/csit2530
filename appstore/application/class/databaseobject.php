<?php
/**
 * Base class for Objects created from db tables
 * 
 * Defines global set and get functions.
 * Defines functions for getting created/edited dates from timestamps
 */
class DatabaseObject {
    /**
     * Sets a property to a value
     * 
     * @param mixed $key
     * @param mixed $value
     */
    public function set ($key, $value) {
        $this->$key = $value;
    }
    
    /**
     * Returns the value of a property
     * 
     * @param mixed $key
     * 
     * @return mixex
     */
    public function get ( $key ) {
        return $this->$key;
    }
    
    /**
     * Converts the created timestamp to a date
     * 
     * $return date
     */
    public function createDate () {
        return date('Y-m-d H H:i:s', $this->created);
    }
    
    /**
     * Converts the edited timestamp to a date
     *
     * $return date
     */
    public function editDate () {
        return date('Y-m-d H H:i:s', $this->edited);
    }
}