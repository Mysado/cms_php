<?php

namespace App\Controllers;
use App\Core\App;

class RecoveryController
{
	public function recover()
	{
		$pass = App::get('database')->selectWhere('users', 'password, id, role', $_POST['email'], 'email');
		if ($pass == null) {
			$errors[] = 'email dont exist';
            return view('recover', compact('errors'));
		}
		$new_pass = hash('sha512', $_POST['email']);
		$subject = 'Reseting password';
		$message = "new password is: {$_POST['email']}";
		$headers = 'From: noreply@company.com';
		if (mail($_POST['email'], $subject, $message, $headers)) {
			App::get('database')->update('users', 'id', $pass[0]->id, ['password' => $new_pass]);
		}
		return view('recover');
	}
}