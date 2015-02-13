<?php

class Basemodel extends \Eloquent {
	protected $fillable = [];

	public static function validate($data)
	{
		return Validator::make($data, static::$rules);
	}
}