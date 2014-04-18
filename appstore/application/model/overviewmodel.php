<?php
/**
 * Shows  ist of registered users
 */
class OverviewModel extends Model {
    /**
     * Shows a list of all registered users
     * 
     * @return array
     */
    public function getUsers () {
        $stmnt = $this->db->prepare("select userId, username, email, created from user");
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
        $query = <<<QUERY
select user.userId,  user.username, user.email, user.created, user.edited
    from user where user.userId = :userId; 
QUERY;
        $stmnt = $this->db->prepare($query);
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmnt->execute(array(':userId' => $userId));
        
        if ( $stmnt->rowCount() == 1 ) {
            return $stmnt->fetch();
        } else {
            // ERROR
        }
    }
}
