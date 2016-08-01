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

}
