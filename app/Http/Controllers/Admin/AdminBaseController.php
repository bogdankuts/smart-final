<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminBaseController extends Controller {
	/**
	 * Default message for unknown error
	 *
	 * @var string
	 */
	protected $unknownErrorMessage = 'Что-то пошло не так, попробуйте снова';


	/**
	 * Return redirect back with error message if error in unknown
	 *
	 * @param string $message
	 *
	 * @return $this
	 */
	protected function redirectWithError($message = '') {
		if($message !== '') {
			$this->unknownErrorMessage = $message;
		}

		flash($this->unknownErrorMessage, 'danger');

		return redirect()->back()->withInput();
	}

    public function __construct(Admin $admin) {
	    \App::setLocale('ru');
		//TODO::maybe uncomment that
		//$admin->updateLastVisit();
    }

	/**
	 * Flash correct message depending on action
	 *
	 * @param array $messages
	 */
	protected function handleMessages($messages) {
		if (array_key_exists('success', $messages)) {
			if (count($messages['success']) == 1) {
				flash('Версия для языка '.$messages['success'][0].' успешно добавлена, но версия для языка '.$messages['fail'][0].' не добавлена');
			} else {
				flash('Версии для языков '.$messages['success'][0].' и '.$messages['success'][1].' успешно добавлены', 'success');
			}
		} else {
			flash('Версии для языков '.$messages['fail'][0].' и '.$messages['fail'][1].' не добавлены, так как остутвует файл или имя', 'danger');
		}
	}

	/**
	 * Flash correct message depending on action
	 *
	 * @param array $messages
	 */
	protected function handleMessagesUpdate($messages) {
		if (array_key_exists('success', $messages)) {
			if (count($messages['success']) == 1) {
				flash('Версия для языка '.$messages['success'][0].' успешно обновлена, но версия для языка '.$messages['fail'][0].' не обновлена');
			} else {
				flash('Версии для языков '.$messages['success'][0].' и '.$messages['success'][1].' успешно обновлены', 'success');
			}
		} else {
			flash('Версии для языков '.$messages['fail'][0].' и '.$messages['fail'][1].' не обновлены, так как остутвует файл или имя', 'danger');
		}
	}

	/**
	 * Format time to be a carbon object
	 * @param string $time
	 *
	 * @return Carbon
	 */
	protected function time($time) {

		return Carbon::createFromFormat('d.m.Y H:i', $time);
	}


}
