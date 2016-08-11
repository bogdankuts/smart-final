<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportContent extends AdminBaseModel {
    protected $table = 'reports_contents';
	public $timestamps = false;
	protected $fillable = ['meta_title', 'meta_description', 'meta_keywords', 'title', 'file', 'description', 'lang_id', 'report_id'];

	/**
	 * Fields to check and store
	 * @var array
	 */
	protected $fields = ['meta_title', 'meta_description', 'meta_keywords', 'title', 'description', 'file', 'lang_id'];


	public function report() {
		return $this->belongsTo('App\Report', 'report_id', 'report_id');
	}

	/**
	 * Get all reports by category
	 *
	 * @param int $lang_id
	 * @param int $category_id
	 *
	 * @return array
	 */
	public static function selectReportsByType($lang_id, $category_id) {
		$reports = Report::published()->where('category_id', $category_id)->get();
		if(!$reports->isEmpty()) {
			foreach($reports as $report) {
				$content[] = $report->content()->where('lang_id', $lang_id)->get();
			}
		} else {
			$content = [];
		}

		return $content;
	}

}
