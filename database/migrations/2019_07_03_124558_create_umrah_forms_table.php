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
			$table->string('ref_num');
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
			$table->integer('makkah_hotel');
			$table->integer('makkah_hotel_category');
			$table->string('makkah_hotel_meal_plan')->nullable();
			$table->integer('makkah_double_price')->nullable();
			$table->integer('makkah_double_qty')->nullable();
			$table->integer('makkah_triple_price')->nullable();
			$table->integer('makkah_triple_qty')->nullable();
			$table->integer('makkah_quad_price')->nullable();
			$table->integer('makkah_quad_qty')->nullable();
			$table->integer('makkah_quint_price')->nullable();
			$table->integer('makkah_quint_qty')->nullable();
			$table->integer('makkah_sharing_price')->nullable();
			$table->integer('makkah_sharing_qty')->nullable();
			$table->integer('makkah_weekend_price_price')->nullable();
			$table->integer('makkah_weekend_price_qty')->nullable();
			$table->integer('makkah_haram_view_price_price')->nullable();
			$table->integer('makkah_haram_view_price_qty')->nullable();
			$table->integer('makkah_full_board_per_pax_per_day_price')->nullable();
			$table->integer('makkah_full_board_per_pax_per_day_qty')->nullable();
			$table->integer('makkah_four_nights_price_price')->nullable();
			$table->integer('makkah_four_nights_price_qty')->nullable();
			$table->integer('makkah_extra_bed_price_price')->nullable();
			$table->integer('makkah_extra_bed_price_qty')->nullable();
			$table->date('madinah_from_date');
			$table->date('madinah_to_date');
			$table->integer('madinah_hotel_nights');
			$table->integer('madinah_hotel');
			$table->integer('madinah_hotel_category');
			$table->string('madinah_hotel_meal_plan')->nullable();
			$table->integer('madinah_double_price')->nullable();
			$table->integer('madinah_double_qty')->nullable();
			$table->boolean('archive')->default(0);
			$table->timestamps();
			$table->integer('madinah_triple_price')->nullable();
			$table->integer('madinah_triple_qty')->nullable();
			$table->integer('madinah_quad_price')->nullable();
			$table->integer('madinah_quad_qty')->nullable();
			$table->integer('madinah_quint_price')->nullable();
			$table->integer('madinah_quint_qty')->nullable();
			$table->integer('madinah_sharing_price')->nullable();
			$table->integer('madinah_sharing_qty')->nullable();
			$table->integer('madinah_weekend_price_price')->nullable();
			$table->integer('madinah_weekend_price_qty')->nullable();
			$table->integer('madinah_haram_view_price_price')->nullable();
			$table->integer('madinah_haram_view_price_qty')->nullable();
			$table->integer('madinah_full_board_per_pax_per_day_price')->nullable();
			$table->integer('madinah_full_board_per_pax_per_day_qty')->nullable();
			$table->integer('madinah_four_nights_price_price')->nullable();
			$table->integer('madinah_four_nights_price_qty')->nullable();
			$table->integer('madinah_extra_bed_price_price')->nullable();
			$table->integer('madinah_extra_bed_price_qty')->nullable();
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
			$table->date('makkah_from_date');
			$table->date('makkah_to_date');
			$table->integer('makkah_hotel_nights');
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
