<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->integer('category');
			$table->string('room_basis', 10)->nullable();
			$table->string('distance_from_haram')->nullable();
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
		Schema::drop('hotels');
	}

}
