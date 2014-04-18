<?php
/**
 * Handles user login and registration
 */
class Login extends Controller {
    public function index () {
        $this->render('login/loginForm');
    }
    
    public function doLogin() {
        // make sure the user has entered a username and password
        if ( !isset($_POST['inputUsername']) || empty($_POST['inputUsername']) ) {
            return;
        }
        if ( !isset($_POST['inputPassword']) || empty($_POST['inputPassword']) ) {
            return;
        }
        
        $tryUser = $_POST['inputUsername'];
        $tryPassword = $_POST['inputPassword'];
        $model = $this->loadModel('Login');
        if ( $model->login($tryUser, $tryPassword) ) {
            echo 'Login Success!';
        } else {
            echo 'Login Failed';
        }
    }
}
