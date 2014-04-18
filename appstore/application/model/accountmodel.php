<?php
/**
 * Performs CRUD operations on user accounts
 */
class AccountModel extends Model {
    /**
     * Constructor
     */
    public function __construct( $database ) {
        parent::__construct($database);
    }
    
    /**
     * Shows a list of all registered users
     * 
     * @return array
     */
    public function getUsers () {
        $stmnt = $this->db->prepare("select user.userId, 
                                            user.username, 
                                            user.email, 
                                            user.created, 
                                            user.edited
                                        from user");
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmnt->execute();
        
        $users = array();
        while ( $user = $stmnt->fetch() ) {
            array_push($users, $user);
        }
        return $users;
    }
    
    /**
     * Gets the information for a single user
     * 
     * @param int $userId
     * 
     * @return User $user
     */
    public function getUserDetails ( $userId ) {
        $stmnt = $this->db->prepare("select user.userId,
                                            user.username, 
                                            user.email, 
                                            user.created, 
                                            user.edited
                                        from user 
                                        where user.userId = :userId;");
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmnt->execute(array(':userId' => $userId));
        
        if ( $stmnt->rowCount() == 1 ) {
            return $stmnt->fetch();
        } else {
            // ERROR
        }
    }
}
