<?php
/**
 * Base Model class
 * 
 * When created, models should be passed a Database object to use
 */
class Model {
    /**
     * Constructs a model with the given database connection
     * 
     * @param Database $database
     */
    public function __construct ( $database ) {
        $this->db = $database;
    }
    
    /**
     * converts a PDOStatement result into an array
     * 
     * @param PDOStatment $stmnt
     * 
     * @return array
     */
    public function resultToArray ( $stmnt ) {
        $results = array();
        while ( $result = $stmnt->fetch() ) {
            array_push($results, $result);
        }
        return $results;
    }
    
    /**
     * gets the status name of a database object
     * 
     * @param string $table name of the tabe to look in
     * @param int $id id of the item to look up
     * 
     * @return string the name corresponding to the status Id
     */
    public function getStatus ( $table, $id ) {
        $stmnt = $this->db->prepare("select status.name from status
                                        join :table on {$table}.{$table}Id 
                                        where {$table}.{$table}Id = :id");
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Status');
        $stmnt->execute(array(':table' => $table, ':id' => $id));
        if ( $stmnt->rowCount() == 1 ) {
            $status =  $stmnt->fetch();
            return $status->get('name');
        } else {
            // ERROR
        }
    }
    
}
