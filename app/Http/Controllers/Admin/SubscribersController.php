<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class SubscribersController extends Controller {

	public function index() {

		return view('admin.subscribers.subscribers')->with([
			'subscribers' => Subscriber::orderBy('created_at', 'desc')->get()
		]);

	}

	public function load() {
		$subscribers = Subscriber::all()->toArray();
		Excel::create('Subscribers from '.Carbon::now()->toDateTimeString(), function($excel) use($subscribers) {

			$excel->sheet('Subscribers', function($sheet) use($subscribers) {

				$sheet->fromArray($subscribers);

			});

		})->download('csv');;
	}

	public function loadXls() {
		$subscribers = Subscriber::all()->toArray();
		Excel::create('Subscribers from '.Carbon::now()->toDateTimeString(), function($excel) use($subscribers) {

			$excel->sheet('Subscribers', function($sheet) use($subscribers) {

				$sheet->fromArray($subscribers);

			});

		})->download('xlsx');;
	}

	public function delete(Subscriber $subscriber) {
		$subscriber->delete();

		return redirect()->back();
	}
}
