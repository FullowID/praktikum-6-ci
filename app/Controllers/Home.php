<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['name'] = "Mahasiswa";
        return view('welcome_message',$data);
    }
}
