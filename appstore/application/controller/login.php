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
        $this->render('login/loginForm');
    }
    
    /**
     * proceses a login attemp login through the login form
     */
    public function login() {
        // make sure the user has entered a username and password
        if ( !isset($_POST['loginUsername']) || empty($_POST['loginUsername']) ) {
            return;
        }
        if ( !isset($_POST['loginPassword']) || empty($_POST['loginPassword']) ) {
            return;
        }
        
        $tryUser = $_POST['loginUsername'];
        $tryPassword = $_POST['loginPassword'];
        $model = $this->loadModel('Login');
        if ( $model->login($tryUser, $tryPassword) ) {
            echo 'Login Success!';
            // redirect to main page? or previous page
        } else {
            // show the login form again
            echo 'Login Failed';
        }
    }
    
    /**
     * Registers a new user
     */
    public function register () {
        //
    }
}
