<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
      $this->KategoriModel = new KategoriModel() ;
      helper('form');
    }
/* ######################################### Tampilkan Data ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Halaman Departemen',
            'link' => $this->request->uri->getSegment(1),
            'kategori' => $this->KategoriModel->getKategori(),
        ];
        return view('kategori/index', $data);
    }

/* ######################################### Simpan Data ########################################################## */
    public function add(){
      $data = [
        'nama_kategori' => $this->request->getVar('nama_kategori'),
      ];
      $this->KategoriModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
      return redirect()->to('kategori');
    }
/* ######################################### Simpan Edit ########################################################## */
    public function edit($id_kategori){
      $data = [
        'id_kategori' => $id_kategori,
        'nama_kategori' => $this->request->getVar('nama_kategori'), 
      ];
      $this->KategoriModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
      return redirect()->to('kategori');
    }

/* ######################################### Simpan Delete ########################################################## */
    public function delete($id_kategori){
      $this->KategoriModel->delete($id_kategori);
      session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
      return redirect()->to('/kategori');
    }
}