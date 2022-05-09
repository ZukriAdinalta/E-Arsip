<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_user','email','password', 'level', 'foto', 'id_dep'];


    public function getUsers()
    {
        // return $this->findAll();
      return $this->db->table('tbl_user')
      ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left' )
      ->orderBy('id_user', 'DESC')
      ->get()
      ->getResultArray();
    }

    public function detail($id_user){
      return $this->db->table('tbl_user')
      ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left' )
      ->where('id_user', $id_user)
      ->get()
      ->getRowArray();
    }
}