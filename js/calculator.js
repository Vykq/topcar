/* eslint-disable no-undef */
/* eslint-disable linebreak-style */
document.addEventListener( 'DOMContentLoaded', function() {
	const nextMonth = new Date();
	nextMonth.setMonth( nextMonth.getMonth() + 1 );

	new AirDatepicker( '#datepicker', {
		navTitles: {
			days: '<strong>yyyy MMMM</strong>',
		},
		dateFormat: 'MM/dd/yyyy',
		startDate: nextMonth,
	} );
	const step1 = document.getElementById( 'step-1' );
	const step2 = document.getElementById( 'step-2' );
	const step3 = document.getElementById( 'step-3' );
	const cityFromField = document.getElementById( 'city_from' );
	const cityToField = document.getElementById( 'city_to' );
	const carYearField = document.getElementById( 'year' );
	const carVehicleField = document.getElementById( 'vehicle' );
	const carVehicleModelField = document.getElementById( 'vehicle_model' );
	const shippingDateField = document.getElementById( 'shipping_date' );
	const dateInputWrap = document.getElementById( 'datepicker-wrap' );
	const emailAddressField = document.getElementById( 'email_address' );
	const calculatorForm = document.querySelector('#calculator_form');
	const formSubmitBtn = calculatorForm.querySelector('#button-step-3');

	document.getElementById( 'button-step-1' ).addEventListener( 'click', ValidateStep1 );
	document.getElementById( 'button-step-2' ).addEventListener( 'click', ValidateStep2 );
	document.getElementById( 'button-step-3' ).addEventListener( 'click', ValidateStep3 );

	carYearField.addEventListener( 'change', OnChangeCarYearField );
	carVehicleField.addEventListener( 'change', OnChangeCarVehicleField );
	carVehicleModelField.addEventListener( 'change', OnChangeCarVehicleModelField );
	emailAddressField.addEventListener( 'keyup', OnChangeEmailAddressField );

	shippingDateField.addEventListener( 'change', OnChangeShippingDateField );
	cityFromField.addEventListener( 'keyup', OnChangeSuggestions );
	cityToField.addEventListener( 'keyup', OnChangeSuggestions );

	formSubmitBtn.addEventListener('submit', Calculate );

	function OnChangeShippingDateField( e ) {
		if ( e.target.value === 'over30days' ) {
			dateInputWrap.classList.remove( 'd-none' );
		} else {
			dateInputWrap.classList.add( 'd-none' );
		}
		return true;
	}
	function ValidateStep1( e ) {
		e.preventDefault();

		let valid = true;
		cityFromField.parentNode.getElementsByClassName( 'city_error_from' )[ 0 ].textContent = '';
		cityToField.parentNode.getElementsByClassName( 'city_error_to' )[ 0 ].textContent = '';

		if ( cityFromField.value ) {
			if ( cityFromField.parentNode.getElementsByClassName( 'selected' )[ 0 ].textContent !== cityFromField.value ) {
				cityFromField.parentNode.getElementsByClassName( 'city_error_from' )[ 0 ].textContent = 'Please enter a valid Zip or City';
				valid = false;
			}
		} else {
			cityToField.parentNode.getElementsByClassName( 'city_error_to' )[ 0 ].textContent = 'Please enter a valid Zip or City';
			valid = false;
		}

		if ( cityToField.value ) {
			if ( cityToField.parentNode.getElementsByClassName( 'selected' )[ 0 ].textContent !== cityToField.value ) {
				cityToField.parentNode.getElementsByClassName( 'city_error_to' )[ 0 ].textContent = 'Please enter a valid Zip or City';
				valid = false;
			}
		} else {
			cityToField.parentNode.getElementsByClassName( 'city_error_to' )[ 0 ].textContent = 'Please enter a valid Zip or City';
			valid = false;
		}

		if ( cityFromField.value === cityToField.value ) {
			cityToField.parentNode.getElementsByClassName( 'city_error_to' )[ 0 ].textContent = 'The zip codes must differ from each other';
			valid = false;
		}
		if ( valid === true ) {
			step1.classList.add( 'd-none' );
			step2.classList.remove( 'd-none' );
		}
		return valid;
	}
	function ValidateStep2( e ) {
		
		e.preventDefault();

		let valid = true;

		if ( ! carYearField.value ) {
			carYearField.parentNode.getElementsByClassName( 'year_error' )[ 0 ].textContent = 'Please select vehicle year';
			valid = false;
		}
		if ( ! carVehicleField.value ) {
			carVehicleField.parentNode.getElementsByClassName( 'vehicle_error' )[ 0 ].textContent = 'Please select vehicle make';
			valid = false;
		}
		if ( ! carVehicleModelField.value ) {
			carVehicleModelField.parentNode.getElementsByClassName( 'model_error' )[ 0 ].textContent = 'Please select vehicle model';
			valid = false;
		}

		if ( valid ) {
			step2.classList.add( 'd-none' );
			step3.classList.remove( 'd-none' );
			
		}
		return valid;
		
	}
	function ValidateStep3( e ) {
		e.preventDefault();

		let valid = true;

		if ( ! emailAddressField.value ) {
			emailAddressField.parentNode.getElementsByClassName( 'mail_error' )[ 0 ].textContent = 'Please enter a valid email address!';
			valid = false;
		}
		if ( valid && ! ValidateEmail( emailAddressField.value ) ) {
			emailAddressField.parentNode.getElementsByClassName( 'mail_error' )[ 0 ].textContent = 'Please enter a valid email address!';
			valid = false;
		}

		if(valid === true){
			Calculate();
		}

		return valid;
	
	}

	function OnChangeCarYearField() {
		carYearField.parentNode.getElementsByClassName( 'year_error' )[ 0 ].textContent = '';
	}

	function OnChangeCarVehicleField() {
		carVehicleField.parentNode.getElementsByClassName( 'vehicle_error' )[ 0 ].textContent = '';
	}

	function OnChangeCarVehicleModelField() {
		carVehicleModelField.parentNode.getElementsByClassName( 'model_error' )[ 0 ].textContent = '';
	}

	function OnChangeEmailAddressField() {
		emailAddressField.parentNode.getElementsByClassName( 'mail_error' )[ 0 ].textContent = '';
	}
	function OnChangeSuggestions( e ) {
		cityFromField.parentNode.getElementsByClassName( 'city_error_from' )[ 0 ].textContent = '';
		cityToField.parentNode.getElementsByClassName( 'city_error_to' )[ 0 ].textContent = '';

		const letters = getLettersFromString( e.target.value );
		if ( letters.length >= 3 ) {
			getSuggestionsByName( letters, e.target );
			return true;
		}
		const numbers = getNumbersFromString( e.target.value );
		if ( numbers.length === 5 ) {
			getSuggestionsByZip( numbers, e.target );
			return true;
		}
		return true;
	}

	let currentRequest = null;
	let delayTimer = null;
	const delayDuration = 500;

	function getSuggestionsByName( inputValue, eventTarget ) {
		// Make an AJAX request to a server-side script for suggestions
		// Pass the inputValue as a query parameter to the server-side script
		// Example using jQuery AJAX:
		const suggestionsContainer = eventTarget.parentNode.querySelector( 'ul' );
		suggestionsContainer.classList.remove( 'd-none' );
		suggestionsContainer.innerHTML = '<li>Loading..</li>';

		if ( delayTimer ) {
			clearTimeout( delayTimer ); // Clear the previous delay timer if it exists
		}

		delayTimer = setTimeout( () => {
			if ( currentRequest ) {
				currentRequest.abort(); // Abort the current request if it exists
			}
			currentRequest = jQuery.ajax( {
				url: ajax_object.ajax_url,
				dataType: 'json',
				data: {
					action: 'city_suggestion_by_name_action',
					nonce: ajax_object.nonce,
					query: inputValue,
				},
				success( response ) {
					// Update the suggestions container with the received suggestions
				// eslint-disable-next-line no-console
					console.log( response );
					if ( response.data ) {
						suggestionsContainer.innerHTML = '';
						for ( let s = 0; s < response.data.length; s++ ) {
							const t = document.createElement( 'li' );
							t.classList.add( 'res' );
							t.innerText = response.data[ s ].city + ', ' + response.data[ s ].state_id;
							suggestionsContainer.appendChild( t );
							suggestionsContainer.firstElementChild.classList.add( 'selected' );
							t.addEventListener( 'click', ( event ) => {
								OnClickSuggestionResult( event, eventTarget );
							} );
						}
					}
				},
				error() {
					// Handle the error response
				},
				complete() {
					currentRequest = null; // Reset the current request once it's completed
				},
			} );
		}, delayDuration );
	}
	function getSuggestionsByZip( inputValue, eventTarget ) {
		// Make an AJAX request to a server-side script for suggestions
		// Pass the inputValue as a query parameter to the server-side script
		// Example using jQuery AJAX:
		const suggestionsContainer = eventTarget.parentNode.querySelector( 'ul' );
		suggestionsContainer.classList.remove( 'd-none' );
		suggestionsContainer.innerHTML = '<li>Loading..</li>';

		if ( delayTimer ) {
			clearTimeout( delayTimer ); // Clear the previous delay timer if it exists
		}

		delayTimer = setTimeout( () => {
			if ( currentRequest ) {
				currentRequest.abort(); // Abort the current request if it exists
			}
			currentRequest = jQuery.ajax( {
				url: ajax_object.ajax_url,
				dataType: 'json',
				data: {
					action: 'city_suggestion_by_zip_action',
					nonce: ajax_object.nonce,
					query: inputValue,
				},
				success( response ) {
					// Update the suggestions container with the received suggestions
				// eslint-disable-next-line no-console
					console.log( response );
					if ( response.data ) {
						suggestionsContainer.innerHTML = '';
						for ( let s = 0; s < response.data.length; s++ ) {
							const t = document.createElement( 'li' );
							t.classList.add( 'res' );
							t.innerText = response.data[ s ].city + ', ' + response.data[ s ].state_id + ', ' + response.data[ s ].zip_code;
							suggestionsContainer.appendChild( t );
							suggestionsContainer.firstElementChild.classList.add( 'selected' );
							t.addEventListener( 'click', ( event ) => {
								OnClickSuggestionResult( event, eventTarget );
							} );
						}
					}
				},
				error() {
					// Handle the error response
				},
				complete() {
					currentRequest = null; // Reset the current request once it's completed
				},
			} );
		}, delayDuration );
	}
	function OnClickSuggestionResult( event, inputEventTarget ) {
		// eslint-disable-next-line no-console
		console.log( event.target.parentNode );
		Array.from( event.target.parentNode.childNodes ).forEach( ( element ) => {
			if ( element.classList && element.classList.contains( 'selected' ) ) {
				element.classList.remove( 'selected' );
			}
		} );
		event.target.classList.add( 'selected' );
		inputEventTarget.value = event.target.innerText;
		event.target.parentNode.classList.add( 'd-none' );
	}

	function Calculate () {

		calculatorForm.submit();
		console.log('yes');
	}

	// $( '#calculator_form' ).submit( function( e ) {
	// 	//e.preventDefault(); // Prevent the form from submitting normally

	// 	// Get the form data
	// 	const formData = $( this ).serialize();

	// 	// Send the data to the server using Ajax
	// 	jQuery.ajax( {
	// 		url: ajax_object.ajax_url,
	// 		dataType: 'json',
	// 		type: 'POST',
	// 		data: {
	// 			action: 'calculate_action',
	// 			nonce: ajax_object.nonce_form,
	// 			formData,
	// 		},
	// 		success( response ) {
	// 			// Handle the successful response from the server
	// 			console.log('forma uzpildyta');
	// 			console.log( response );
	// 		},
	// 		error( xhr, status, error ) {
	// 			// Handle errors
	// 			console.log( error );
	// 		},
	// 	} );
	// } );

	function getNumbersFromString( str ) {
		const numbers = str.match( /\d+/g );
		const result = numbers ? numbers.join( '' ) : '';

		return result;
	}
	function getLettersFromString( str ) {
		const letters = str.match( /[a-zA-Z]+/g );
		const result = letters ? letters.join( '' ) : '';

		return result;
	}
	function ValidateEmail( input ) {
		const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

		if ( input.match( validRegex ) ) {
			return true;
		}
		return false;
	}
} );
