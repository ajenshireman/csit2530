<?php
/**
 * The User class
 * 
 * holds informatino for a single user
 */
class User {
    private $userId;
    private $username;
    private $password;
    private $email;
    private $created;
    private $edited;
    
    public function set ($key, $value) {
        $this->$key = $value;
    }
    
    public function get ( $key ) {
        return $this->$key;
    }
    
}
