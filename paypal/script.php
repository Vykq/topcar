<script>
  var form = document.querySelector('#hosted-fields-form');
  var submit = document.querySelector('.hosted-btn');
  var regularPrice = document.querySelector('#regular-price');
  var priceText = regularPrice.textContent;

  var numericString = priceText.replace(/[^0-9]/g, '');
  var priceNumber = parseInt(numericString, 10);

  //FIELDS:
  const fullName = document.querySelector('input[name="full-name"]').value;
    const billingAddressInputs = document.querySelectorAll('input[name="billing-address-area"]');
    const otherBillingArea = document.querySelector('.additional-billing-address-fields');
    let isOtherSelected = false;
    const aptBillingInput = document.querySelector('input[name="billing-appartments-other"]');
    const cityBillingInput = document.querySelector('input[name="billing-city-other"]');
    const stateInput = document.querySelector('input[name="state"]');
    const errorMsg = document.querySelector('.error-msg-last');
    const streetInput = document.querySelector('input[name="billing-street-other"]');
    const zipInput = document.querySelector('input[name="billing-zip-other"]');
    const submitBtn = document.querySelector('#payment-button');
    let currentRequest = null;
    let delayTimer = null;
	  const delayDuration = 500;
    let finalAddress = '';

    stateInput.addEventListener( 'keyup', OnChangeSuggestions );
    zipInput.addEventListener('keyup', OnChangeSuggestions);
    function OnChangeSuggestions( e ) {
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

    billingAddressInputs.forEach(input => {
        input.addEventListener('change', (e) =>{
            if(input.checked && input.getAttribute('id') == "other-billing-address"){
                otherBillingArea.classList.remove('hidden');
                isOtherSelected = true;
            } else {
                otherBillingArea.classList.add('hidden');
                isOtherSelected = false;
                finalAddress = input.value;
                console.log(finalAddress);
            }
        })
    })


    function checkOtherBillingInputs(){
        if(streetInput.value == ""){
            streetInput.classList.add('error');
            errorMsg.textContent = "Enter your address";
            return true;
        }
        if(aptBillingInput.value == ""){
            aptBillingInput.classList.add('error');
            errorMsg.textContent = "Enter your appartment";
            return true;
        }
        if(cityBillingInput.value == ""){
            cityBillingInput.classList.add('error');
            errorMsg.textContent = "Enter your city";
            return true;
        }
        if(stateInput.value == ""){
            stateInput.classList.add('error');
            errorMsg.textContent = "Enter your state";
            return true;
        }
        if(zipInput.value == ""){
            zipInput.classList.add('error');
            errorMsg.textContent = "Enter your ZIP";
            return true;
        }
        return false;
    }

    function validateInputs() {
        if(isOtherSelected){
            if(!checkOtherBillingInputs()){
                return false;
            }
        } else {
          return false;
        }
        return true;
    }


    streetInput.addEventListener('input', () => {
        errorMsg.textContent = "";
        streetInput.classList.remove('error');

    })

    stateInput.addEventListener('input', () => {
        errorMsg.textContent = "";
        stateInput.classList.remove('error');
    })

    zipInput.addEventListener('input', () => {
        errorMsg.textContent = "";
        zipInput.classList.remove('error');
    })

    aptBillingInput.addEventListener('input', () =>{
        errorMsg.textContent = "";
        aptBillingInput.classList.remove('error');
    })

    cityBillingInput.addEventListener('input', () =>{
        errorMsg.textContent = "";
        cityBillingInput.classList.remove('error');
    })

  braintree.client.create({
  // Insert your tokenization key here FROM BRAINTREE API
  authorization: 'sandbox_hcp7tst2_78gbxbwmqpbhq6t3'
}, function (clientErr, clientInstance) {
  if (clientErr) {
    console.error(clientErr);
    return;
  }

  braintree.paypalCheckout.create({
      client: clientInstance
    }, function (paypalCheckoutErr, paypalCheckoutInstance) {
      if (paypalCheckoutErr) {
        console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
        return;
      }

      paypalCheckoutInstance.loadPayPalSDK({
        currency: 'EUR',
        intent: 'capture'
      }, function () {
        paypal.Buttons({
            style: {
                layout: 'horizontal',
                color: 'blue',
                width: '25%',
            },
          fundingSource: paypal.FUNDING.PAYPAL,
          createOrder: function () {
            return paypalCheckoutInstance.createPayment({
              flow: 'checkout',
              amount: priceNumber.toFixed(2), // Use fixed two decimal places
              currency: 'EUR',
              intent: 'capture',
              enableShippingAddress: true,
              shippingAddressEditable: false,
              shippingAddressOverride: {
                recipientName: fullName
              }
            });
          },
          // Rest of the PayPal button configuration
          onApprove: function (data, actions) {
            // Tokenize the PayPal payment and handle the result
            return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
                if (err) {
                console.error('Error tokenizing payment:', err);
                // Handle the error, display an error message to the user, etc.
                return;
                }
                
                // The payment has been tokenized successfully.
                // Now, send the tokenized payment information to your server
                $.ajax({
                type: 'POST',
                url: '/checkout-fields', // Replace with your server endpoint
                data: {
                    'paymentMethodNonce': payload.nonce,
                    'price': priceNumber
                },
                success: function (response) {
                    // Handle the success response from your server, e.g., show a success message
                    console.log('Payment success:', response);
                    // Redirect the user to a thank-you page or perform other actions
                    window.location.href = '/thank-you/?' + window.location.search + '&method=paypal' + "&price=" + priceNumber + '&address=' + finalAddress;
                },
                error: function (xhr, status, error) {
                    // Handle the error response from your server, e.g., show an error message
                    console.error('Payment error:', error);
                    // Handle the error, display an error message to the user, etc.
                }
                });
            });
            },

        onCancel: function (data) {
          console.log('PayPal payment cancelled', JSON.stringify(data, 0, 2));
        },

        onError: function (err) {
          console.error('PayPal error', err);
        }
        }).render('#paypal-button-pay').then(function () {

        });
      });
    });



    // Create a hostedFields component to initialize the form
    braintree.hostedFields.create({
      client: clientInstance,
      // Customize the Hosted Fields.
      // More information can be found at:
      // /braintree/docs/guides/hosted-fields/styling/javascript/v3
      styles: {
        'input': {
          'font-size': '0.8rem'
        },
        'input.invalid': {
          'color': 'red',
          'border': '1px solid red'
        },
        'input.valid': {
          'color': 'green',
          'border': '1px solid green'
        }
      },
      // Configure which fields in your card form will be generated by Hosted Fields instead
      fields: {
        number: {
          container: '#card-number',
          placeholder: 'Card number'
        },
        cardholderName: {
            container: '#cardholder-name',
            placeholder: 'e.g John Doe'
        },
        cvv: {
          container: '#cvv',
          placeholder: 'CVV'
        },
        expirationDate: {
          container: '#expiration-date',
          placeholder: 'MM/YY'
        }

      }
    }, function (hostedFieldsErr, instance) {
      if (hostedFieldsErr) {
        console.error(hostedFieldsErr);
        
        return;
      }

      submit.removeAttribute('disabled');

      submit.addEventListener('click', function (event) {
        event.preventDefault();
      
        instance.tokenize(function (tokenizeErr, payload) {
          if (tokenizeErr) {
            //console.error(tokenizeErr);
            const errMsg = tokenizeErr.message;
            document.querySelector('.credit-card-error').textContent = errMsg;
            return;
          }
          if(validateInputs()){
                console.log('nepareis');
                return;
            }
            if(isOtherSelected){
              finalAddress = streetInput.value + ', ' + aptBillingInput.value + ', ' + cityBillingInput.value + ', ' + stateInput.value + ', ' + zipInput.value;
            }

          $.ajax({
            type: 'POST',
            url: '/checkout-fields',
            data: {
                'paymentMethodNonce': payload.nonce,
                'price': priceNumber,
            }
          }).done(function(result) {
            window.location.href = '/thank-you/?' + window.location.search + '&method=credit-card' + "&price=" + priceNumber + '&address=' + finalAddress;
            
            // instance.teardown(function (teardownErr) {
            //   if (teardownErr) {
            //     console.error('Could not tear down the Hosted Fields form!');
            //   } else {
            //     console.info('Hosted Fields form has been torn down!');
            //     // Remove the 'Submit payment' button
            //     submit.remove();
            //   }
            // });
            if (result.success) {
                //window.location.href = '/thank-you/';
            }
          });
        });
      }, false);
    });
  });
</script>