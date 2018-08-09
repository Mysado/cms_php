<?php

namespace App\Controllers;
use App\Core\App;
class PasswordController
{
	public function changePass()
	{
		$pass = App::get('database')->selectWhere('users', 'password, id, role', apc_fetch(session_id())['id'], 'id');
		if ($_POST['new_pass'] == $_POST['confirm']) {
			$new_pass = hash('sha512', $_POST['new_pass']);
			$uppercase = preg_match('@[A-Z]@', $_POST['new_pass']);
            $lowercase = preg_match('@[a-z]@', $_POST['new_pass']);
            $number    = preg_match('@[0-9]@', $_POST['new_pass']);
            if ($uppercase && $lowercase && $number && strlen($_POST['new_pass']) > 7) {
                $new_pass = hash('sha512', $_POST['new_pass']);
		        App::get('database')->update('users', 'id', $pass[0]->id, 'password', $new_pass);
		        if ($pass[0]->role == 'admin') {
		        	return redirect('dashboardAdmin');
		        } else {
		        	return redirect('dashboardSeller'); 
		        }
            } else {
                $errors[] = 'you are too weak';
                return view('dashboardAdmin', compact('errors'));
            }


        } else {
            $errors[] = 'passwords dont match';
            return view('dashboardAdmin', compact('errors'));
        }
		
	}
    
}