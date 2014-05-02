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
        //echo $stmnt->rowCount();
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
            if ( password_verify($tryPassword, $password) ) { return true; }
            else { return false; }
        } else {
            throw new Exception('User not found');
        }
    }
    
    /**
     * Validates the format of a given email address
     */
    public function validateFormat ( $string ) {
        // TODO use regex yo vaidate email format
        return true;
    }
    
    /**
     * Login process
     * 
     * @return boolean true is the login process was successful
     */
    public function login () {
        
        try {
            // check if the username is valid
            $userId = $this->getUserId($_POST['loginUsername']);
            try {
                // check if the password is corret
                if ( $this->verifyUserPassword($_POST['loginPassword'], $userId) ) {
                    // credentails ok
                    $accountModel = new AccountModel($this->db);
                    $user = $accountModel->getUserById($userId);
                    Session::refresh();
                    Session::initialize();
                    Session::set('loggedIn', true);
                    Session::set('username', $user->get('username'));
                    Session::set('userId', $user->get('userId'));
                    // TODO set roles?
                    /*
                    // log login
                    $stmnt = $this->db->prepare('insert into login ( userId, ip, success, created )
                                                    values ( :userId, :ip, :success :created );');
                    $stmnt->execute(array(
                    	':userId'  => $user->get('userId'),
                        ':ip'      => $_SERVER['HOST_ADDR'],
                        ':success' => 1,
                        ':created' => time()
                    ));
                    */
                    return true;
                } else {
                    /*
                    // log login
                    $stmnt = $this->db->prepare('insert into login ( userId, ip, success, created )
                                                    values ( :userId, :ip, :success :created );');
                    $stmnt->execute(array(
                            ':userId'  => $user->get('userId'),
                            ':ip'      => $_SERVER['HOST_ADDR'],
                            ':success' => 0,
                            ':created' => time()
                    ));
                    */
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
    
    /**
     * Registers a new user
     * 
     * @return boolean
     */
    public function register () {
        // validate input
        if ( !isset($_POST['registerUsername']) || empty($_POST['registerUsername']) ) {
            // username is required
            $errors['username'] = 'Please enter a username';
        } else {
            if ( $this->usernameExists($_POST['registerUsername']) ) {
                $errors['username'] = 'Username already exists';
            }
        }
        if ( !isset($_POST['registerEmail']) || empty($_POST['registerEmail']) ) {
            // email is required
            $errors['email'] = 'Please enter a valid email address';
        } else {
            // validate email format
            if ( $this->validateFormat($_POST['registerEmail']) ) {
                // check if the email is in use
                if ( $this->usernameExists($_POST['registerUsername']) ) {
                    $errors['username'] = 'Email already in use';
                }
            } else {
                // email is malformed
                $errors['email'] = 'Incorrect email format';
            }
        }
        if ( !isset($_POST['registerPassword']) || empty($_POST['registerPassword']) ) {
            // password is required
            $errors['password'] = 'Please enter a password';
        } else {
            if ( !isset($_POST['registerPasswordConfirm']) || ( $_POST['registerPassword'] != $_POST['registerPasswordConfirm'] )) {
                // passwords must match
                $errors['password'] = 'Passwords do not match';
            }
        }
        
        if ( isset($errors) ) {
            Session::set('errors', $errors); 
            return false;
        }
        
        $newUser = new User();
        $newUser->set('username', $_POST['registerUsername']);
        $newUser->set('password', password_hash($_POST['registerPassword'], PASSWORD_DEFAULT));
        $newUser->set('email', $_POST['registerEmail']);
        
        $accountModel = new AccountModel($this->db);
        $user = $accountModel->createUser($newUser);
        return  $user;
    }
    
}
