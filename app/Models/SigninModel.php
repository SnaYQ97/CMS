<?php namespace App\Models;

use CodeIgniter\Model;

class SigninModel extends Model
{   
    protected $table      = 'users';
    protected $primaryKey = 'id';

    //protected $returnType     = 'array';
    //protected $db = db_connect();
    /* public function get_user($data) {
        $this->db->trans_start();
        $set_array = [
            $data['email'] => $email,
            $data['password'] => $password,
        ];
        $this->db->select('users.email, users.password');
        $this->db->where('users.nick, users.password', $set_array);
        $query = $this->db->get('users');
        return $query->result_array();
        $this->db->trans_complete();
    } */
    public function getUser($data = false)
    {
        if ($data == false)
        {
            return $this->findAll();
        }else {
            return $this->asArray()
            ->where(['email' => $data['email']])
            ->first();
        }
        
    }


}
?>