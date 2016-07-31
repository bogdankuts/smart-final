<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileContent extends Model {
	protected $table = 'profiles_contents';
	public $timestamps = false;

	protected $fillable = ['meta_title', 'meta_description', 'meta_keywords', 'name', 'file', 'description', 'lang_id', 'profile_id'];

	/**
	 * Fields to check and store
	 * @var array
	 */
	protected $fields = ['meta_title', 'meta_description', 'meta_keywords', 'name', 'description', 'file', 'lang_id'];

	/**
	 * Return language of the profile content
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function language() {

		return $this->hasOne('App\Language', 'lang_id', 'lang_id');
	}

	/**
	 * Store content in DB and save files
	 *
	 * @param string $id
	 * @param array $data
	 *
	 * @return array
	 */
	public function store($id, $data) {
		$messages = [];

		foreach (['ua', 'ru'] as $lang_code) {
			foreach ($this->fields as $field) {
				$dataToStore[$field] = $data[$field][$lang_code];
				$dataToStore['profile_id'] = $id;
			}
			$dataToStore = $this->processData($dataToStore);
			if ($dataToStore != []) {
				$this->create($dataToStore);

				$messages['success'][] = $lang_code;
			} else {

				$messages['fail'][] = $lang_code;
			}
		}
		return $messages;
	}

	public function updateContent($id, $data) {
		$messages = [];

		foreach (['ua', 'ru'] as $lang_code) {
			$dataToStore = [];
			foreach ($this->fields as $field) {
				if (array_key_exists($field, $data)) {
					if (array_key_exists($lang_code, $data[$field])) {
						$dataToStore[$field] = $data[$field][$lang_code];
					}
				}
				$dataToStore['profile_id'] = $id;
			}
			$dataToStore = $this->processDataForUpload($dataToStore);

			if ($dataToStore != []) {
				$this->where('profile_id', $id)->updateOrCreate($dataToStore);

				$messages['success'][] = $lang_code;
			} else {

				$messages['fail'][] = $lang_code;
			}
		}
		return $messages;

	}

	/**
	 * Process data - checks validity, saves files
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	private function processData($data) {
		if ($data['name'] === '') {

			return $data = [];
		}
		if (is_null($data['file'])) {

			return $data = [];
		} else {
			$data['file'] = File::store($data['file'], 'profiles');
		}
		if ($data['meta_title'] === '') {
			$data['meta_title'] = $data->name;
		}
		if ($data['meta_description'] === '') {
			$data['meta_description'] = $data->description;
		}

		return $data;
	}

	/**
	 * Process data - checks validity, saves files
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	private function processDataForUpload($data) {
		if ($data['name'] === '') {

			return $data = [];
		}

		if (array_key_exists('file', $data)) {
			if (is_null($data['file'])) {

				return $data = [];
			} else {
				$data['file'] = File::store($data['file'], 'profiles');
			}
		}

		if ($data['meta_title'] === '') {
			$data['meta_title'] = $data['name'];
		}

		if ($data['meta_description'] === '') {
			$data['meta_description'] = $data['description'];
		}

		return $data;
	}
}
