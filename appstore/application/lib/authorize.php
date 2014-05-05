<?php
/**
 * Handles user authorization
 */
class Authorize {
    /**
     * User must be logged in to access page
     */
    public static function requireLogin () {
        Session::initialize();
        
        if ( !isset($_SESSION['loggedIn']) ) {
            Session::destroy();
            header('Location: ' . URL . '/login');
        }
    }
    
    /**
     * User must not be logged in
     * 
     * used for login and registration pages
     */
    public static function requireLoggedOut () {
        Session::initialize();
        if ( isset($_SESSION['loggedIn']) ) {
            header('Location: ' . URL);
        }
    }
}
