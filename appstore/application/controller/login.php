<?php
/**
 * Handles user login and registration
 */
class Login extends Controller {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Show the login form
     */
    public function index () {
        // if the user is already logged in, send them back to the main page
        Authorize::requireLoggedOut();
        
        $this->render('login/loginForm');
    }
    
    /**
     * proceses a login attemp login through the login form
     */
    public function login() {
        // make sure the user has entered a username and password
        if ( !isset($_POST['loginUsername']) || empty($_POST['loginUsername']) ) {
            echo 'Please enter a username';
            return;
        }
        if ( !isset($_POST['loginPassword']) || empty($_POST['loginPassword']) ) {
            echo 'Please enter a password';
            return;
        }
        
        
        $model = $this->loadModel('Login');
        if ( $model->login() ) {
            echo 'Login Success!';
            // redirect to main page? or previous page
            header('Location: ' . URL );
        } else {
            // show the login form again
            echo 'Login Failed';
        }
    }
    
    /**
     * logs the user out
     */
    public function logout () {
        Session::destroy();
        header('Location: ' . URL);
    }
}
