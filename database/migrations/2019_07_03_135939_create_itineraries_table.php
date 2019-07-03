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
			$table->float('iternary_double_price', 10, 0)->default(0);
			$table->integer('iternary_double_qty')->default(0);
			$table->float('iternary_double_total', 10, 0)->default(0);
			$table->float('iternary_triple_price', 10, 0)->default(0);
			$table->integer('iternary_triple_qty')->default(0);
			$table->float('iternary_triple_total', 10, 0)->default(0);
			$table->float('iternary_quad_price', 10, 0)->default(0);
			$table->integer('iternary_quad_qty')->default(0);
			$table->float('iternary_quad_total', 10, 0)->default(0);
			$table->float('iternary_quint_price', 10, 0)->default(0);
			$table->integer('iternary_quint_qty')->default(0);
			$table->float('iternary_quint_total', 10, 0)->default(0);
			$table->float('iternary_sharing_price', 10, 0)->default(0);
			$table->integer('iternary_sharing_qty')->default(0);
			$table->float('iternary_sharing_total', 10, 0)->default(0);
			$table->float('iternary_weekend_price_price', 10, 0)->default(0);
			$table->integer('iternary_weekend_price_qty')->default(0);
			$table->float('iternary_weekend_price_total', 10, 0)->default(0);
			$table->float('iternary_haram_view_price_price', 10, 0)->default(0);
			$table->integer('iternary_haram_view_price_qty')->default(0);
			$table->float('iternary_haram_view_price_total', 10, 0)->default(0);
			$table->float('iternary_full_board_per_pax_per_day_price', 10, 0)->default(0);
			$table->integer('iternary_full_board_per_pax_per_day_qty')->default(0);
			$table->float('iternary_full_board_per_pax_per_day_total', 10, 0)->default(0);
			$table->float('iternary_four_nights_price_price', 10, 0)->default(0);
			$table->integer('iternary_four_nights_price_qty')->default(0);
			$table->float('iternary_four_nights_price_total', 10, 0)->default(0);
			$table->float('iternary_extra_bed_price_price', 10, 0)->default(0);
			$table->integer('iternary_extra_bed_price_qty')->default(0);
			$table->float('iternary_extra_bed_price_total', 10, 0)->default(0);
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
