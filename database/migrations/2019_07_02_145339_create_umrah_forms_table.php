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
			$table->integer('childs')->nullable();
			$table->integer('infants')->nullable();
			$table->integer('package_category');
			$table->integer('transport');
			$table->integer('makkah_hotel');
			$table->integer('makkah_hotel_category');
			$table->integer('makkah_hotel_meal_plan');
			$table->integer('makkah_double_price');
			$table->integer('makkah_double_qty');
			$table->integer('makkah_triple_price');
			$table->integer('makkah_triple_qty');
			$table->integer('makkah_quad_price');
			$table->integer('makkah_quad_qty');
			$table->integer('makkah_quint_price');
			$table->integer('makkah_quint_qty');
			$table->integer('makkah_sharing_price');
			$table->integer('makkah_sharing_qty');
			$table->integer('makkah_weekend_price_price');
			$table->integer('makkah_weekend_price_qty');
			$table->integer('makkah_haram_view_price_price');
			$table->integer('makkah_haram_view_price_qty');
			$table->integer('makkah_full_board_per_pax_per_day_price');
			$table->integer('makkah_full_board_per_pax_per_day_qty');
			$table->integer('makkah_four_nights_price_price');
			$table->integer('makkah_four_nights_price_qty');
			$table->integer('makkah_extra_bed_price_price');
			$table->integer('makkah_extra_bed_price_qty');
			$table->integer('madinah_from_date');
			$table->integer('madinah_to_date');
			$table->integer('madinah_hotel_nights');
			$table->integer('madinah_hotel');
			$table->integer('madinah_hotel_category');
			$table->integer('madinah_hotel_meal_plan');
			$table->integer('madinah_double_price');
			$table->integer('madinah_double_qty');
			$table->boolean('archive')->default(0);
			$table->timestamps();
			$table->integer('madinah_triple_price');
			$table->integer('madinah_triple_qty');
			$table->integer('madinah_quad_price');
			$table->integer('madinah_quad_qty');
			$table->integer('madinah_quint_price');
			$table->integer('madinah_quint_qty');
			$table->integer('madinah_sharing_price');
			$table->integer('madinah_sharing_qty');
			$table->integer('madinah_weekend_price_price');
			$table->integer('madinah_weekend_price_qty');
			$table->integer('madinah_haram_view_price_price');
			$table->integer('madinah_haram_view_price_qty');
			$table->integer('madinah_full_board_per_pax_per_day_price');
			$table->integer('madinah_full_board_per_pax_per_day_qty');
			$table->integer('madinah_four_nights_price_price');
			$table->integer('madinah_four_nights_price_qty');
			$table->integer('madinah_extra_bed_price_price');
			$table->integer('madinah_extra_bed_price_qty');
			$table->integer('stage');
			$table->integer('adult_ticket_price');
			$table->integer('child_ticket_price');
			$table->integer('infant_ticket_price');
			$table->integer('total_ticket_price');
			$table->integer('umrah_per_person');
			$table->integer('total_umrah_price');
			$table->integer('total_package_price');
			$table->integer('total_package_price_pkr');
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
