<?php

namespace App\Controllers;
use App\Core\App;
use App\Core\Company;
use App\Core\User;
use App\Core\Photo;
class FilesController
{
	public function deletePhoto()
	{
		foreach ($_POST['id'] as $id) {
			$photo = Helper::getPhoto($id);
			unlink($photo->path);
			App::get('database')->delete('photos', 'id', $id);
		}
		return redirect('photos');
	}

	public function photos()
	{
		$photos = Helper::getPhotos();
        return view('photos', compact('photos'));
	}

	public function uploadPhoto()
	{
		$file = Helper::upload($_FILES["fileToUpload"]);
		if ($file != null) {
			$name = html_entity_decode($_POST['name']);
			App::get('database')->insert('photos', ['name' => $name, 'seller_id' => apc_fetch(session_id())['id'], 'path' => $file, 'type' => strtolower(pathinfo($file,PATHINFO_EXTENSION)), 'upload' => date("Y-m-d")]);
		        return redirect('photos');
		}
	}
}