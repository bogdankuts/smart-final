<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminBaseModel extends Model {

	/**
	 * Update or Create content in DB and save files
	 *
	 * @param        $instance
	 * @param array  $data
	 * @param string $keyName
	 * @param string $mainField
	 * @param string $fileDir
	 *
	 * @return array
	 */
	public function updateOrCreateInstance($instance, $data, $keyName, $mainField, $fileDir) {
		$messages = [];

		foreach (['ua', 'ru'] as $lang_code) {
			$dataToStore = [];
			foreach ($this->fields as $field) {
				if (array_key_exists($field, $data)) {
					if (array_key_exists($lang_code, $data[$field])) {
						$dataToStore[$field] = $data[$field][$lang_code];
					}
				}
				$dataToStore[$keyName] = $instance->$keyName;
			}
			if ($instance instanceof Article) {
				$dataToStore = $this->processArticleData($dataToStore);
			} else {
				$dataToStore = $this->processData($dataToStore, $mainField, $fileDir);
			}

			if ($dataToStore != []) {
				$this->updateOrCreate($instance, $dataToStore);

				$messages['success'][] = $lang_code;
			} else {

				$messages['fail'][] = $lang_code;
			}
		}
		return $messages;

	}

	/**
	 * Update or create instance
	 *
	 * @param       $instance
	 * @param array $data
	 *
	 * @internal param Profile $profile
	 */
	private function updateOrCreate($instance, $data) {
		$content = $instance->content->where('lang_id', intval($data['lang_id']))->first();
		if (!is_null($content)) {

			$content->update($data);
		} else {

			$this->create($data);
		}
	}

	/**
	 * Process data - checks validity, saves files
	 *
	 * @param array  $data
	 * @param string $fieldToCheck
	 * @param string $fileDir
	 * @return array
	 */
	//TODO::refactoring needed, but i'm not sure if it is mandatory
	private function processData($data, $fieldToCheck, $fileDir) {
		if ($data[$fieldToCheck] === '') {

			return $data = [];
		}

		if (array_key_exists('file', $data)) {
			if (is_null($data['file'])) {

				return $data = [];
			} else {
				$data['file'] = File::store($data['file'], $fileDir);
			}
		}

		if ($data['meta_title'] === '') {
			$data['meta_title'] = $data[$fieldToCheck];
		}

		if ($data['meta_description'] === '') {
			$data['meta_description'] = $data['description'];
		}

		return $data;
	}


	/**
	 * Process Article specific data
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	private function processArticleData($data) {
		if ($data['title'] === '') {

			return $data = [];
		}

		if ($data['body'] === '') {

			return $data = [];
		}

		if ($data['preview_text'] === '') {

			return $data = [];
		}

		if ($data['meta_title'] === '') {
			$data['meta_title'] = $data['title'];
		}

		if ($data['meta_description'] === '') {
			$data['meta_description'] = $data['preview_text'];
		}

		return $data;

	}

	/**
	 * Return language of the instance
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function language() {

		return $this->hasOne('App\Language', 'lang_id', 'lang_id');
	}
}
