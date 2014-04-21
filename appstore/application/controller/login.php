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
        $this->render('login/dualForm');
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
        
        
        $model = $this->loadModel('Login');
        if ( $model->login() ) {
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
        $model =$this->loadModel('Login');
        $model->register();
        header('Location: ' . URL . '/overview');
        
    }
}
