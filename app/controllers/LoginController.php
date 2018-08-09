<?php

namespace App\Controllers;
use App\Core\App;
class LoginController
{

    public function validate()
    {
        apc_add([session_id() => ['role' => '1', 'id' => '13']]);
                    redirect('dashboard');
    
    }


    public function login()
    {
        return redirect('login');
    }
    public function logout()
    {
        apc_clear_cache();
        session_regenerate_id(true);
        $_SESSION = array(); 
        session_destroy();
        return redirect("login");
    }
}