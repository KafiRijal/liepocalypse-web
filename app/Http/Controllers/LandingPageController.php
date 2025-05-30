<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function riwayat()
    {
        return view('riwayat');
    }
    public function tentang()
    {
        return view('tentang');
    }
    public function langganan()
    {
        return view('langganan');
    }
    public function kontak()
    {
        return view('kontak');
    }
    public function login()
    {
        return view('login');
    }
}
