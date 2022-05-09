<?php

namespace App\Controllers;

use App\Models\DepartemenModel;

class Departemen extends BaseController
{
    public function __construct()
    {
      $this->DepartemenModel = new DepartemenModel() ;
      helper('form');
    }
/* ######################################### Tampilkan Data ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Halaman Departemen',
            'departemen' => $this->DepartemenModel->getdep(),
            'link' => $this->request->uri->getSegment(1),
        ];
        return view('departemen/index', $data);
    }

/* ######################################### Simpan Data ########################################################## */
    public function add(){
      $data = [
        'nama_dep' => $this->request->getVar('nama_dep'),
      ];
      $this->DepartemenModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
      return redirect()->to('departemen');
    }
/* ######################################### Simpan Edit ########################################################## */
    public function edit($id_dep){
      $data = [
        'id_dep' => $id_dep,
        'nama_dep' => $this->request->getVar('nama_dep'), 
      ];
      $this->DepartemenModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
      return redirect()->to('departemen');
    }

/* ######################################### Simpan Delete ########################################################## */
    public function delete($id_dep){
      $this->DepartemenModel->delete($id_dep);
      session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
      return redirect()->to('/departemen');
    }
}