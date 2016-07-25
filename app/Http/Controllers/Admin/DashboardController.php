<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends AdminBaseController {

	public function dashboard() {

		return view('admin.dashboard')->with([
			'env' => 'dashboard',
		]);
	}
}
