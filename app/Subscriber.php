<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {
	protected $dates=['created_at'];
	protected $primaryKey = 'subscriber_id';
	protected $fillable = ['email', 'created_at'];

	/**
	 * Saves subscriber, if it is not existed yet
	 * @param string $email
	 *
	 * @return bool
	 */
	public static function createCorrectSubscriber($email) {
		$emails = Subscriber::all()->pluck('email')->toArray();

		if (in_array($email, $emails)) {
			return false;
		} else {
			Subscriber::create([
				'email' => $email
			]);

			return true;
		}
	}
}
