<?php
namespace App\Core;
use App\Core\QuestionCategory;
use App\Core\Answer;

class Question
{
	public $id, $content, $category_id, $kolejnosc, $status;
	public $answers;
	public $category;
}

