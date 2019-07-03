<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUmrahFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('umrah_forms', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ref_num')->unique('ref_num');
			$table->string('person_name');
			$table->integer('total_passengers');
			$table->integer('total_days');
			$table->date('from_date');
			$table->date('to_date');
			$table->integer('adults');
			$table->integer('childs')->default(0);
			$table->integer('infants')->default(0);
			$table->integer('package_category');
			$table->enum('transport', array('private','sharing'));
			$table->boolean('archive')->default(0);
			$table->timestamps();
			$table->enum('stage', array('proposed','final'))->default('proposed');
			$table->integer('adult_ticket_price')->default(0);
			$table->integer('child_ticket_price')->default(0);
			$table->integer('infant_ticket_price')->default(0);
			$table->integer('total_ticket_price')->default(0);
			$table->integer('umrah_per_person');
			$table->integer('total_umrah_price');
			$table->integer('total_package_price');
			$table->integer('total_package_price_pkr');
			$table->string('airline')->nullable();
			$table->string('flight_type')->nullable();
			$table->float('psf', 10, 0)->default(0);
			$table->float('transport_charges', 10, 0)->default(0);
			$table->float('visa_charges', 10, 0)->default(0);
			$table->float('all_iternaries_total', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('umrah_forms');
	}

}
