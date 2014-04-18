<?php
/**
 * Handles user login, registration, and related tasks
 */
class LoginModel extends Model {
    /**
     * Constructor
     */
    public function __construct( $database) {
        parent::__construct($database);
    }
    
    /**
     * Checks if a user with the specified name exists
     * 
     * returns true if the user exists, false otherwise
     * 
     * @param string $username
     * 
     * @return boolean true if the $username exists
     */
    public function usernameExists ( $username ) {
        $stmnt = $this->db->prepare("select user.username,
                                            user.email
                                         from user
                                         where user.username = :username
                                            or user.email = :username");
        $stmnt->execute(array(':username' => $username));
        if ( $stmnt->rowCount() == 1  ) { return true; }
        else { return  false; }
    }
    
    /**
     * Login process
     * 
     * @return boolean true is the login process was successful
     */
    public function login () {
        
        if ( $this->usernameExists($_POST['loginUsername']) ) {
            $stmnt = $this->db->prepare("select password from user where username = :username");
            $stmnt->execute(array(':username' => $_POST['loginUsername']));
            $password = $stmnt->fetchColumn(0);
            
            if ( $_POST['loginPassword'] == $password ) {
                
                return true;
            } else {
                return false;
            }
            //password_verify($_POST['inputPssword'], $)
        } else {
            // user not found
        }
        
    }
}