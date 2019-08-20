<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlightDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flight_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('form_id');
			$table->string('day', 10);
			$table->date('date');
			$table->enum('flight_status', array('dep','arr'));
			$table->text('city_terminal_stopover', 65535);
			$table->string('time', 10);
			$table->string('flight_class_status');
			$table->string('stop_eqp_flts');
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
		Schema::drop('flight_details');
	}

}
