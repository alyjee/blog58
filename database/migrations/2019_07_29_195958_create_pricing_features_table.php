<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricingFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pricing_features', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pricing_period_id');
			$table->string('name');
			$table->integer('price');
			$table->float('weekend_price', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pricing_features');
	}

}
