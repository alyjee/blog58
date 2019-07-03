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
			$table->float('double', 10, 0)->nullable();
			$table->float('triple', 10, 0)->nullable();
			$table->float('quad', 10, 0)->nullable();
			$table->float('quint', 10, 0)->nullable();
			$table->float('sharing', 10, 0)->nullable();
			$table->float('weekend_price', 10, 0)->nullable();
			$table->float('haram_view_price', 10, 0)->nullable();
			$table->float('bf_per_pax_per_day', 10, 0)->nullable();
			$table->float('full_board_per_pax_per_day', 10, 0)->nullable();
			$table->float('four_nights_price', 10, 0)->nullable();
			$table->float('extra_bed_price', 10, 0)->nullable();
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
