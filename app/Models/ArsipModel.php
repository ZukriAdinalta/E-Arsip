<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ArsipModel extends Model{
    protected $table = 'tbl_arsip';
    protected $primaryKey = 'id_arsip';
    protected $useTimestamps = true;
    protected $createdField  = 'tgl_upload';
    protected $updatedField  = 'tgl_update';
    protected $allowedFields = ['no_arsip', 'id_kategori','no_email','nama_file', 'deskripsi', 'file_arsip', 'id_dep', 'id_user', 'ukuran_file'];


    public function getArsip()
    {
      return $this->db->table('tbl_arsip')
      ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left' )
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left' )
      ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left' )
      ->orderBy('id_arsip', 'DESC')
      ->get()
      ->getResultArray();
    }

    public function detail($id_arsip){
      return $this->db->table('tbl_arsip')
      ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left' )
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left' )
      ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left' )
      ->where('id_arsip', $id_arsip)
      ->get()
      ->getRowArray();
    }
}