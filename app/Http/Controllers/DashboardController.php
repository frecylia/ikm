<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        return view('dashboard.index');
    }
    // public function formulir(){
    //     return view('formulir.formulir');
    // }

    public function test(){
        return view('dashboard.test');
    }

    public function daerah(){
        return view('dashboard.daerah');
    }

    public function Kategori(){
        return view('dashboard.kategori');
    }
}
