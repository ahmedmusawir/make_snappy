<?php

class Answer extends \Basemodel {
	protected $fillable = [];
	protected $guarded = [];
	

	public static $rules = [
		'answer' => 'required|min:2'
	];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function question()
	{
		return $this->belongsTo('Question');
	}
}

