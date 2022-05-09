<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
    public function __construct()
    {
        
        $this->HomeModel = new HomeModel();
    }
    public function index()
    {
        
        $data =[
            'title' => 'Halaman Home',
            'totalArsip' => $this->HomeModel->totalArsip(),
            'totalUser' => $this->HomeModel->totalUser(),
            'totalDep' => $this->HomeModel->totalDepartemen(),
            'link' => $this->request->uri->getSegment(1),
            'totalKategori' => $this->HomeModel->totalKategori(),
            'aktif' => $this->request->getPath(),
        ];
        return view('home', $data);
    }
}