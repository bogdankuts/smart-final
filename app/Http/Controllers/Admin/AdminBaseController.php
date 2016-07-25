<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
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
		$admin->updateLastVisit();
    }
}
