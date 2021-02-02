<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kasusController extends Controller
{
    public function index()
    {
        return "<h1> Ini Halaman Kasus ? </h1>";
    }
    public function create()
    {
        // Method untuk menampilkan from create post
    }
    public function store()
    {
       // Method untuk menampilkan insert / input data dalam database
    }
    public function show()
    {
        // Method untuk menampilkan single post / detail dari sebuah post
    }
    public function edit()
    {
        // Method untuk menampilkan halaman edit post 
    }
    public function update()
    {
        // Method untuk melakukan update data post ke database
    }
    public function destory()
    {
        // Method untuk menghapus data post
    }
    
    
}
