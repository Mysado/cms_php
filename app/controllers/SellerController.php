<?php

namespace App\Controllers;
use App\Core\App;
use App\Core\Company;
use App\Core\User;
class SellerController
{
	
	public function sellers()
	{
		$sellers = Helper::getSellers();
		return view('sellers', compact('sellers'));
	}
	public function addSeller()
	{
		$sellers = Helper::getSellers();
		return view('addSeller', compact('sellers'));
	}
	public function editSeller()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			$id = $_POST['id'];
		}

		$seller = Helper::getSeller($id);
		return view('editSeller', compact('seller'));
	}
	public function validateData($adding)
	{
		$errors = [];
		if ($adding) {

			if (Helper::anyIsNull([$_POST['email'], $_POST['password'], $_POST['confirm']])) {
	            $errors[] = 'Fill fields with *';
			} else {
	        	$user = App::get('database')->selectWhere('users', 'email', $_POST['email'], 'email');
        		if ($user != null) {
        			$errors[] = 'seller already exists';
        		}
        		if (strlen($_POST['email']) > 254) {
        			$errors[] = 'email is too long';
        		}
				
	        }
	        
		} else {
			if (Helper::anyIsNull([$_POST['email'], $_POST['password'], $_POST['confirm'], $_POST['old_pass']])) {
	            $errors[] = 'Fill fields with *';
			}

	        if (strlen($_POST['email']) > 254) {
				$errors[] = 'Name is too long';
	        }

        	$pass = App::get('database')->selectWhere('users', 'password, id, role', $_POST['email'], 'email');
        	$post_pass = hash('sha512', $_POST['old_pass']);
        	$new_pass = hash('sha512', $_POST['password']);
            if ($pass[0]->password != $post_pass) {
            	$errors[] = 'Wrong Password';
            }
            if ($pass[0]->password == $new_pass) {
            	$errors[] = 'New password must be different';
            }
		}
		if (count($errors) == 0) {
			if ($_POST['password'] != $_POST['confirm']) {
	            $errors[] = 'Passwords dont match';
			} else {
	        	if (strlen($_POST['password']) > 32) {
	        		$errors[] = 'Password is too long';
	        	} else {
	        		$uppercase = preg_match('@[A-Z]@', $_POST['password']);
		            $lowercase = preg_match('@[a-z]@', $_POST['password']);
		            $number    = preg_match('@[0-9]@', $_POST['password']);
		            if (!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) {
		                $errors[] = 'you are too weak';
		            }
	        	}
	        }
            if (strlen($_POST['email']) > 254) {
				$errors[] = 'Email is too long';
            } elseif (!Helper::validateEmail($_POST['email'])) {
	            $errors[] = 'wong email';
	            return view('register',compact('errors'));
	        }
	        if (strlen($_POST['name']) > 30) {
				$errors[] = 'Name is too long';
	        }
			if (strlen($_POST['surname']) > 50) {
				$errors[] = 'Surname is too long';
			}
			if (strlen($_POST['phone']) > 30) {
				$errors[] = 'Phone is too long';
			}
		}
		return $errors;
	}
	public function validateAdd()
	{
		$errors =$this->validateData(true);
        

		if (count($errors) > 0) {
			return view('addSeller', compact('errors'));
		}

		$email = html_entity_decode($_POST['email']);
		$name = html_entity_decode($_POST['name']);
		$surname = html_entity_decode($_POST['surname']);
		$phone = html_entity_decode($_POST['phone']);



        $pass = hash('sha512', $_POST['password']);
        App::get('database')->insert('users', ['email' => $email, 'password' => $pass, 'name' => $name, 'surname' => $surname, 'phone' => $phone, 'register_date' => date("Y-m-d"), 'role' => $_POST['role']]);

        return redirect('sellers');
                
        
	}
	public function validateEdit()
	{
		$errors =$this->validateData(false);
        $seller = App::get('database')->selectWhere('users', '*', $_POST['id'], 'id', User::class);
		if (count($errors) > 0) {
			return view('editSeller',compact(['errors', 'seller']));
		}


		$email = html_entity_decode($_POST['email']);
		$name = html_entity_decode($_POST['name']);
		$surname = html_entity_decode($_POST['surname']);
		$phone = html_entity_decode($_POST['phone']);

		$pass = hash('sha512', $_POST['password']);
		App::get('database')->update('users', 'id', $_POST['id'], ['email' => $email, 'password' => $pass, 'name' => $name, 'surname' => $surname, 'phone' => $phone, 'role' => $_POST['role']]);
 

        return redirect('sellers');
                
        
	}

	public function deleteSeller()
	{
		$logout = false;
		foreach ($_POST['id'] as $id) {
			if (apc_fetch(session_id())['id'] == $id) {
				$logout = true;
			}
			App::get('database')->delete('users', 'id', $id);
		}
		if ($logout) {
			
	        apc_clear_cache();
	        session_regenerate_id(true);
	        $_SESSION = array(); 
	        session_destroy();
	        return view('login', compact('errors'));
		}
		return redirect('sellers');
	}
    
}