<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return array("pesan" => "Ini adalah home dari HomeController");
    }

    public function kenalan($nama = "Acuy"){
        return array("pesan" => "Aku $nama");
    }
}

