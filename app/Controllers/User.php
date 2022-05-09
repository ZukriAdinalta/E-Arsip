<?php

namespace App\Controllers;

use App\Models\DepartemenModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
      $this->UserModel = new UserModel();
      $this->DepartemenModel = new DepartemenModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Register',
            'users' => $this->UserModel->getUsers(),
            'link' => $this->request->uri->getSegment(1),
        ];
        return view('user/index', $data);
    }

    public function add()
    {
        $data =[
            'title' => 'Halaman Tambah User',
            'link' => $this->request->uri->getSegment(1),
            'validation' => \Config\Services::validation(),
            'users' => $this->UserModel->getUsers(),
            'departemen' => $this->DepartemenModel->getdep(),

        ];
        return view('user/add', $data);
    }

    public function save(){
        if($this->validate([
            'nama_user' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di isi!!',
                ],],
            'email' => [
              'label'  => 'Email',
              'rules'  => 'required|is_unique[tbl_user.email]',
              'errors' => [
                  'required' => '{field} Wajib Di isi!!',
                  'is_unique' => '{field} Sudah Ada',
              ],],
          'password' => [
              'label'  => 'Password',
              'rules'  => 'required|min_length[8]',
              'errors' => [
                  'required' => '{field} Wajib Di isi!!',
                  'min_length' => '{field} Wajib 8 Digit',
              ],], 
        'password2' => [
            'label'  => 'Konfirmasi Password',
            'rules'  => 'required|min_length[8]|matches[password]',
            'errors' => [
            'required' => '{field} Wajib Di isi!!',
            'min_length' => '{field} Wajib 8 Digit',
            'matches' => '{field} Tidak Cocok',
                ],],
        'level' => [
            'label'  => 'Status',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],],
        'id_dep' => [
            'label'  => 'Departemen',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Wajib Di isi!!',
            ],],
        'foto' => [
            'label'  => 'Foto',
            'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]', 
            'errors' => [
            'max_size' => 'Ukuran {field} telalu besar',
            'is_image' => 'Yang anda pilih bukan {field}',
            'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                  ]]
            
            ])){
            $foto = $this->request->getFile('foto'); // mengambil file foto yang akan di upload di form
            $namaFoto = $foto->getRandomName(); // merandom nama file foto
            $foto->move('img', $namaFoto); // memidahkan foto ke public/img/
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'level' => $this->request->getPost('level'),
                'id_dep' => $this->request->getPost('id_dep'),
                'foto' => $namaFoto,
            ];
            // jika valid
            $this->UserModel->save($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
            return redirect()->to('user');
            }else{
            // jika tidak valis
            return redirect()->to('user/add')->withInput();
            }
    }


    public function edit($id_user){
        
        $data = [
            'title' => 'Halaman Edit User',
            'link' => $this->request->uri->getSegment(1),
            'validation' => \Config\Services::validation(),
            'users' => $this->UserModel->detail($id_user),
            'departemen' => $this->DepartemenModel->getdep(),
        ];
        return view('user/edit', $data);
    }


    public function update($id_user){
        if($this->validate([
        'nama_user' => [
            'label'  => 'Nama',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
                ],],
        'email' => [
              'label'  => 'Email',
              'rules'  => 'required',
              'errors' => [
                  'required' => '{field} Wajib Di isi!!',
              ],],
        'level' => [
            'label'  => 'Status',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],],
        'id_dep' => [
            'label'  => 'Departemen',
            'rules'  => 'required',
            'errors' => [
            'required' => '{field} Wajib Di isi!!',
            ],],
        'foto' => [
            'label'  => 'Foto',
            'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]', 
            'errors' => [
            'max_size' => 'Ukuran {field} telalu besar',
            'is_image' => 'Yang anda pilih bukan {field}',
            'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                  ]]
            
            ])){
                $fileFoto = $this->request->getFile('foto');
                $fotoLama = $this->request->getPost('fotoLama');
          
                // cek gambar, apakah tetap gambar lama
                if($fileFoto->getError() == 4 ){
                 $namaFoto = $fotoLama;
                }else{
                // generate nama file random
               $namaFoto  = $fileFoto->getRandomName();
                // pindahkan gambar 
                $fileFoto->move('img',$namaFoto );
                // hapus file yang lama
                unlink('img/' . $fotoLama );
                }
            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'level' => $this->request->getPost('level'),
                'id_dep' => $this->request->getPost('id_dep'),
                'foto' => $namaFoto,
            ];
            // jika valid
            $this->UserModel->save($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
            return redirect()->to('user');
            }else{
            // jika tidak valis
            return redirect()->to('user/edit/' . $id_user);
            }
    }


    public function delete($id_user){
        // mengapus foto lama
        $foto = $this->UserModel->find($id_user);
        if($foto['foto'] != ""){
            unlink('img/' . $foto['foto']);
        }
        $this->UserModel->delete($id_user);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('user');
    }


}