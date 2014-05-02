<?php
/**
 * class to handle session stuff
 * 
 * Creates a new sesion if none exists
 * Starts the session,
 * Destrys the sessino when the user logs out
 */

class Session {
    /**
     * starts the session if none exists
     */
    public static function initialize () {
        if ( session_id() =='' ) {
            session_start();
        }
    }
    
    /**
     * reenerates the session id
     * 
     * bool $delete_old_session
     */
    public function refresh ( $delete_old_session = false ) {
        session_regenerate_id($delete_old_session);
    }
    
    /**
     * sets a $_SESSION key to a value
     * 
     * @param mixed $key
     * @param mixed $value
     */
    public static function set( $key, $value ) {
        $_SESSION[$key] = $value;
    }
    
    /**
     * returns the value of a $_SESSION key
     * 
     * @param mixed $key
     * 
     * @return mixed
     */
    public static function get( $key ) {
        if ( isset($_SESSION[$key]) ) {
            return  $_SESSION[$key];
        }
    }
    
    /**
     * destroys the current session
     */
    public static function destroy () {
        session_destroy();
    }
}
