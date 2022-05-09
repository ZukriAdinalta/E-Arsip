<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Login',

        ];
        return view('login/login', $data);
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id_user'       => $data['id_user'],
                    'nama_user'     => $data['nama_user'],
                    'email'         => $data['email'],
                    'level'         => $data['level'],
                    'foto'         => $data['foto'],
                    'id_dep'         => $data['id_dep'],
                    'created_at'         => $data['created_at'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/home');
            }else{
                $session->setFlashdata('pesan', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('pesan', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}