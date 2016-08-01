<?php

namespace App\Http\Controllers\Admin;

use App\Report;
use App\ReportContent;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\ReportRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportsController extends AdminBaseController {
	public function index() {

		return view('admin.reports.reports')->with([
			'reports' => Report::getAllReports(),
		]);
	}

	public function show(Report $report) {

		return view('admin.reports.report')->with([
			'report' => $report,
		]);
	}

	public function create() {

		return view('admin.reports.create')->with([
			'submitButton'  => 'Добавить',
		]);
	}

	public function store(ReportRequest $request) {
		$report = Report::create([
			'category_id' => $request->category_id,
			'published_at' => $this->time($request->published_at)
		]);

		$content = new ReportContent();
		$messages = $content->updateOrCreateInstance($report, $request->all(), 'report_id', 'title', 'reports');
		$this->handleMessages($messages);

		return redirect()->back()->withInput();
	}

	public function edit(Report $report) {

		return view('admin.reports.update')->with([
			'report'       => $report,
			'ukr'           => $report->content->where('lang_id', 2)->first(),
			'rus'           => $report->content->where('lang_id', 1)->first(),
			'submitButton'  => 'Изменить',
		]);
	}

	public function update(ReportRequest $request, Report $report) {

		$report->update([
			'category_id' => $request->category_id,
			'published_at' => $this->time($request->published_at)
		]);

		$content = new ReportContent();
		$messages = $content->updateOrCreateInstance($report, $request->all(), 'report_id', 'title', 'reports');
		$this->handleMessagesUpdate($messages);

		return redirect()->back();
	}

	public function delete(Report $report) {

		$report->content()->delete();
		$report->delete();
		flash('Отчет успешно удален', 'success');

		return redirect()->route('admin_reports');
	}
}
