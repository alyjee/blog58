<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItinerariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itineraries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('form_id');
			$table->date('iternary_from_date');
			$table->date('iternary_to_date');
			$table->integer('iternary_hotel');
			$table->integer('iternary_hotel_nights');
			$table->integer('iternary_hotel_category');
			$table->string('iternary_hotel_distance_from_haram')->nullable();
			$table->string('iternary_hotel_meal_plan');
			$table->string('iternary_city');
			$table->float('iternary_total', 10, 0)->default(0);
			$table->boolean('archive')->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('itineraries');
	}

}
