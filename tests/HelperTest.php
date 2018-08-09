<?php

use App\Controllers\Helper;
use App\Core\App;
use App\Core\Company;
use App\Core\User;
use App\Core\Contact;
use App\Core\Photo;
use App\Core\Question;
use App\Core\QuestionCategory;
use App\Core\Answer;
require "./core/bootstrap.php";
class HelperTest extends PHPUnit_Framework_TestCase {
 
    public function testGetContacts()
    {
    	$contacts = Helper::getContacts();
    	foreach ($contacts as $contact) {
    		$this->assertInstanceOf(Contact::class, $contact);
    		$this->assertInstanceOf(User::class, $contact->seller);
    		$this->assertInstanceOf(Company::class, $contact->company);
    	}
    }

    public function testGetCompanies()
    {
    	$companies = Helper::getCompanies();
    	foreach ($companies as $company) {
    		$this->assertInstanceOf(Company::class, $company);
    		$this->assertInstanceOf(User::class, $company->seller);
    	}
    }

    public function testGetSellers()
    {
    	$sellers = Helper::getSellers();
    	foreach ($sellers as $seller) {
    		$this->assertInstanceOf(User::class, $seller);
    	}
    }

    public function testGetPhotos()
    {
    	$photos = Helper::getPhotos();
    	foreach ($photos as $photo) {
    		$this->assertInstanceOf(Photo::class, $photo);
    		$this->assertInstanceOf(User::class, $photo->seller);
    	}
    }

    public function testGetQuestions()
    {
    	$questions = Helper::getQuestions();
    	foreach ($questions as $question) {
    		$this->assertInstanceOf(Question::class, $question);
    	}
    }

    public function testGetCategories()
    {
    	$categories = Helper::getCategories();
    	foreach ($categories as $categorie) {
    		$this->assertInstanceOf(QuestionCategory::class, $categorie);
    	}
    }

    public function testGetQuestion()
    {
    	$question = Helper::getQuestion('12');
    	$this->assertInstanceOf(Question::class, $question);
    }

    public function testGetAnswers()
    {
    	$answers = Helper::getAnswers('63');
    	foreach ($answers as $answer) {
    		$this->assertInstanceOf(Answer::class, $answer);
    	}
    }

    public function testGetContact()
    {
    	$contact = Helper::getContact('1');
		$this->assertInstanceOf(Contact::class, $contact);
		$this->assertInstanceOf(User::class, $contact->seller);
		$this->assertInstanceOf(Company::class, $contact->company);
    }

    public function testGetCompany()
    {
    	$company = Helper::getCompany('1');
		$this->assertInstanceOf(Company::class, $company);
    }

    public function testGetPhoto()
    {
    	$photo = Helper::getPhoto('3');
		$this->assertInstanceOf(Photo::class, $photo);
    }

    public function testGetSeller()
    {
    	$seller = Helper::getSeller('3');
		$this->assertInstanceOf(User::class, $seller);
    }

    public function testValidateEmail()
    {
    	$validate = Helper::validateEmail('nuta567@gmail.com');
    	$this->assertInternalType('bool', $validate);
    	$this->assertTrue($validate);
		$validate = Helper::validateEmail('nuta56');
		$this->assertInternalType('bool', $validate);
    	$this->assertFalse($validate);

    }

    public function testValidatePhone()
    {
    	$validate = Helper::validatePhone('123456789011');
    	$this->assertInternalType('bool', $validate);
    	$this->assertTrue($validate);
    	$validate = Helper::validatePhone('dsfg3r3esfd2');
    	$this->assertInternalType('bool', $validate);
    	$this->assertFalse($validate);
    }

    public function testValidateZip()
    {
    	$validate = Helper::validateZip('33-100');
    	$this->assertInternalType('bool', $validate);
    	$this->assertTrue($validate);
    	$validate = Helper::validateZip('sdgsd');
    	$this->assertInternalType('bool', $validate);
    	$this->assertFalse($validate);
    }

    public function testValidateNip()
    {
    	$validate = Helper::validateNip('1234567890');
    	$this->assertInternalType('bool', $validate);
    	$this->assertTrue($validate);
    	$validate = Helper::validateNip('fdghfser');
    	$this->assertInternalType('bool', $validate);
    	$this->assertFalse($validate);
    }

    public function testValidateNumber()
    {
    	$validate = Helper::validateNumber('1224235123');
    	$this->assertInternalType('bool', $validate);
    	$this->assertTrue($validate);
    	$validate = Helper::validateNumber('sdfas3');
    	$this->assertInternalType('bool', $validate);
    	$this->assertFalse($validate);
    }

    public function testAnyIsNull()
    {
    	$validate = Helper::anyIsNull(['sdgf', 'sdf', 'sdgf']);
    	$this->assertInternalType('bool', $validate);
    	$this->assertFalse($validate);
    	$validate = Helper::anyIsNull(['', 'sdf', '']);
    	$this->assertInternalType('bool', $validate);
    	$this->assertTrue($validate);
    }

 
}