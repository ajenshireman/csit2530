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
     * Gets the id for the user with the specified username
     * 
     * @param string $username
     * 
     * @return int
     * 
     * @throws Exception user not found
     */
    public function getUserId ( $username ) {
        $stmnt = $this->db->prepare("select user.userId
                                         from user
                                         where user.username = :username
                                            or user.email = :username");
        $stmnt->execute(array(':username' => $username));
        if ( $stmnt->rowCount() == 1  ) {
            return $stmnt->fetchColumn(0);
        } else {
            throw new Exception($username . 'not found');
        }
    }
    
    /**
     * Checks if the given passord matches the given users password
     * 
     * @param string $tryPassword
     * @param int $userId
     * 
     * @return boolen
     * 
     * @throws Exception not exactly 1 result
     */
    public function verifyUserPassword ( $tryPassword, $userId ) {
        $stmnt = $this->db->prepare("select password from user where userId = :userId");
        $stmnt->execute(array(':userId' => $userId));
        if ( $stmnt->rowCount() == 1  ) {
            $password = $stmnt->fetchColumn(0);
            if ( $tryPassword == $password ) { return true; } 
            else { return false; }
        } else {
            throw new Exception('User not found');
        }
    }
    
    /**
     * Login process
     * 
     * @return boolean true is the login process was successful
     */
    public function login () {
        
        try {
            $userId = $this->getUserId($_POST['loginUsername']);
            try {
                if ( $this->verifyUserPassword($_POST['loginPassword'], $userId) ) {
                    return true;
                } else {
                    return false;
                }
            } catch ( Exception $e ) {
                return false;
            }
        } catch ( Exception $e) {
            // user not found
            return false;
        }
        
    }
}