const sendPaymentInfo = () => {
    // Get the selected values
    const paymentMethodBlock = document.querySelectorAll('.tab-btn');
    let paymentMethod = 'credit'
    paymentMethodBlock.forEach(el => {
        el.addEventListener('click', (e)=>{
            if(el.classList.contains('credit')){
                paymentMethod = 'credit'
            } else {
                paymentMethod = 'Paypal'
            }
            console.log(paymentMethod);
        })
    
    })
    let billingAddress = '';
    const billingAddressValue = document.querySelectorAll('input[name="billing-address-area"]');

    const oBillingStreetInput = document.querySelector('input[name="billing-street-other"]');
    const oBillingAppInput = document.querySelector('input[name="billing-appartments-other"]');
    const oBillingCityInput = document.querySelector('input[name="billing-city-other"]');
    const oBillingStateInput = document.querySelector('input[name="state"]');
    const oBillingZipInput = document.querySelector('input[name="billing-zip-other"]');
    billingAddressValue.forEach(input => {
        input.addEventListener('change', () => {
            if (input.checked) {
                if (input.getAttribute('id') == "other-billing-address") {
                    billingAddress = oBillingStreetInput.value + ', ' + oBillingAppInput.value + ', ' + oBillingCityInput.value + ', ' + oBillingStateInput.value + ', ' + oBillingZipInput.value;
                } else {
                    billingAddress = input.value;
                }
            }
        });
    });
  
    
    const searchParams = window.location.search;
    const urlParams = new URLSearchParams(searchParams);
    const orderParam = urlParams.get('order');
    const orderNumber = orderParam ? orderParam.match(/\d+/)[0] : null;
    // Prepare the data to send as an object
    const dataToSend = new URLSearchParams();
    dataToSend.append('action', 'getPaymentInfo');
    dataToSend.append('paymentMethod', paymentMethod);
    dataToSend.append('orderID', orderNumber);
    
    
    // // Send the data using AJAX
    // fetch(ajax_object.themeUrl + '/inc/calculator/getStepsInfo.php', {
    //   method: "POST",
    //   body: dataToSend,
    //   headers: {
    //     "Content-Type": "application/x-www-form-urlencoded",
    //   },
    // })
    // .then((response) => {
    //     if (!response.ok) {
    //       throw new Error("Network response was not ok");
    //     }
    //     return response.text(); // Use response.text() to get the raw response as a string
    //   })
    //   .then((data) => {
    //     if (data) {
    //       // Try parsing the response as JSON
    //       const jsonData = JSON.parse(data);
    //       console.log("Data sent successfully!", jsonData);
    //     } else {
    //       console.log("Data sent successfully, but the response was empty.");
    //     }
    //   })
    //   .catch((error) => {
    //     // Handle errors if any
    //     console.error("Error sending data:", error);
    //   });
  };
  
  export default sendPaymentInfo;