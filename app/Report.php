<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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

	public function deleteFile() {
		$contents = $this->content;

		foreach ($contents as $content) {
			File::delete(public_path('files/reports/'.$content->file));
		}
	}

	/**
	 * Return only published reports
	 *
	 * @param $query
	 *
	 * @return mixed
	 */
	public function scopePublished($query) {

		return $query->where('published_at', '<' , Carbon::now());
	}
}


