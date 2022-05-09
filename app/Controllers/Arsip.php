<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\DepartemenModel;
use App\Models\KategoriModel;
use App\Models\UserModel;

class Arsip extends BaseController
{
    public function __construct()
    {
      $this->ArsipModel = new ArsipModel();
      $this->UserModel = new UserModel();
      $this->KategoriModel = new KategoriModel();
      $this->DepartemenModel = new DepartemenModel();
      helper('form');
    }
    public function index()
    {
        
        $data = [
            'title' => 'Halaman Arsip',
            'link' => $this->request->uri->getSegment(1),
            'arsip' => $this->ArsipModel->getArsip(),
            'kategori' => $this->KategoriModel->getKategori(),
            'users' => $this->UserModel->getUsers() ,
            'departemen' => $this->DepartemenModel->getdep()

        ];
        return view('arsip/index', $data);
    }

    public function add(){
      $data = [
        'title' => 'Tambah Arsip',
        'link' => $this->request->uri->getSegment(1),
        'arsip' => $this->ArsipModel->getArsip(),
        'kategori' => $this->KategoriModel->getKategori(),
        'users' => $this->UserModel->getUsers() ,
        'departemen' => $this->DepartemenModel->getdep(),
        'validation' => \Config\Services::validation(),
      ];
    return view('arsip/add', $data);
    }

    public function save(){
      if($this->validate([
        'nama_file' => [
            'label'  => 'Nama Arsip',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],],
        'deskripsi' => [
          'label'  => 'Deskripsi',
          'rules'  => 'required',
          'errors' => [
              'required' => '{field} Wajib Di isi!!',
          ],], 
          'id_kategori' => [
            'label'  => 'Kategori',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],], 
        'file_arsip' => [
          'label'  => 'File Arsip',
          'rules' => 'ext_in[file_arsip,pdf]', 
          'errors' => [
          'ext_in' => 'Format {field} Wajib .PDF'
                ]]
        
        ])){
          $fileArsip = $this->request->getFile('file_arsip'); // mengambil file foto yang akan di upload di form
          $namaFile = $fileArsip->getRandomName(); // merandom nama file foto
          $fileArsip->move('file_arsip', $namaFile); // memidahkan foto ke public/img/
          $ukuranFile = $fileArsip->getSizeByUnit('kb'); //mengambil ukuran file
          $data = [
              'no_arsip' => $this->request->getPost('no_arsip'),
              'nama_file' => $this->request->getPost('nama_file'),
              'deskripsi' => $this->request->getPost('deskripsi'),
              'id_kategori' => $this->request->getPost('id_kategori'),
              'id_dep' => session()->get('id_dep'),
              'id_user' => session()->get('id_user'),
              'file_arsip' => $namaFile,
              'ukuran_file' => $ukuranFile,
          ];
          // jika valid
          $this->ArsipModel->save($data);
          session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
          return redirect()->to('arsip');
          }else{
          // jika tidak valis
          return redirect()->to('arsip/add')->withInput();
          }    
    }


    public function edit($id_arsip){
      $data = [
        'title' => 'Tambah Arsip',
        'link' => $this->request->uri->getSegment(1),
        'arsip' => $this->ArsipModel->detail($id_arsip),
        'kategori' => $this->KategoriModel->getKategori(),
        'users' => $this->UserModel->getUsers() ,
        'departemen' => $this->DepartemenModel->getdep(),
        'validation' => \Config\Services::validation(),
      ];
    return view('/arsip/edit', $data);
    }

    public function update($id_arsip){
      if($this->validate([
        'nama_file' => [
            'label'  => 'Nama Arsip',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],],
        'deskripsi' => [
          'label'  => 'Deskripsi',
          'rules'  => 'required',
          'errors' => [
              'required' => '{field} Wajib Di isi!!',
          ],], 
          'id_kategori' => [
            'label'  => 'Kategori',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],], 
        'file_arsip' => [
          'label'  => 'File Arsip',
          'rules' => 'ext_in[file_arsip,pdf]', 
          'errors' => [
          'ext_in' => 'Format {field} Wajib .PDF'
                ]]
        
        ])){
            $fileArsip = $this->request->getFile('file_arsip');
            $arsipLama = $this->request->getPost('arsipLama');
      
            // cek gambar, apakah tetap gambar lama
            if($fileArsip->getError() == 4 ){
             $namaArsip = $arsipLama;
            //  jika file tdk di ganti
             $data = [
                'id_arsip' => $id_arsip,
                'nama_file' => $this->request->getPost('nama_file'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'id_kategori' => $this->request->getPost('id_kategori'),
              ];
            }else{
            // jika file di ganti
            // generate nama file random
           $namaArsip  = $fileArsip->getRandomName();
            // pindahkan gambar 
            $fileArsip->move('file_arsip',$namaArsip );
            //ambil ukuran arsip
            $ukuranFile = $fileArsip->getSizeByUnit('kb');
            // hapus file yang lama
            unlink('file_arsip/' . $arsipLama );
            $data = [
                'id_arsip' => $id_arsip,
                'nama_file' => $this->request->getPost('nama_file'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'file_arsip' => $namaArsip,
                'ukuran_file' => $ukuranFile,
          ];}
            // jika valid
            $this->ArsipModel->save($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
            return redirect()->to('arsip');
            }else{
            // jika tidak valis
            return redirect()->to('arsip/edit/' . $id_arsip)->withInput();
          }
    }

    public function viewpdf($id_arsip){
      $data = [
        'title' => 'Tambah Arsip',
        'link' => $this->request->uri->getSegment(1),
        'arsip' => $this->ArsipModel->detail($id_arsip),
      ];
    return view('/arsip/viewpdf', $data);
      
    }

    public function delete($id_arsip){
      // mengapus file lama
      $arsip = $this->ArsipModel->detail($id_arsip);
      if($arsip['file_arsip'] != ""){
          unlink('file_arsip/' .$arsip['file_arsip']);
      }
      $data = [
          'id_arsip' => $id_arsip,
      ];
      $this->ArsipModel->delete($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
      return redirect()->to('arsip');
    }
}