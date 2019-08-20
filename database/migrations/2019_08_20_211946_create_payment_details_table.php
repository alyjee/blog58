<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('form_id');
			$table->float('received_amount', 10, 0);
			$table->date('receiving_date');
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
		Schema::drop('payment_details');
	}

}
