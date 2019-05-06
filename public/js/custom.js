$(document).ready(function() {
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

	$('#makkah_to_date').on('change', function(){
		var from_date = $('#makkah_from_date').val();
		if( from_date=='' || from_date==undefined ){
			alert('Please select Makkah From Date first');
			$(this).val('');
			return false;
		}
		var to_date = $(this).val();
		var numberOfNights = get_total_nights(from_date, to_date);
		$('#makkah_hotel_nights') .val(numberOfNights); 
	});

	$('#madinah_to_date').on('change', function(){
		var from_date = $('#madinah_from_date').val();
		if( from_date=='' || from_date==undefined ){
			alert('Please select Madinah From Date first');
			$(this).val('');
			return false;
		}
		var to_date = $(this).val();
		var numberOfNights = get_total_nights(from_date, to_date);
		$('#madinah_hotel_nights') .val(numberOfNights); 
	});


	$('#makkah_hotel').on('change', function(){
		$('div.feature-div').addClass('hide');
		$('div.feature-div :input').val('');
		var makkah_to_date = $('#makkah_to_date').val();
		var makkah_from_date = $('#makkah_from_date').val();
		if( makkah_to_date=='' || makkah_to_date==undefined || makkah_from_date=='' || makkah_from_date==undefined ){
			alert('Please select Makkah From Date and To Date first');
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
				from_date : makkah_from_date,
				to_date : makkah_to_date
			},
			success: function(res){
				if(res.success){

					var div_selector = '';
					var input_selector = '';
					$.each(res.data.pp, function(key, value){
						if( value!='' || value!=undefined || value!=0) {
							div_selector = '#makkah_'+key+'_div';
							input_selector = '#makkah_'+key+'_price';
							$(div_selector).removeClass('hide');
							$(input_selector).val(value);
						}
					});
					$('#makkah_hotel_category').val(res.data.hotel.category)
					$('#makkah_hotel_distance_from_haram').val(res.data.hotel.distance_from_haram)
					$('#makkah_hotel_meal_plan').val(res.data.hotel.room_basis)

				} else {
					alert(res.message);
				}
			},
			error: function(res){
				alert('Whoops! Something went wrong!')
			}
		})
	});

	$('#madinah_hotel').on('change', function(){
		$('div.feature-div').addClass('hide');
		$('div.feature-div :input').val('');
		var madinah_to_date = $('#madinah_to_date').val();
		var madinah_from_date = $('#madinah_from_date').val();
		if( madinah_to_date=='' || madinah_to_date==undefined || madinah_from_date=='' || madinah_from_date==undefined ){
			alert('Please select Madinah From Date and To Date first');
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
				from_date : madinah_from_date,
				to_date : madinah_to_date
			},
			success: function(res){
				if(res.success){
					var div_selector = '';
					var input_selector = '';
					$.each(res.data.pp, function(key, value){
						if( value!='' && value!=undefined && value!=0 && value!=null) {
							div_selector = '#madinah_'+key+'_div';
							input_selector = '#madinah_'+key+'_price';
							$(div_selector).removeClass('hide');
							$(input_selector).val(value);
						}
					});
					$('#madinah_hotel_category').val(res.data.hotel.category)
					$('#madinah_hotel_distance_from_haram').val(res.data.hotel.distance_from_haram)
					$('#madinah_hotel_meal_plan').val(res.data.hotel.room_basis)
				} else {
					alert(res.message);
				}
			},
			error: function(res){
				alert('Whoops! Something went wrong!')
			}
		})
		// var prefix = 'makkah_hotel_';
		// var makkah_hotel = $(this).val();
		// if( validateHotel($(this), 'makkah_hotel') ){
		// 	var selected_room_category = $('#room_category').val();
		// 	hotel.data.forEach(function(hotel, key){
		// 		if( makkah_hotel == hotel.id ){
		// 			$('#'+prefix+'category').val(hotel.category);
		// 			$('#'+prefix+'meal_plan').val(hotel.room_basis);
		// 			$('#'+prefix+'room_price').val(hotel[selected_room_category]);
		// 		}
		// 	});
		// 	calculateHotelsPricings();
		// }
	});

	$('.pricing-input').on('change', function(){
		$.ajax({
			url: siteUrl + '/dashboard/umrah/calculatePricing',
			type: 'GET',
			data: $("form").serialize(),
			success: function(res){
				console.log(res);
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