<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class File extends Model {

	/**
	 * Store file, in passed directory
	 *
	 * @param \File     $file
	 * @param string    $directory
	 *
	 * @return string
	 */
	public static function store($file, $directory) {
		if (!is_null($file)) {

			$fileName = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$newName = str_slug($fileName, '-').'-'.time().'.'.$extension;
			$file->move(public_path('/files/'.$directory), $newName);

			return $newName;
		} else {

			return '';
		}
	}

}
