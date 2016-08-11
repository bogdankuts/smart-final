<?php

namespace App\Http\Controllers;

use App\Report;
use App\ReportContent;
use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller {

	public function about($type) {

		$docs = ReportContent::selectReportsByType($this->getLangId(), 1);
		$reports = ReportContent::selectReportsByType($this->getLangId(), 2);

		return view('pages.about')->with([
			'type'      => $type,
		    'reports'   => $reports,
		    'docs'      => $docs
		]);
	}

	public function incrementViewsReport(Report $report) {
		$report->views++;
		$report->save();
	}
}
