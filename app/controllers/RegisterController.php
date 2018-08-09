<?php

namespace App\Controllers;
use App\Core\App;

class RegisterController
{

    public function store()
    {
        $pass = hash('sha512', $_POST['password']);
        $email = html_entity_decode($_POST['email']);
        App::get('database')->insert('users', ['email' => $email, 'password' => $pass]);

        return redirect('login');
    }
    public function validate()
    {
        $errors =[];

        if ($_POST['email'] == null) {
            $errors[] = 'empty email';
            return view('register', compact('errors'));
        } elseif (strlen($_POST['email']) > 254) {
            $errors[] = 'email is too long';
            return view('register', compact('errors'));
        }

        if (!Helper::validateEmail($_POST['email'])) {
            $errors[] = 'wong email';
            return view('register', compact('errors'));
        }

        if (count($_POST['password']) > 32 ) {
            $errors[] = 'password is too long';
            return view('register', compact('errors'));
        }
        
        $user = App::get('database')->selectWhere('users', 'email', $_POST['email'], 'email');
        if ($user == null) {
            if ($_POST['password'] == $_POST['confirm']) {
                $uppercase = preg_match('@[A-Z]@', $_POST['password']);
                $lowercase = preg_match('@[a-z]@', $_POST['password']);
                $number    = preg_match('@[0-9]@', $_POST['password']);
                if ($uppercase && $lowercase && $number && strlen($_POST['password']) > 7) {
                    $this->store();
                } else {
                    $errors[] = 'you are too weak';
                }
            } else {
                $errors[] = 'passwords dont match';
            }
        } else {
            $errors[] = 'user already exists';
        }

        if ($errors != null) {
            return view('register', compact('errors'));
        }

    }

}