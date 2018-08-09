<?php

namespace App\Controllers;
use App\Core\App;
use App\Core\Company;
use App\Core\User;
use App\Core\Contact;
use App\Core\Photo;
use App\Core\Question;
use App\Core\QuestionCategory;
use App\Core\Answer;
class Helper
{
    public static function getContacts()
    {
        $contacts = App::get('database')->selectAll('clients', Contact::class);
        foreach ($contacts as $contact) {
            $contact->seller = Helper::getSeller($contact->seller_id);
            $contact->company = Helper::getCompany($contact->company_id);
        }
        return $contacts;
    }

    public static function getCompanies()
    {
        $firmy = App::get('database')->selectAll('companies', Company::class);
        foreach ($firmy as $firma) {
            $firma->seller = Helper::getSeller($firma->seller_id);
        }
        return $firmy;
    }

    public static function getSellers()
    {
        $seller = App::get('database')->selectAll('users', User::class);
        return $seller;
    }

    public static function getPhotos()
    {
        $photos = App::get('database')->selectAll('photos', Photo::class);
        foreach ($photos as $photo) {
            $photo->seller = Helper::getSeller($photo->seller_id);
        }
        return $photos;
    }

    public static function getQuestions()
    {
        $questions = App::get('database')->selectAll('questions', Question::class);
        return $questions;  
    }

    public static function getCategories()
    {
        $categories = App::get('database')->selectAll('question_category', QuestionCategory::class);
        return $categories;
    }

    public static function getQuestion($where,$selectWhere = 'id')
    {
        $question = App::get('database')->selectWhere('questions', '*', $where, $selectWhere, Question::class); 
        if($question == null) {
            return null;
        }
        return $question[0];
    }

    public static function getAnswers($where,$selectWhere = 'id')
    {
        $answers = App::get('database')->selectWhere('answers', '*', $where, $selectWhere, Answer::class); 
        if($answers == null) {
            return null;
        }
        return $answers;
    }
    public static function getContact($where,$selectWhere = 'id')
    {
        $contact = App::get('database')->selectWhere('clients','*',$where, $selectWhere, Contact::class);
        if($contact == null) {
            return null;
        }
        $contact[0]->seller = Helper::getSeller($contact[0]->seller_id);
        $contact[0]->company = Helper::getCompany($contact[0]->company_id);
        return $contact[0];
    }
    public static function getCompany($where,$selectWhere = 'id')
    {
        $company = App::get('database')->selectWhere('companies', '*', $where, $selectWhere, Company::class);
        if($company == null) {
            return null;
        }
        return $company[0];
    }

    public static function getPhoto($where,$selectWhere = 'id')
    {
        $photo = App::get('database')->selectWhere('photos', '*', $where, $selectWhere, 
                Photo::class); 
        if($photo == null) {
            return null;
        }
        return $photo[0];
    }
    public static function getSeller($where,$selectWhere = 'id')
    {
        $seller = App::get('database')->selectWhere('users', '*', $where, $selectWhere, User::class); 
        if($seller == null) {
            return null;
        }
        return $seller[0];
    }

    public static function validateEmail($email)
    {
        $emailregex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        return (boolean)preg_match($emailregex, $email);
    }

    public static function validatePhone($phone)
    {
        $phoneregex = '/^[0-9\-\+]{9,15}$/';
        return (boolean)preg_match($phoneregex, $phone);
    }
    
    public static function validateZip($zip)
    {
        $zipregex = '/^\d{2}-\d{3}$/';
        return (boolean)preg_match($zipregex, $zip);
    }
    
    public static function validateNip($nip)
    {
        $nipregex = '/^[0-9]{10}$/';
        return (boolean)preg_match($nipregex, $nip);
    }

    public static function validateNumber($number)
    {
        $numberregex = '/^[0-9]{1,64}$/';
        return (boolean)preg_match($numberregex, $number);
    }
    
    public static function anyIsNull($values)
    {
        foreach ($values as $value) {
            if ($value == null){
                return true;
            }
        }
        return false;
    }
    public static function upload($file)
    {
        $target_dir = "files/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($file["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "The file ". basename($file["name"]). " has been uploaded.";
                return $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}