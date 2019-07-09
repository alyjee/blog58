$(document).ready(function() {

	$(document).on("change", ".flight-date", function(){
		var weekday = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
		var a = new Date($(this).val());
		var day = weekday[a.getDay()];
		$(this).parents('.airline-details').find('.flight-day').val(day);
	});
	
	$(".add-new-flight-detail").on('click', function(){
		var $lastFlightDetail = $(".airline-details").last();
		var html = $("<div />").append($lastFlightDetail.clone()).html();
		$lastFlightDetail.after(html);
		var $newLastFlightDetail = $(".airline-details").last();
		$newLastFlightDetail.find('input, textarea, select').val('');
	});

	
	function get_total_nights(from_date, to_date){
		var date1 = new Date(from_date);
		var date2 = new Date(to_date);
		var timeDiff = Math.abs(date2.getTime() - date1.getTime());
		var numberOfNights = Math.ceil(timeDiff / (1000 * 3600 * 24));
		return numberOfNights;
	}


	$('#to_date').on('change', function(){
		var from_date = $('#from_date').val();
		if( from_date=='' || from_date==undefined ){
			alert('Please select From Date first');
			$(this).val('');
			return false;
		} 
		var to_date = $(this).val();
		var numberOfNights = get_total_nights(from_date, to_date);
		$('#total_days') .val(numberOfNights); 
	});


	$(document).on('click', '.submit-form', function(e){
		e.preventDefault();
		var $form = $(this).parents('form');
		var form_action = $form.attr('action');
		$form.find('input').parents('.form-group').removeClass('has-error');
		$form.find('select').parents('.form-group').removeClass('has-error');
		$.ajax({
			url: form_action,
			type: 'POST',
			data: $("form").serialize(),
			success: function(res){
				if(res.success){
					alert(res.message);
					window.location.replace(res.data.redirect_url);
				} else {
					alert(res.message);
				}
			},
			error: function(request, status, error){
				if(request.status==422){
					var obj = JSON.parse(request.responseText);
					$.each(obj.errors, function(key, value) {
						console.log(key);
						// check for array inputs
						var chunks = key.split(".");
						// add has-error class to parent with a class form-group
						// add form-control-feedback and add text in it
						if( chunks.length == 2 ) {
							// input is an array input
							var elements = $('.'+chunks[0]);
							var element_index = chunks[1];
							$(elements[element_index]).parents('.form-group').addClass('has-error');
						} else {
							$('#'+key).parents('.form-group').addClass('has-error');
						}

					});

				} else {
					alert('Whoops! Something went wrong!');
				}
			}
		});

	});

	$(".add-new-iternary").on('click', function(){
		var $iternaryHolder = $(".iternary-holder:last-child");
		var html = $("<div />").append($iternaryHolder.clone()).html();
		$iternaryHolder.after(html);
		$(".iternary-holder:last-child div.makkah-feature-div").addClass('hide');
		$(".iternary-holder:last-child").find('input,textarea, select').val('');
	});


	$(document).on('change', '.iternary_to_date', function(){
		var $iternaryHolder = $(this).parents('.iternary-holder');
		var from_date = $iternaryHolder.find('.iternary_from_date').val();
		if( from_date=='' || from_date==undefined ){
			alert('Please select From Date first!');
			$(this).val('');
			return false;
		}
		var to_date = $(this).val();
		var numberOfNights = get_total_nights(from_date, to_date);
		console.log(numberOfNights);
		$iternaryHolder.find('.iternary_hotel_nights').val(numberOfNights);
	});


	$(document).on('change', '.iternary_hotel', function(){
		var $iternaryHolder = $(this).parents('.iternary-holder');

		$iternaryHolder.find('div.feature-div').addClass('hide');
		$iternaryHolder.find('div.feature-div :input').val('');
		var iternary_to_date = $iternaryHolder.find('.iternary_to_date').val();
		var iternary_from_date = $iternaryHolder.find('.iternary_from_date').val();
		if( iternary_to_date=='' || iternary_to_date==undefined || iternary_from_date=='' || iternary_from_date==undefined ){
			alert('Please select From and To Dates first!');
			$(this).val('');
			return false;
		}
		var hotel_id = $(this).val();

		$.ajax({
			url: siteUrl + '/dashboard/hotels/getHotelFeatures',
			type: 'GET',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {
				hotel_id : hotel_id,
				from_date : iternary_from_date,
				to_date : iternary_to_date
			},
			success: function(res){
				if(res.success){
					var div_selector = '';
					var input_selector = '';
					$.each(res.data.pp, function(key, value){
						if( value!='' && value!=undefined && value!=0 && value!=null) {
							div_selector = '.iternary_'+key+'_div';
							input_selector = '.iternary_'+key+'_price';
							$iternaryHolder.find(div_selector).removeClass('hide');
							$iternaryHolder.find(input_selector).val(value);
						}
					});
					$iternaryHolder.find('.iternary_hotel_category').val(res.data.hotel.category)
					$iternaryHolder.find('.iternary_hotel_distance_from_haram').val(res.data.hotel.distance_from_haram)
					$iternaryHolder.find('.iternary_hotel_meal_plan').val(res.data.hotel.room_basis)

				} else {
					alert(res.message);
				}
			},
			error: function(res){
				alert('Whoops! Something went wrong!')
			}
		})
	});

	$(document).on('change', '.pricing-input', function(){
		$.ajax({
			url: siteUrl + '/dashboard/umrah/calculatePricing',
			type: 'GET',
			data: $("form").serialize(),
			success: function(res){
				if(res.success){
					$('#umrah_per_person').val(res.data.umrah_price_per_person);
					$('#total_umrah_price').val(res.data.total_umrah_price);
					$('#total_package_price').val(res.data.total_package_price);
					$('#total_package_price_pkr').val(res.data.total_package_price_pkr);
				} else {
					console.log(res.message);
					$('#umrah_per_person').val('');
					$('#total_umrah_price').val('');
					$('#total_package_price').val('');
					$('#total_package_price_pkr').val('');
				}
			},
			error: function(request, status, error){
				if(request.status==422){
					var obj = JSON.parse(request.responseText);

					$.each(obj.errors, function(key, value) {
						// console.log(key, value);
					});

				} else {
					alert('Whoops! Something went wrong!');
				}
			}
		})
	});

	$(document).on('change', '.received_amount_input', function(){
		var received_amount = parseFloat($(this).val());
		var pending_amount = parseFloat($(this).parents('.col-sm-3').siblings().find('.pending_amount_input').val());
		if( received_amount == null || received_amount == '' ) {
			return false;
		}

		if( pending_amount == null || pending_amount == '' || pending_amount == 0 ) {
			alert('Pending amount cannot be empty or ZERO.')
			return false;
		}

		if( received_amount > pending_amount ) {
			alert('Received Amount (' + received_amount + ') cannot be greater than Pending Amount (' + pending_amount + ').')
			return false;
		}

		var remaining_amount = pending_amount - received_amount;
		remaining_amount = parseFloat(remaining_amount).toFixed(2);

		var pending_amount = parseFloat($(this).parents('.col-sm-3').siblings().find('.remaining_amount_input').val(remaining_amount));

	});

	$('.add-new-payment').on('click', function(){
		var received_amount = $('.payment-detail-row:last').find('.received_amount_input').val();
		var remaining_amount = $('.payment-detail-row:last').find('.remaining_amount_input').val();
		var receiving_date = $('.payment-detail-row:last').find('.mydatepicker').val();

		if(
			received_amount == '' || received_amount == null ||
			remaining_amount == '' || remaining_amount == null ||
			receiving_date == '' || receiving_date == null
		){
			alert('Please fill the last added payment detail entry.');
			return false;
		}

		var html = $('.payment-detail-row:last')[0].outerHTML;
		
		$.when( $('.payment-detail-row:last').after(html) ).done(function(){
			$('.payment-detail-row:last').find('input').val('');
			$('.payment-detail-row:last').find('.pending_amount_input').val(remaining_amount);
		});

	});

	// $('#madinah_hotel').on('change', function(){
	// 	var prefix = 'madinah_hotel_';
	// 	var madinah_hotel = $(this).val();
	// 	if( validateHotel($(this), 'madinah_hotel') ){
	// 		var selected_room_category = $('#room_category').val();
	// 		hotel.data.forEach(function(hotel, key){
	// 			if( madinah_hotel == hotel.id ){
	// 				$('#'+prefix+'category').val(hotel.category);
	// 				$('#'+prefix+'meal_plan').val(hotel.room_basis);
	// 				$('#'+prefix+'room_price').val(hotel[selected_room_category]);
	// 			}
	// 		});
	// 		calculateHotelsPricings();
	// 	}
	// });

	$('#package_category').on('change', function(){
		var package_category_id = $(this).val();

		if( package_category_id ){
			packages.data.forEach(function(package, key){
				if( package_category_id == package.id ){
					console.log(package.price)
					$('#psf').val(package.price);
				}
			});
		}
	});

	function validateHotel($hotel, hotel_name){
		hotel_id = $hotel.val()
		var res = true;
		if( !hotel_id ){
			alert('Please select hotel');
			$hotel.parent().addClass('has-error');
			return false;
		} else {
			$hotel.parent().removeClass('has-error');
			var res = validateRequiredFields(hotel_name);
			if( !res ){
				$hotel.val('')
			}
			return res;
		}
	}

	function validateRequiredFields(hotel_name){
		return true;
		var required_inputs = ['total_days', 'from_date', 'to_date', 'total_passengers', 'adults', 'childs', 'infants', 'package_category', 'room_category', hotel_name+'_nights'];
		
		var validate = true;
		required_inputs.forEach(function(input, key){
			if( !$('#'+input).val() ){
				$('#'+input).parent().addClass('has-error');
				validate = false;
			} else {
				$('#'+input).parent().removeClass('has-error');
			}
		});
		if( !validate ){
			alert('Please select above fields first!');
		}
		return validate;
	}

	$('#makkah_hotel_nights, #madinah_hotel_nights, #room_category').on('change', function(){
		calculateHotelsPricings();
		calculateTotalPrice();
	});

	function calculateHotelsPricings(){
		var hotel_price = 0;

		var makkah_hotel_nights = $('#makkah_hotel_nights').val();
		var makkah_hotel_room_price = $('#makkah_hotel_room_price').val();

		var madinah_hotel_nights = $('#madinah_hotel_nights').val();
		var madinah_hotel_room_price = $('#madinah_hotel_room_price').val();

		var total_passengers = $('#total_passengers').val();

		if( !makkah_hotel_nights || !makkah_hotel_room_price 
			|| !madinah_hotel_nights || !madinah_hotel_room_price){
			console.log('error');
			return false;
		}

		console.log('success');

		hotel_price += makkah_hotel_nights * makkah_hotel_room_price;

		hotel_price += madinah_hotel_nights * madinah_hotel_room_price;

		var umrah_per_person_price = (hotel_price/total_passengers).toFixed(2);

		var psf = parseFloat($('#psf').val());

		console.log(psf);
		console.log(umrah_per_person_price);

		umrah_per_person_price = umrah_per_person_price+psf;

		$("#umrah_per_person").val(umrah_per_person_price);
		$('#total_umrah_price').val(hotel_price);

		return true;
	}

	$('#total_umrah_price, #adult_ticket_price, #child_ticket_price, #infant_ticket_price').on('change', function(){
		calculateTotalPrice();
	});

	function calculateTotalPrice(){
		console.log('calculateTotalPrice');

		var total_package_price = 0;
		var total_tickets_price = 0;

		var total_umrah_price = ( isNaN( parseFloat($('#total_umrah_price').val() )) ) ? 0 : parseFloat($('#total_umrah_price').val());
		var adult_ticket_price = ( isNaN(parseFloat($('#adult_ticket_price').val())) ) ? 0 : parseFloat($('#adult_ticket_price').val());
		var child_ticket_price = ( isNaN(parseFloat($('#child_ticket_price').val())) ) ? 0 : parseFloat($('#child_ticket_price').val());
		var infant_ticket_price = ( isNaN(parseFloat($('#infant_ticket_price').val())) ) ? 0 : parseFloat($('#infant_ticket_price').val());

		var adults = ( isNaN( parseFloat( $('#adults').val()) ) ) ? 0 : parseFloat($('#adults').val());
		var childs = ( isNaN( parseFloat( $('#childs').val()) ) ) ? 0 : parseFloat($('#childs').val());
		var infants = ( isNaN( parseFloat( $('#infants').val()) ) ) ? 0 : parseFloat($('#infants').val());

		total_package_price += total_umrah_price;

		total_tickets_price += adults * adult_ticket_price;
		total_tickets_price += childs * child_ticket_price;
		total_tickets_price += infants * infant_ticket_price;

		total_package_price += total_tickets_price;

		console.log('total_package_price');
		console.log(total_tickets_price);
		console.log(total_package_price);

		$('#total_ticket_price').val(total_tickets_price);
		$('#total_package_price').val(total_package_price);
	}


	$('.passport_expiry_date').on('change', function(){
		console.log('asdsasdas');
		var passport_expiry_date = $(this).val();

		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();

		today = yyyy + '-' + mm + '-' +  dd ;

		var date1 = new Date(today);
		var date2 = new Date(passport_expiry_date);
		var diffDays = parseInt((date2 - date1) / (1000 * 60 * 60 * 24)); 

		if( diffDays < 185 ){
			alert('Passport Expiry is less than six months');
			return false;
		}
	});
});