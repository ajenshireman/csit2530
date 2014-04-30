<?php
/**
 * The Status class
 * 
 * Statuses are assigned to many db objects
 *  ex: user accounts, applications
 */
class Status extends DatabaseObject {
    protected $statusId;
    protected $name;
    protected $description;
    protected $created;
    protected $edited;
    
}
