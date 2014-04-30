<?php
/**
 * handles operations involving statuses
 */
class StatusModel extends Model {
    /**
     * gets all statuses
     * 
     * @return array
     */
    public function getStatuses () {
        $stmnt = $this->db->prepare("select status.statusId, 
                                            status.name, 
                                            status.description, 
                                            status.created, 
                                            status.edited
                                    from status");
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Status');
        $stmnt->execute();
        
        return $this->resultToArray($stmnt);
    }
}
