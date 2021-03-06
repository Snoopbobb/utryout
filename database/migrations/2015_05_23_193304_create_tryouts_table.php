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
			$table->date('date');
			$table->time('time')->nullable();
			$table->string('location_name');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->decimal('lat', 10,7)->index();
			$table->decimal('lng', 10,7)->index();
			$table->text('description')->nullable();
			$table->integer('rsvp')->nullable();
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
