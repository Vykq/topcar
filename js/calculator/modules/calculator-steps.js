import checkName from "./check-name";
import checkEmail from "./check-email";
import checkPhone from "./check-phone";
import checkCompany from "./check-company";
const CalculatorSteps = () => {

    
    //Steps
    const firstStep = document.querySelector('#cost-step-1');
    const secondStep = document.querySelector('#cost-step-2');
    const thirdStep = document.querySelector('#cost-step-3');
    const fourthStep = document.querySelector('#cost-step-4');
    const fifthStep = document.querySelector('#cost-step-5');

    //Buttons to next steps
    const btnToSecond = document.querySelector('#to-step-2');
    const btnToThird = document.querySelector('#to-step-3');
    const btnToFourth = document.querySelector('#to-step-4');
    const btnToFifth = document.querySelector('#to-step-5');

    //Back Buttons
    const btnBackToFirst = document.querySelector('#back-to-step-1');
    const btnBackToSec = document.querySelector('#back-to-step-2');
    const btnBackToThird = document.querySelector('#back-to-step-3');
    const btnBackToFourth = document.querySelector('#back-to-step-4');

    //Additional elements to show more content
    const addPhoneBtn = document.querySelector('.additional-phone');
    const addPhoneField = document.querySelector('#addPhone');
    
    //Inputs
    //Step 2
    const youAreInputs = document.querySelectorAll('input[name="youare"]');
    const statusInfoBlock = document.querySelector('.error-msg');
    const nameInput = document.querySelector('input[name="full-name"]');
    const emailInput = document.querySelector('input[name="e-mail"]');
    const phoneInput = document.querySelector('input[name="phone"]');
    const phone2Input = document.querySelector('input[name="phone2"]');
    let isPhoneAdded = false;
    let youAreChecked = false;
    let step2Business = false;
    const companyNameInput = document.querySelector('#companyName');
    //Step 3 
    const statusInfoBlock2 = document.querySelector('.error-msg2');
    const pickupStreetInput = document.querySelector('input[name="pickup-street-address"]');
    const addressInputs = document.querySelectorAll('input[name="thisIsA"]');
    const pickupContactInputs = document.querySelectorAll('input[name="pickupContact"]');
    const pickupAdditional = document.querySelector('.pickup-another-contact');
    const pickupAdditionalName = document.querySelector('input[name="pickup-someone-name"]');
    const pickupAdditionalPhone = document.querySelector('input[name="pickup-someone-phone"]');
    let isAddressChecked = false;
    let isPickupContactChecked = false;
    let isPickupAdditionalChecked = false;
    let pickupBusinessName = false;
    const pickupBusinessNameInput = document.querySelector('#businessaddressPickup')
    //Step 4
    const statusInfoBlock3 = document.querySelector('.error-msg3'); 
    const deliveryStreetInput = document.querySelector('input[name="delivery-street-address"]');
    const deliveryaddressInputs = document.querySelectorAll('input[name="thisIsA-delivery"]');
    const deliveryContactInputs = document.querySelectorAll('input[name="deliveryContact"]');
    const deliveryAdditional = document.querySelector('.delivery-another-contact');
    const deliveryAdditionalName = document.querySelector('input[name="delivery-someone-name"]');
    const deliveryAdditionalPhone = document.querySelector('input[name="delivery-someone-phone"]');
    let isDeliveryAddressChecked = false;
    let isDeliveryContactChecked = false;
    let isDeliveryAdditionalChecked = false;
    let deliveryBusinessName = false;
    const deliveryBusinessNameInput = document.querySelector('#deliveryBusinessName')

    //LastStep
    const firstBillingAddressInput = document.querySelector('#first-billing-address');
    const firstBillingAddressLabel = document.querySelector('#first-billing-address-label');
    const shipFrom = document.querySelector('#ship-from');

    const secondBillingAddressInput = document.querySelector('#second-billing-address');
    const secondBillingAddressLabel = document.querySelector('#second-billing-address-label');
    const shipTo = document.querySelector('#ship-to');

    //Step indicators
    const stepIndicatorsArea = document.querySelector('.top-step-wrapper');
    const stepIndicators = document.querySelectorAll('.stepIndicator');
    const stepTitles = document.querySelectorAll('.si-title');


    //Additional containers 
    const revSlider = document.querySelector('.review-container');
    //Way to Second step
    btnToSecond.addEventListener('click', (e) =>{
        e.preventDefault();

        if(secondStep.classList.contains('hidden')){
            stepIndicatorsArea.classList.remove('hidden');
            firstStep.classList.add('hidden');
            secondStep.classList.remove('hidden');
            revSlider.classList.add('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    })

    //Way to Fourth step
    btnToFourth.addEventListener('click', (e) =>{
        if(pickupStreetInput.value == ""){
            pickupStreetInput.classList.add('error');
            statusInfoBlock2.textContent = "Please add Street Address";
            return false;
        }
        if(!addressValue()){
            return false;
        }
        if(!contactValue()){
            return false;
        }

        if(pickupBusinessName){
            if(!pickupBusinessNameValue()){
                return false;
            }
        }

        if(isPickupAdditionalChecked === true){
            if(!pickupAdditionalValue()){
                return false;
            }
            if(!pickupAdditionalPhoneValue()){
                return false;
            }
        }

        if(fourthStep.classList.contains('hidden')){
            fourthStep.classList.remove('hidden');
            thirdStep.classList.add('hidden');
            stepIndicators[1].classList.remove('active');
            stepIndicators[1].classList.add('completed');
            stepIndicators[2].classList.add('active');
            stepTitles[1].classList.remove('active');
            stepTitles[1].classList.add('completed');
            stepTitles[2].classList.add('active')
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    })

    //Way to Fifth Step
    btnToFifth.addEventListener('click', (e) =>{
        if(deliveryStreetInput.value == ""){
            deliveryStreetInput.classList.add('error');
            statusInfoBlock3.textContent = "Please add Street Address";
            return false;
        }

        if(!deliveryAddressValue()){
            return false;
        }

        if(!deliveryContactValue()){
            return false;
        }

        if(isDeliveryAdditionalChecked === true){
            if(!deliveryAdditionalValue()){
                return false;
            }
            if(!deliveryAdditionalPhoneValue()){
                return false;
            }
        }
        if(deliveryBusinessName){
            if(!deliveryBusinessNameValue()){
                return false;
            }
        }

        firstBillingAddressLabel.textContent = pickupStreetInput.value + ', ' + document.querySelector('input[name="pickup-optional"]').value + ", " + shipFrom.textContent;
        firstBillingAddressInput.value = pickupStreetInput.value + ', ' + document.querySelector('input[name="pickup-optional"]').value + ", " + shipFrom.textContent;
        
        secondBillingAddressLabel.textContent = deliveryStreetInput.value + ', ' + document.querySelector('input[name="delivery-optional"]').value + ", " + shipTo.textContent;
        secondBillingAddressInput.value = deliveryStreetInput.value + ', ' + document.querySelector('input[name="delivery-optional"]').value + ", " + shipTo.textContent;

        if(fifthStep.classList.contains('hidden')){
            fifthStep.classList.remove('hidden');
            fourthStep.classList.add('hidden');
            stepIndicators[2].classList.remove('active');
            stepIndicators[2].classList.add('completed');
            stepIndicators[3].classList.add('active');
            stepTitles[2].classList.remove('active');
            stepTitles[2].classList.add('completed');
            stepTitles[3].classList.add('active')
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    })


    //Back From Second To First Step
    btnBackToFirst.addEventListener('click', (e) => {
        e.preventDefault();

        if(firstStep.classList.contains('hidden')){
            stepIndicatorsArea.classList.add('hidden');
            secondStep.classList.add('hidden');
            firstStep.classList.remove('hidden');
            revSlider.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    })


    //Back From Third To Second Step
    btnBackToSec.addEventListener('click', (e) => {
        e.preventDefault();
        if(secondStep.classList.contains('hidden')){
            thirdStep.classList.add('hidden');
            secondStep.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    })


    
     //Back From Fourth To Third Step
     btnBackToThird.addEventListener('click', (e) => {
        e.preventDefault();
        if(thirdStep.classList.contains('hidden')){
            fourthStep.classList.add('hidden');
            thirdStep.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    })

    btnBackToFourth.addEventListener('click', (e) =>{
        if(fourthStep.classList.contains('hidden')){
            fifthStep.classList.add('hidden');
            fourthStep.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    })

    //Way to Third Step
    btnToThird.addEventListener('click', (e) => {
        if(!youAreValue()){
            return false;
        }
        if (!nameValue()) {
            return false;
        }
        if (!emailValue()) {
            return false;
        }
        if (!phoneValue()) {
            return false;
        }
        if(step2Business){
            if(!step2CompanyAdded()){
            return false;
        }
  
        }   

        if(isPhoneAdded === true){
            if (!phoneValue2()) {
                return false;
            }
        }

        if(thirdStep.classList.contains('hidden')){
            secondStep.classList.add('hidden');
            thirdStep.classList.remove('hidden');
            stepIndicators[0].classList.remove('active');
            stepIndicators[0].classList.add('completed');
            stepIndicators[1].classList.add('active');
            stepTitles[0].classList.remove('active');
            stepTitles[0].classList.add('completed');
            stepTitles[1].classList.add('active')
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        

    })



    //Additional Functions 
    function addressValue() {
        if(!isAddressChecked) {
            addressInputs.forEach(el =>{
                const field = el.parentElement.parentElement;
                field.classList.add('error');
                statusInfoBlock2.textContent = "Select address type";
            })
            return false;
        } else {
            return true;
        }
    }

    function deliveryAddressValue() {
        if(!isDeliveryAddressChecked) {
            deliveryaddressInputs.forEach(el =>{
                const field = el.parentElement.parentElement;
                field.classList.add('error');
                statusInfoBlock3.textContent = "Select address type";
            })
            return false;
        } else {
            return true;
        }
    }

    function contactValue() {
        if(!isPickupContactChecked) {
            pickupContactInputs.forEach(el =>{
                const field = el.parentElement.parentElement;
                field.classList.add('error');
                statusInfoBlock2.textContent = "Select contact type";
            })
            return false;
        } else {
            return true;
        }
    }

    function deliveryContactValue() {
        if(!isDeliveryContactChecked) {
            deliveryContactInputs.forEach(el =>{
                const field = el.parentElement.parentElement;
                field.classList.add('error');
                statusInfoBlock3.textContent = "Select contact type";
            })
            return false;
        } else {
            return true;
        }
    }


    function youAreValue() {
        if(!youAreChecked) {
            youAreInputs.forEach(el =>{
                const field = el.parentElement.parentElement;
                field.classList.add('error');
                statusInfoBlock.textContent = "Select what you are";
            })
            return false;
        } else {
            return true;
        }
    }

    function nameValue() {
        if (checkName(nameInput, statusInfoBlock)) {
            return true;
        } else {
            return false;

        }
    }

    function pickupAdditionalValue() {
        if (checkName(pickupAdditionalName, statusInfoBlock2)) {
            return true;
        } else {
            return false;

        }
    }

    function deliveryAdditionalValue() {
        if (checkName(deliveryAdditionalName, statusInfoBlock3)) {
            return true;
        } else {
            return false;

        }
    }

    function emailValue() {
        if (checkEmail(emailInput, statusInfoBlock)) {
            return true;
        } else {
            return false;
        }
    }

    function phoneValue() {
        if (checkPhone(phoneInput, statusInfoBlock)) {
            return true;
        } else {
            return false;
        }
    }

    function pickupAdditionalPhoneValue() {
        if (checkPhone(pickupAdditionalPhone, statusInfoBlock2)) {
            return true;
        } else {
            return false;
        }
    }

    function deliveryAdditionalPhoneValue() {
        if (checkPhone(deliveryAdditionalPhone, statusInfoBlock3)) {
            return true;
        } else {
            return false;
        }
    }

    function phoneValue2() {
        if (checkPhone(phone2Input, statusInfoBlock)) {
            return true;
        } else {
            return false;
        }
    }

    addPhoneBtn.addEventListener('click', () =>{
        if(addPhoneField.classList.contains('hidden')){
            isPhoneAdded = true;
            addPhoneField.classList.remove('hidden')
        } else {
            isPhoneAdded = false;
            addPhoneField.classList.add('hidden')
        }
    });

    nameInput.addEventListener('change', () => {
        if (nameInput.classList.contains('error')) {
            nameInput.classList.remove('error');
            statusInfoBlock.textContent = '';
            statusInfoBlock.classList.remove('field-error');
        }
    });

    
    companyNameInput.addEventListener('change', () => {
        if (companyNameInput.classList.contains('error')) {
            companyNameInput.classList.remove('error');
            statusInfoBlock.textContent = '';
            statusInfoBlock.classList.remove('field-error');
        }
    });

    deliveryBusinessNameInput.addEventListener('change', () => {
        if (deliveryBusinessNameInput.classList.contains('error')) {
            deliveryBusinessNameInput.classList.remove('error');
            statusInfoBlock3.textContent = '';
            statusInfoBlock3.classList.remove('field-error');
        }
    });
    

    pickupBusinessNameInput.addEventListener('change', () => {
        if (pickupBusinessNameInput.classList.contains('error')) {
            pickupBusinessNameInput.classList.remove('error');
            statusInfoBlock2.textContent = '';
            statusInfoBlock2.classList.remove('field-error');
        }
    });


    pickupAdditionalName.addEventListener('change', () => {
        if (pickupAdditionalName.classList.contains('error')) {
            pickupAdditionalName.classList.remove('error');
            statusInfoBlock2.textContent = '';
            statusInfoBlock2.classList.remove('field-error');
        }
    });

    deliveryAdditionalName.addEventListener('change', () => {
        if (deliveryAdditionalName.classList.contains('error')) {
            deliveryAdditionalName.classList.remove('error');
            statusInfoBlock3.textContent = '';
            statusInfoBlock3.classList.remove('field-error');
        }
    });

    pickupStreetInput.addEventListener('change', () => {
        if (pickupStreetInput.classList.contains('error')) {
            pickupStreetInput.classList.remove('error');
            statusInfoBlock2.textContent = '';
            statusInfoBlock2.classList.remove('field-error');
        }
    });

    deliveryStreetInput.addEventListener('change', () => {
        if (deliveryStreetInput.classList.contains('error')) {
            deliveryStreetInput.classList.remove('error');
            statusInfoBlock3.textContent = '';
            statusInfoBlock3.classList.remove('field-error');
        }
    });

    emailInput.addEventListener('change', () => {
        if (emailInput.classList.contains('error')) {
            emailInput.classList.remove('error');
            statusInfoBlock.classList.remove('field-error');
            statusInfoBlock.textContent = '';
        }
    });

    phoneInput.addEventListener('change', () => {
        if (phoneInput.classList.contains('error')) {
            phoneInput.classList.remove('error');
            statusInfoBlock.classList.remove('field-error');
            statusInfoBlock.textContent = '';
        }
    });
    
    phone2Input.addEventListener('change', () => {
        if (phone2Input.classList.contains('error')) {
            phone2Input.classList.remove('error');
            statusInfoBlock.classList.remove('field-error');
            statusInfoBlock.textContent = '';
        }
    });

    pickupAdditionalPhone.addEventListener('change', () => {
        if (pickupAdditionalPhone.classList.contains('error')) {
            pickupAdditionalPhone.classList.remove('error');
            statusInfoBlock2.classList.remove('field-error');
            statusInfoBlock2.textContent = '';
        }
    });

    deliveryAdditionalPhone.addEventListener('change', () => {
        if (deliveryAdditionalPhone.classList.contains('error')) {
            deliveryAdditionalPhone.classList.remove('error');
            statusInfoBlock3.classList.remove('field-error');
            statusInfoBlock3.textContent = '';
        }
    });
   
    youAreInputs.forEach(el =>{
        el.addEventListener('click', (e) => {
            youAreChecked = true;
            const field = el.parentElement.parentElement;
            field.classList.remove('error');
            statusInfoBlock.textContent = "";
            if(el.value == "Representing a business" && el.checked){
                document.querySelector('.companyNameInputArea').classList.remove('hidden');
                step2Business = true;
            } else {
                document.querySelector('.companyNameInputArea').classList.add('hidden');
                step2Business = false;
            }
        })
       
    })

    addressInputs.forEach(el =>{
        el.addEventListener('click', (e) => {
            isAddressChecked = true;
            const field = el.parentElement.parentElement;
            field.classList.remove('error');
            statusInfoBlock2.textContent = "";
            if(el.value == "Business address" && el.checked){
                document.querySelector('.businessAdressPickup').classList.remove('hidden');
                pickupBusinessName = true;
            } else {
                document.querySelector('.businessAdressPickup').classList.add('hidden');
                pickupBusinessName = false;
            }
        })
    })

    deliveryaddressInputs.forEach(el =>{
        el.addEventListener('click', (e) => {
            isDeliveryAddressChecked = true;
            const field = el.parentElement.parentElement;
            field.classList.remove('error');
            statusInfoBlock3.textContent = "";
            if(el.value == "Business address" && el.checked){
                deliveryBusinessName = true;
                document.querySelector('.deliveryBusinessName').classList.remove('hidden');
            } else {
                deliveryBusinessName = false;
                document.querySelector('.deliveryBusinessName').classList.add('hidden');
            }
        })
    })

    pickupContactInputs.forEach(el =>{
        el.addEventListener('click', (e) => {
            isContactSomeoneElseChecked();
            isPickupContactChecked = true;
            const field = el.parentElement.parentElement;
            field.classList.remove('error');
            statusInfoBlock2.textContent = "";
        })
    })

    deliveryContactInputs.forEach(el =>{
        el.addEventListener('click', (e) => {
            isDeliveryContactSomeoneElseChecked();
            isDeliveryContactChecked = true;
            const field = el.parentElement.parentElement;
            field.classList.remove('error');
            statusInfoBlock3.textContent = "";
        })
    })

    //Check if pickup Contact somebody else
    function isContactSomeoneElseChecked() {
        pickupContactInputs.forEach(input => {
          if (input.value === 'Contact someone else' && input.checked) {
            isPickupAdditionalChecked = true;
            pickupAdditional.classList.remove('hidden');
          } else {
            pickupAdditional.classList.add('hidden');
            isPickupAdditionalChecked = false;
          }
        });
      
        return isPickupAdditionalChecked;
      }

      function step2CompanyAdded() {
            if (checkCompany(companyNameInput, statusInfoBlock)) {
                return true;
            } else {
                return false;
            }
      }

      

      function deliveryBusinessNameValue() {
        if (checkCompany(deliveryBusinessNameInput, statusInfoBlock3)) {
            return true;
        } else {
            return false;
        }
  }

      function pickupBusinessNameValue() {
            if (checkCompany(pickupBusinessNameInput, statusInfoBlock2)) {
                return true;
            } else {
                return false;
            }
      }

      function isDeliveryContactSomeoneElseChecked() {
        deliveryContactInputs.forEach(input => {
          if (input.value === 'Contact someone else' && input.checked) {
            isDeliveryAdditionalChecked = true;
            deliveryAdditional.classList.remove('hidden');
          } else {
            deliveryAdditional.classList.add('hidden');
            isDeliveryAdditionalChecked = false;
          }
        });
      
        return isDeliveryAdditionalChecked;
      }
      
}

export default CalculatorSteps;
