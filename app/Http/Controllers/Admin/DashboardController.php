<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Article;
use App\Position;
use App\Profile;
use App\Report;
use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DashboardController extends AdminBaseController {

	public function dashboard(Admin $admin) {
		$lastVisit = Auth::user()->last_visit;
		$notifications = $this->getNotifications($lastVisit);
		$admin->updateLastVisit();

		return view('admin.dashboard')->with([
			'notifications' => $notifications,
		    'lastVisit'     => $lastVisit,
			'recentArticles' => Article::orderBy('created_at', 'desc')->take(5)->get(),
			'popularArticles' => Article::orderBy('views', 'desc')->take(5)->get(),
			'recentReports' => Report::orderBy('created_at', 'desc')->take(6)->get(),
			'recentSubscribers' => Subscriber::orderBy('created_at', 'desc')->take(6)->get(),
			'recentPositions' => Position::orderBy('created_at', 'desc')->take(5)->get(),
			'popularPositions' => Position::orderBy('views', 'desc')->take(5)->get(),
			'recentProfiles' => Profile::orderBy('created_at', 'desc')->take(5)->get(),
			'popularProfiles' => Profile::orderBy('views', 'desc')->take(5)->get(),
		]);
	}

	public function about() {

		return view('admin.about');
	}

	public function recentAdmins($lastVisit) {

		return view('admin.admins.admins')->with([
			'admins' => $this->getNewAdmins($lastVisit)
		]);
	}

	public function recentArticles($lastVisit) {

		return view('admin.articles.articles')->with([
			'articles' => $this->getNewArticles($lastVisit)
		]);
	}

	public function recentProfiles($lastVisit) {

		return view('admin.profiles.profiles')->with([
			'profiles' => $this->getNewProfiles($lastVisit)
		]);
	}

	public function recentPositions($lastVisit) {

		return view('admin.positions.positions')->with([
			'positions' => $this->getNewPositions($lastVisit)
		]);
	}

	public function recentDocuments($lastVisit) {

		return view('admin.reports.reports')->with([
			'reports' => $this->getNewDocuments($lastVisit)
		]);
	}

	public function recentSubscribers($lastVisit) {

		return view('admin.subscribers.subscribers')->with([
			'subscribers' => $this->getNewSubscribers($lastVisit)
		]);
	}


	private function getNotifications($lastVisit) {
		$notifications = [];
		$notifications['newAdmins']         = count($this->getNewAdmins($lastVisit));
		$notifications['newArticles']       = count($this->getNewArticles($lastVisit));
		$notifications['newProfiles']       = count($this->getNewProfiles($lastVisit));
		$notifications['newPositions']      = count($this->getNewPositions($lastVisit));
		$notifications['newDocuments']      = count($this->getNewDocuments($lastVisit));
		$notifications['newSubscribers']    = count($this->getNewSubscribers($lastVisit));

		return $notifications;
	}

	private function getNewAdmins($lastVisit) {
		$newAdmins = Admin::whereBetween('created_at', array($lastVisit, Carbon::now()))->get();

		return $newAdmins;
	}

	private function getNewArticles($lastVisit) {
		$articles = Article::whereBetween('created_at', array($lastVisit, Carbon::now()))->get();

		return $articles;
	}

	private function getNewProfiles($lastVisit) {
		$profiles = Profile::whereBetween('created_at', array($lastVisit, Carbon::now()))->get();

		return $profiles;
	}

	private function getNewPositions($lastVisit) {
		$positions = Position::whereBetween('created_at', array($lastVisit, Carbon::now()))->get();

		return $positions;
	}

	private function getNewDocuments($lastVisit) {
		$reports = Report::whereBetween('created_at', array($lastVisit, Carbon::now()))->get();

		return $reports;
	}

	private function getNewSubscribers($lastVisit) {
		$subscribers = Subscriber::whereBetween('created_at', array($lastVisit, Carbon::now()))->get();

		return $subscribers;
	}
}
