$(document).ready(function(){
	$('#makkah_hotel').on('change', function(){
		var prefix = 'makkah_hotel_';
		var makkah_hotel = $(this).val();
		if( validateHotel($(this), 'makkah_hotel') ){
			var selected_room_category = $('#room_category').val();
			hotel.data.forEach(function(hotel, key){
				if( makkah_hotel == hotel.id ){
					$('#'+prefix+'category').val(hotel.category);
					$('#'+prefix+'meal_plan').val(hotel.room_basis);
					$('#'+prefix+'room_price').val(hotel[selected_room_category]);
				}
			});
			calculateHotelsPricings();
		}
	});

	$('#madinah_hotel').on('change', function(){
		var prefix = 'madinah_hotel_';
		var madinah_hotel = $(this).val();
		if( validateHotel($(this), 'madinah_hotel') ){
			var selected_room_category = $('#room_category').val();
			hotel.data.forEach(function(hotel, key){
				if( madinah_hotel == hotel.id ){
					$('#'+prefix+'category').val(hotel.category);
					$('#'+prefix+'meal_plan').val(hotel.room_basis);
					$('#'+prefix+'room_price').val(hotel[selected_room_category]);
				}
			});
			calculateHotelsPricings();
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