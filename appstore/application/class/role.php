<?php
/**
 * the Role class
 */
class Role extends DatabaseObject {
    protected $roleId;
    protected $name;
    protected $descrition;
    protected $canBrowse;
    protected $canDownload;
    protected $canUpload;
    protected $canApprove;
    protected $isAdmin;
    protected $created;
    protected $createdBy;
    protected $edited;
    protected $editedBy;
    
    public function set ($key, $value) {
        $this->$key = $value;
    }
    
    public function get ( $key ) {
        return $this->$key;
    }
}
