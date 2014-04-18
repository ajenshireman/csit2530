<?php
/**
 * Handles user login
 */
class LoginModel extends Model {
    /**
     * Login process
     * 
     * @param string $tryUser username from login form
     * @param string $tryPassword password from login form
     * 
     * @return boolean 
     */
    public function login ( $tryUsername, $tryPassword ) {
        $stmnt = $this->db->prepare("select user.username,
                                            user.email 
                                         from user 
                                         where user.username = :username 
                                            or user.email = :username");
        $stmnt->execute(array(':username' => $tryUsername));
        
        if ( $stmnt->rowCount() == 1 ) {
            // valid usename supplied
            $username = $stmnt->fetchAll();
            $username = $username[0]['username'];
            
            $stmnt = $this->db->prepare("select password from user where username = :username");
            $stmnt->execute(array(':username' => $username));
            $password = $stmnt->fetchColumn(0);
            
            if ( $tryPassword == $password ) {
                
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