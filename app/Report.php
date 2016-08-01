<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {
	protected $dates=['created_at', 'updated_at', 'published_at'];
	protected $primaryKey = 'report_id';
	protected $fillable = ['category_id', 'created_by', 'published_at'];

	public function content() {

		return $this->hasMany('App\ReportContent', 'report_id', 'report_id');
	}

	public static function getAllReports() {

		return Report::orderBy('created_at', 'desc')->get();
	}
}
