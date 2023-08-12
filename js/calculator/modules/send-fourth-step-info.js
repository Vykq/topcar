const sendFourthStepInfo = () => {
    // Get the selected values
    const deliveryStreetAdress = document.querySelector("input[name='delivery-street-address']").value;
    const deliverySuite = document.querySelector("input[name='delivery-optional']").value;
    const thisIsAElements = document.querySelectorAll("input[name='thisIsA-delivery']");
        let thisIsA = null;
        thisIsAElements.forEach((radio) => {
        if (radio.checked) {
            thisIsA = radio.value;
        }
        });
    const businessName = document.querySelector("input[name='deliveryBusinessName']").value;
    const deliveryIsInputs = document.querySelectorAll('input[name="deliveryContact"]');
    let deliveryIs = null;
    deliveryIsInputs.forEach((radio) => {
      if (radio.checked) {
        deliveryIs = radio.value;
      }
    });
    const deliverySomeoneName = document.querySelector("input[name='delivery-someone-name']").value;
    const deliverySomeonePhone = document.querySelector("input[name='delivery-someone-phone']").value;

        const searchParams = window.location.search;
        const urlParams = new URLSearchParams(searchParams);
        const orderParam = urlParams.get('order');
        const orderNumber = orderParam ? orderParam.match(/\d+/)[0] : null;
  
    // Prepare the data to send as an object
    const dataToSend = new URLSearchParams();
    dataToSend.append('action', 'getFourthStepInfo');
    dataToSend.append('deliveryStreetAdress', deliveryStreetAdress);
    dataToSend.append('deliverySuite', deliverySuite);
    dataToSend.append('thisIsA', thisIsA);
    dataToSend.append('businessName', businessName);
    dataToSend.append('deliveryIs', deliveryIs);
    dataToSend.append('deliverySomeoneName', deliverySomeoneName);
    dataToSend.append('deliverySomeonePhone', deliverySomeonePhone);
    dataToSend.append('orderID', orderNumber);
    
    
    // Send the data using AJAX
    fetch(ajax_object.themeUrl + '/inc/calculator/getStepsInfo.php', {
      method: "POST",
      body: dataToSend,
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
    })
    .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text(); // Use response.text() to get the raw response as a string
      })
      .then((data) => {
        if (data) {
          // Try parsing the response as JSON
          const jsonData = JSON.parse(data);
          console.log("Data sent successfully!", jsonData);
        } else {
          console.log("Data sent successfully, but the response was empty.");
        }
      })
      .catch((error) => {
        // Handle errors if any
        console.error("Error sending data:", error);
      });
  };
  
  export default sendFourthStepInfo;