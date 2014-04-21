<?php
/**
 * Handles user registration
 */
class Register extends Controller {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Displays the registration form
     */
    public function index () {
        $this->render('login/registrationForm');
    }
    
    /**
     * Registers a new user
     */
    public function register () {
        $model =$this->loadModel('Login');
        if ( $model->register() ) {
            header('Location: ' . URL . '/overview');
        }
    }
}
