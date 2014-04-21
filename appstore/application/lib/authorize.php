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
}
