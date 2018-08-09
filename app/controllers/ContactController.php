<?php

namespace App\Controllers;
use App\Core\App;
use App\Core\Company;
use App\Core\User;
use App\Core\Contact;
class ContactController
{
	public function contacts()
	{
		$contacts = Helper::getContacts();
		return view('contacts', compact('contacts'));
	}
	public function addContact()
	{
		$sellers = Helper::getSellers();
		$companies = Helper::getCompanies();
		return view('addContact', compact(['sellers', 'companies']));
	}
	public function editcontact()
	{
		$contact = Helper::getContact($_GET['id']);
		$sellers = Helper::getSellers();
		$companies = Helper::getCompanies();
		return view('editContact', compact(['contact', 'sellers', 'companies']));
	}
	public function validateData()
	{
		$errors = [];

		if (Helper::anyIsNull([$_POST['name'], $_POST['surname'], $_POST['phone'], $_POST['email']]) || !isset($_POST['data_agreement'])) {
            $errors[] = 'Fill fields marked with *';
		}

		if (count($errors) == 0) {
            if (strlen($_POST['name']) > 30) {
				$errors[] = 'Name is too long';
            }
			if (strlen($_POST['surname']) > 50) {
				$errors[] = 'Surname is too long';
			}
			if (strlen($_POST['position']) > 50) {
				$errors[] = 'Position is too long';
			}
			if (strlen($_POST['phone']) > 15) {
				$errors[] = 'Phone is too long';
			}
			if (strlen($_POST['email']) > 254) {
				$errors[] = 'Email is too long';
			}
			if (!Helper::validateEmail($_POST['email'])) {
				$errors[] = 'Enter Valid email';
			}
			if (!Helper::validatePhone($_POST['phone'])) {
				$errors[] = 'Enter Valid phone number';	
			}
			
		}
		return $errors;
	}
	public function validateAdd()
	{
		$errors = $this->validateData();
        $name = html_entity_decode($_POST['name']);
		$surname = html_entity_decode($_POST['surname']);
		$position = html_entity_decode($_POST['position']);
		$phone = html_entity_decode($_POST['phone']);
		$email = html_entity_decode($_POST['email']);
		$file = Helper::upload($_FILES["fileToUpload"]);
		if (!isset($_POST['marketing_agreement'])) {
			$market = '0';
		} else {
			$market = '1';
		}

		if (count($errors) > 0) {
			$sellers = Helper::getSellers();
			$companies = Helper::getCompanies();
			return view('addContact', compact(['errors', 'sellers', 'companies']));
		}

		App::get('database')->insert('clients', ['name' => $name, 'surname' => $surname, 'position' => $position, 'phone' => $phone, 'email' => $email, 'data_agreement' => $_POST['data_agreement'], 'marketing_agreement' => $market, 'company_id' => $_POST['company_id'], 'seller_id' => $_POST['seller_id'], 'register_date' => date("Y-m-d"), 'photo'=>$file]);

        return redirect('contacts');
                
        
	}
	public function validateEdit()
	{
		$errors =$this->validateData();
		$name = html_entity_decode($_POST['name']);
		$surname = html_entity_decode($_POST['surname']);
		$position = html_entity_decode($_POST['position']);
		$phone = html_entity_decode($_POST['phone']);
		$email = html_entity_decode($_POST['email']);
        $contact = Helper::getContact($_POST['id']);

		if (count($errors) > 0) {
			$contact = Helper::getContact($_POST['id']);
			$sellers = Helper::getSellers();
			$companies = Helper::getCompanies();
			return view('editContact', compact(['errors', 'contact', 'sellers', 'companies']));
		}

		if (!isset($_POST['marketing_agreement'])) {
			$market = '0';
		} else {
			$market = '1';
		}

		$this->deletePhoto();

		$file = Helper::upload($_FILES["fileToUpload"]);
		App::get('database')->update('clients', 'id', $_POST['id'], ['name' => $name, 'surname' => $postname, 'position' => $position, 'phone' => $phone, 'email' => $email, 'data_agreement' => $_POST['data_agreement'], 'marketing_agreement' => $market, 'company_id' => $_POST['company_id'], 'seller_id' => $_POST['seller_id'], 'photo' => $file]);

        return redirect('contacts');
	}

	public function deleteContact()
	{
		foreach ($_POST['id'] as $id) {
			$photo = Helper::getPhoto($id);
			if($photo != null)
				unlink($photo->photo);
			App::get('database')->delete('clients', 'id', $id);
		}
		return redirect('contacts');
	}
	public function deletePhoto()
	{
		$photo = Helper::getPhoto($_POST['id']);
		unlink($photo->photo);
		App::get('database')->update('clients', 'id', $_POST['id'], ['photo' => " "]);
	}
}