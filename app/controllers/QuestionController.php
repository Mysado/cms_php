<?php

namespace App\Controllers;
use App\Core\App;
use App\Core\Company;
use App\Core\User;
use App\Core\QuestionCategory;
use App\Core\Question;
use App\Core\Answer;


class QuestionController
{
	public function questionary()
	{
		$questions = App::get('database')->selectAll('questions order by kolejnosc', Question::class);
		foreach ($questions as $question) {
			$question->answers = Helper::getAnswers($question->id);
		}
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$client = Helper::getContact($id);
			return view('questionary',compact(['questions', 'id', 'client']));
		}
		return view('questionary', compact('questions'));

	}
	public function questions()
	{
		$questions = Helper::getQuestions();

		return view('questions', compact('questions'));
	}
	public function editQuestion()
	{
		$categories = Helper::getCategories();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			$id = $_POST['id'];
		}
		$answers = Helper::getAnswers($id);
		$increments = count($answers);
		if (isset($_GET['increments'])) {
			$increments = $_GET['increments'];
		}
		$question = Helper::getQuestion($id);
		return view('editQuestion', compact(['increments', 'categories', 'id', 'answers', 'question']));
	}

	public function addQuestion()
	{
		$increments = 4;
		$categories = Helper::getCategories();

		if (isset($_GET['increments'])) {
			$increments = $_GET['increments'];
		}


		return view('addQuestion', compact(['increments', 'categories']));
	}

		public function validateData()
	{
		$errors = [];

		if (Helper::anyIsNull([$_POST['question'], $_POST['question_category'], $_POST['kolejnosc'], $_POST['status']])) {
            $errors[] = 'Fill all fields';
        }
        if (count($errors) == 0) {
			if (strlen($_POST['question']) > 100) {
	            $errors[] = 'Name is too long';
			}
			if (strlen($_POST['kolejnosc']) > 11) {
				$errors[] = 'kolejnosc is too long';
			}
			if (strlen($_POST['status']) > 11) {
				$errors[] = 'status is too long';
			}
			if (!Helper::validateNumber($_POST['status'])) {
				$errors[] = 'Enter Valid status number';
			}
			if (!Helper::validateNumber($_POST['kolejnosc'])) {
				$errors[] = 'Enter Valid kolejnosc number';
			}
			foreach ($_POST['answer'] as $answer) {
			if($answer == null)
				$errors[] = "Fill all answers";
			if(strlen($answer) > 200)
            	$errors[] = 'Answer is too long';
			}
		}

		return $errors;
	}
	public function validateAdd()
	{
		$errors = $this->validateData();
        $question = html_entity_decode($_POST['question']);
		$kolejnosc = html_entity_decode($_POST['kolejnosc']);
		$status = html_entity_decode($_POST['status']);

		if (count($errors) > 0) {
			$increments = 4;
			$categories = Helper::getCategories();

			if (isset($_GET['increments'])) {
				$increments = $_GET['increments'];
			}
			
			return view('addQuestion', compact(['errors', 'increments', 'categories']));
		}
		
		App::get('database')->insert('questions', ['content' => $question, 'category_id' => $_POST['question_category'], 'kolejnosc' => $kolejnosc, 'status' => $status]);

		$id = App::get('database')->lastID();

		foreach ($_POST['answer'] as $answer) {
			$answer = html_entity_decode($answer);
			App::get('database')->insert('answers', ['question_id' => $id[0], 'type' => $_POST['type'], 'content' => $answer]);
		}
		return redirect('questions');
	}
	public function validateEdit()
	{
		$errors = $this->validateData();
        $question = html_entity_decode($_POST['question']);
		$kolejnosc = html_entity_decode($_POST['kolejnosc']);
		$status = html_entity_decode($_POST['status']);

		if (count($errors) > 0) {
			$increments = 4;
			$categories = Helper::getCategories();

			if (isset($_GET['increments'])) {
				$increments = $_GET['increments'];
			}
			
			return view('addQuestion', compact(['errors', 'increments', 'categories']));
		}

		App::get('database')->update('questions', 'id', $_POST['id'], ['content' => $question, 'category_id' => $_POST['question_category'], 'kolejnosc' => $kolejnosc, 'status' => $status]);

		App::get('database')->delete('answers', 'question_id', $_POST['id']);
		
		foreach ($_POST['answer'] as $answer) {
			$answer = html_entity_decode($answer);
			App::get('database')->insert('answers', ['question_id' => $_POST['id'], 'type' => $_POST['type'], 'content' => $answer]);
		}
		return redirect('questions');
	}
	public function deleteQuestion()
	{
		foreach ($_POST['id'] as $id) {
			App::get('database')->delete('questions', 'id', $id);
		}
		return redirect('questions');
	}
    public function answerQuestion()
    {
    	foreach ($_POST['answer'] as $key => $answers) {
    		foreach ($answers as $answer) {
    			if ($answer == null || $answer == '') {
    				$id = $_POST['id'];
    				$questions = App::get('database')->selectAll('questions order by kolejnosc', Question::class);
					foreach ($questions as $question) {
						$question->answers = Helper::getAnswers($question->id);
					}
    				$client = Helper::getContact($id);
    				$errors[] = 'fill all answers';
					return view('questionary', compact(['questions', 'id', 'client', 'errors']));
    			}
    		}
    	}
		foreach ($_POST['answer'] as $questionkey => $answers) {
			foreach ($answers as $answerkey => $answer) {
				$answer = explode('/', $answer);
				if (isset($answer[1])) {
					$answerkey = $answer[1];
				}
				$answer[0] = html_entity_decode($answer[0]);
				App::get('database')->insert('clients_answers', ['client_id' => $_POST['id'], 'question_id' => $questionkey, 'answer_id' => $answerkey, 'answer_content' => $answer[0]]);
				$contacts = Helper::getContacts();
				return view('contacts', compact('contacts'));
			}
		}

    	
    }
}