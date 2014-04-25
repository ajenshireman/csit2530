<?php
/**
 * Autoloads classes if the file exists
 * 
 * Classes should be in a file named by the class name in lower case
 * 
 * @param string $class
 */
function autoload ( $class ) {
    $filename = strtolower($class) . '.php';
    if ( file_exists(CONTROLLER_PATH . $filename) ) {
        require CONTROLLER_PATH . $filename;
    } else if ( file_exists(MODEL_PATH . $filename) ) {
        require MODEL_PATH . $filename;
    } else if ( file_exists(CLASS_PATH . $filename) ) {
        require CLASS_PATH . $filename;
    } else if ( file_exists(LIB_PATH . $filename) ) {
        require LIB_PATH . $filename;
    } else {
        exit('The file ' . $filename . ' does not exist');
    }
}

// register the autoload functions with spl_autoload
spl_autoload_register('autoload');
