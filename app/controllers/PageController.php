<?php

namespace App\Controllers;


class PageController
{

    public function home()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function recovery()
    {
        return view('recover');
    }

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard');

    }
    
    public function addCompany()
    {
        return view('addCompany');
    }

}