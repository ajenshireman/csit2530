<?php
/**
 * registry class
 * 
 * contains site-wide variables, and removes the need to store everything in
 *  $_SESSION or $_GLOBAL
 */

class Registry {
    /**
     * @var array containing site variables
     * 
     * @access private
     */
    private $vars = array();
    
    /**
     * set variables
     * 
     * @param string $index
     * @param mixed $value
     */
    public function set ( $index, $value ) {
        $this->vars[$index] = $value;
    }
    
    /**
     * get variables
     * 
     * @param string $index
     * 
     * @return mixed
     */
    public function get ( $index ) {
        return $this->vars[$index];
    }
}
