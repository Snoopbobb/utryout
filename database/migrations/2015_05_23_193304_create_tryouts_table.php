<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTryoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tryouts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('organization');
			$table->string('website')->nullable();
			$table->string('contact_name');
			$table->string('contact_email');
			$table->string('sport');
			$table->integer('age');
			$table->integer('age2')->nullable();
			$table->integer('age3')->nullable();
			$table->integer('age4')->nullable();
			$table->integer('age5')->nullable();
			$table->date('date');
			$table->time('time')->nullable();
			$table->string('location');
			$table->string('city');
			$table->string('state');
			$table->text('description')->nullable();
			$table->timestamps();
		});

		Schema::table('tryouts', function($table) {
       		$table->foreign('user_id')->references('id')->on('users');
   		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tryouts');
	}

}
