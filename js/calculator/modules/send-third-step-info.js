const sendThirdStepInfo = () => {
    // Get the selected values
    const pickupStreetAdress = document.querySelector("input[name='pickup-street-address']").value;
    const pickupSuite = document.querySelector("input[name='pickup-optional']").value;
    const thisIsAElements = document.querySelectorAll("input[name='thisIsA']");
        let thisIsA = null;
        thisIsAElements.forEach((radio) => {
        if (radio.checked) {
            thisIsA = radio.value;
        }
        });
    const businessName = document.querySelector("input[name='businessAdressPickup']").value;
    const pickupIsInputs = document.querySelectorAll('input[name="pickupContact"]');
    let pickupIs = null;
    pickupIsInputs.forEach((radio) => {
      if (radio.checked) {
        pickupIs = radio.value;
      }
    });
    const pickupSomeoneName = document.querySelector("input[name='pickup-someone-name']").value;
    const pickupSomeonePhone = document.querySelector("input[name='pickup-someone-phone']").value;

        const searchParams = window.location.search;
        const urlParams = new URLSearchParams(searchParams);
        const orderParam = urlParams.get('order');
        const orderNumber = orderParam ? orderParam.match(/\d+/)[0] : null;
  
    // Prepare the data to send as an object
    const dataToSend = new URLSearchParams();
    dataToSend.append('action', 'getThirdStepInfo');
    dataToSend.append('pickupStreetAdress', pickupStreetAdress);
    dataToSend.append('pickupSuite', pickupSuite);
    dataToSend.append('thisIsA', thisIsA);
    dataToSend.append('businessName', businessName);
    dataToSend.append('pickupIs', pickupIs);
    dataToSend.append('pickupSomeoneName', pickupSomeoneName);
    dataToSend.append('pickupSomeonePhone', pickupSomeonePhone);
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
  
  export default sendThirdStepInfo;