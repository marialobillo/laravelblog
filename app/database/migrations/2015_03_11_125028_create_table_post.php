<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('posts', function($tabla)
		{
			$tabla->increments('id');
			$tabla->integer('user_id')->unsigned();
			$tabla->string('title', 100);
			$tabla->text('body');
			$tabla->timestamps();
			$tabla->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('posts');
	}

}
