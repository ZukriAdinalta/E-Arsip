<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class DepartemenModel extends Model{
    protected $table = 'tbl_dep';
    protected $primaryKey = 'id_dep';
    protected $allowedFields = ['nama_dep'];


    public function getdep()
    {
        return $this->findAll();
    }
}