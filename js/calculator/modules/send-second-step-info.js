const sendSecondStepInfo = () => {
    // Get the selected values
    const youAre = document.querySelector("input[name='youare']:checked").value;
    const fullName = document.querySelector("input[name='full-name']").value;
    const phoneNumber = document.querySelector("input[name='phone']").value;
    const companyName = document.querySelector("#companyName").value;
    const additionalPhone = document.querySelector('.phone-field-add').value;

        const searchParams = window.location.search;
        const urlParams = new URLSearchParams(searchParams);
        const orderParam = urlParams.get('order');
        const orderNumber = orderParam ? orderParam.match(/\d+/)[0] : null;

  
    // Prepare the data to send as an object
    const dataToSend = new URLSearchParams();
    dataToSend.append('action', 'getSecondStepInfo');
    dataToSend.append('youAre', youAre);
    dataToSend.append('fullName', fullName);
    dataToSend.append('phoneNumber', phoneNumber);
    dataToSend.append('companyName', companyName);
    dataToSend.append('additionalPhone', additionalPhone);
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
  
  export default sendSecondStepInfo;