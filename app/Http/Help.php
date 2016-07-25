<?php
/**
 * Created by PhpStorm.
 * User: BogdanKootz
 * Date: 13.07.16
 * Time: 10:22
 */

namespace App\Http;


use App\Http\Requests\Request;

class Help {

	public static function createOptions($array, $key, $value) {
		$options = [];

		foreach ($array as $element) {
			$options[$element->$key] = $element->$value;
		}

		return $options;
	}
}