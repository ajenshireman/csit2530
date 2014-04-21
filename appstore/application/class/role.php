<?php
/**
 * the Role class
 */
class Role {
    private $roleId;
    private $name;
    private $descrition;
    private $canBrowse;
    private $canDownload;
    private $canUpload;
    private $canApprove;
    private $isAdmin;
    private $created;
    private $createdBy;
    private $edited;
    private $editedBy;
    
    public function set ($key, $value) {
        $this->$key = $value;
    }
    
    public function get ( $key ) {
        return $this->$key;
    }
}
