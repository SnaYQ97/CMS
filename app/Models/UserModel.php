<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{   
    //protected $table      = 'users';
    //protected $primaryKey = 'id';
    private $db;

    public function getUser()
    {
        $this->db = \Config\Database::connect();
    }

    /*query = 
    'SELECT users.email, profiles.name, profiles.surname, profiles.avatar, roles.name 
    from users 
    INNER JOIN profiles ON users.id = profiles.user_id 
    INNER JOIN roles ON roles.id = profiles.role_id 
    WHERE users.email = 'artowir9@wp.pl'
    */
}
?>