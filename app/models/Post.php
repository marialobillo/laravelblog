<?php 


class Post extends Eloquent{

	protected $table = 'posts';


	public static $rules =[
		'title' => 'required',
		'body' => 'required',
		'user_id' => 'required'
	];
}

 ?>