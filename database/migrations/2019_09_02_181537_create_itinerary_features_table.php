<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItineraryFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itinerary_features', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('itinerary_id');
			$table->string('name');
			$table->float('weekday_price', 10, 0);
			$table->float('weekend_price', 10, 0);
			$table->integer('qty');
			$table->integer('weekdays');
			$table->integer('weekends');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('itinerary_features');
	}

}
