<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricingPeriodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pricing_periods', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hotel_id');
			$table->date('from_date');
			$table->date('to_date');
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
		Schema::drop('pricing_periods');
	}

}
