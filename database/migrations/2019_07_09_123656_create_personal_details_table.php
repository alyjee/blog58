<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personal_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('form_id');
			$table->string('sur_name')->nullable();
			$table->string('given_name');
			$table->string('middle_name')->nullable();
			$table->date('dob');
			$table->string('passport_num');
			$table->date('passport_issue_date');
			$table->date('passport_expiry_date');
			$table->text('docs', 65535);
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
		Schema::drop('personal_details');
	}

}
