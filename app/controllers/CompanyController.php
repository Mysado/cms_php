<?php

namespace App\Controllers;
use App\Core\App;
use App\Core\Company;
use App\Core\User;
class CompanyController
{
	public function company()
	{
		$firmy = Helper::getCompanies();
		return view('company', compact('firmy'));
	}
	public function addCompany()
	{
		$sellers = Helper::getSellers();
		return view('addCompany', compact('sellers'));
	}
	public function editCompany()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			$id = $_POST['id'];
		}
		$firma = Helper::getCompany($id);
		$sellers = Helper::getSellers();
		return view('editCompany', compact(['firma', 'sellers']));
	}
	public function validateData($adding)
	{
		$errors = [];
		if (Helper::anyIsNull([$_POST['name'], $_POST['street'], $_POST['city'], $_POST['zip_code'], $_POST['country'], $_POST['nip'], $_POST['email']])) {
            $errors[] = 'Fill all fields marker with *';
        }
        if ($adding) {
        	$firma = Helper::getCompany($_POST['nip'], 'nip');
        	if ($firma != null) {
        		$errors[] = 'Company already exists';
        	}
        }
        if (count($errors) == 0) {
			if (strlen($_POST['name']) > 99) {
	            $errors[] = 'Name is too long';
			}
			if (strlen($_POST['street']) > 60) {
				$errors[] = 'Street is too long';
			}
			if (strlen($_POST['city']) > 30) {
				$errors[] = 'City is too long';
			}
			if (strlen($_POST['zip_code']) > 12) {
				$errors[] = 'Zip code is too long';
			}
			if (strlen($_POST['country']) > 100) {
				$errors[] = 'Country is too long';
			}
			if (strlen($_POST['nip']) > 16) {
				$errors[] = 'NIP is too long';
			}
			if (strlen($_POST['email']) > 254) {
				$errors[] = 'Email is too long';
			}
			if (!Helper::validateEmail($_POST['email'])) {
				$errors[] = 'Enter Valid email';
			}
			if (!Helper::validateZip($_POST['zip_code'])) {
				$errors[] = 'Enter Valid Zip';
			}
			if (!Helper::validateNip($_POST['nip'])) {
				$errors[] = 'Enter Valid nip number';	
			}
		}

		return $errors;
	}
	public function validateAdd()
	{
		$errors = $this->validateData(true);
		if (count($errors) > 0) {
			$sellers = Helper::getSellers();
			return view('addCompany',compact(['errors', 'sellers']));
		}
		$name = html_entity_decode($_POST['name']);
		$street = html_entity_decode($_POST['street']);
		$city = html_entity_decode($_POST['city']);
		$zip_code = html_entity_decode($_POST['zip_code']);
		$country = html_entity_decode($_POST['country']);
		$nip = html_entity_decode($_POST['nip']);
		$email = html_entity_decode($_POST['email']);

        App::get('database')->insert('companies', ['name'=> $name, 'street' => $street, 'city' => $city, 'zip_code' => $zip_code, 'country' => $country, 'nip'=> $nip, 'email' => $email, 'creation_date' => date("Y-m-d"), 'seller_id' => $_POST['seller_id']]);
        return redirect('company');
                
        
	}
	public function validateEdit()
	{
		$errors =$this->validateData(false);
		if (count($errors) > 0) {
			$firma = Helper::getCompany($_POST['id']);
			$sellers = Helper::getSellers();
			return view('editCompany', compact(['errors', 'firma', 'sellers']));
		}

		$name = html_entity_decode($_POST['name']);
		$street = html_entity_decode($_POST['street']);
		$city = html_entity_decode($_POST['city']);
		$zip_code = html_entity_decode($_POST['zip_code']);
		$country = html_entity_decode($_POST['country']);
		$nip = html_entity_decode($_POST['nip']);
		$email = html_entity_decode($_POST['email']);
		
        App::get('database')->update('companies', 'id', $_POST['id'], ['name' => $name, 'street' => $street, 'city' => $city, 'zip_code' => $zip_code, 'country' => $country, 'nip' => $nip, 'email' => $email, 'seller_id' => $_POST['seller_id'] ]);

        return redirect('company');
	}

	public function deleteCompany()
	{
		foreach ($_POST['id'] as $id) {
			App::get('database')->delete('companies', 'id', $id);
		}
		return redirect('company');
	}
    
}