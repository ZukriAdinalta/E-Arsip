<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    public function totalArsip(){
      return $this->db->table('tbl_arsip')->countAll();
    }

    public function totalUser(){
      return $this->db->table('tbl_user')->countAll();
    }

    public function totalDepartemen(){
      return $this->db->table('tbl_dep')->countAll();
    }

    public function totalKategori(){
      return $this->db->table('tbl_kategori')->countAll();
    }
}