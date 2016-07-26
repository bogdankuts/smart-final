<?php

namespace App\Http\Controllers\Admin;

use App\Admin;

use App\Http\Requests;
use App\Http\Requests\AdminRequest;

class AdminsController extends AdminBaseController {

	public function index() {

		return view('admin.admins.admins')->with([
			'admins'    => Admin::all(),
		]);
	}

	public function show(Admin $admin) {

		return view('admin.admins.admin')->with([
			'admin'     => $admin,
			'articles'  => $admin->articles,
			'positions' => $admin->positions,
			'profiles'  => $admin->profiles,
		]);
	}

	public function create() {

		return view('.admin.admins.create')->with([
		    'submitButton'  => 'Добавить'
		]);
	}

	public function store(AdminRequest $request) {
		$data = $this->prepareAdminData($request);

		if ($this->adminEmailIsValid($data['email'])) {
			Admin::create($data);
			flash('Новый админ успешно зарегестрирован', 'success');

			return redirect()->back();
		} else {

			return redirect()->back()
				->withInput()
				->withErrors(['email' => 'Пользователь с таким email уже существет!']);
		}
	}

	public function edit(Admin $admin) {

		return view('admin.admins.update')->with([
		    'admin'         => $admin,
		    'submitButton'  => 'Изменить'
		]);
	}

	public function update(AdminRequest $request, Admin $admin) {
		$data = $this->prepareAdminData($request);

		if ($this->adminEmailIsValidForUpdate($data['email'], $admin->email)) {
			$admin->update($data);
			flash('Админ успешно изменен', 'success');

			return redirect()->back();
		} else {

			return redirect()->back()
				->withInput()
				->withErrors(['email' => 'Пользователь с таким email уже существет!']);
		}
	}

	public function delete(Admin $admin) {
		if ($admin->id !== 1) {
			$admin->deleteAdmin();
			flash('Админ успешно удален', 'success');
		} else {
			flash('Админ по умолчанию не может быть удален', 'danger');
		}

		return redirect()->route('admins');
	}

	/**
	 * Validate if email is valid for create from
	 *
	 * @param string $email
	 *
	 * @return bool
	 */
	private function adminEmailIsValid($email) {
		$adminsEmails = Admin::all()->pluck('email')->toArray();
		if(in_array($email, $adminsEmails)) {

			return false;
		}

		return true;

	}

	/**
	 * Validate if email is valid for update form
	 *
	 * @param string $email
	 * @param string $old_email
	 *
	 * @return bool
	 */
	private function adminEmailIsValidForUpdate($email, $old_email) {
		$adminsEmails = Admin::all()->pluck('email')->toArray();
		if(in_array($email, $adminsEmails) && $email != $old_email) {

			return false;
		}

		return true;

	}

	/**
	 * Prepare admin data for DB
	 *
	 * @param AdminRequest $request
	 *
	 * @return array
	 */
	private function prepareAdminData($request) {
		$data = $request->all();

		$data['password'] = bcrypt($data['password']);
		unset($data['password_confirmation']);
		if(!array_key_exists('master', $data)) {
			$data['master'] = 0;
		}

		return $data;
	}
}
