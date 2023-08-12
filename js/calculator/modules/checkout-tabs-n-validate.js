const CheckoutTabs = () => {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabCells = document.querySelectorAll('.tabcontent');
    const attentionWrapper = document.querySelector('.attention-wrapper');
    const creditAdditional = document.querySelector('.credit-area');
    const billingAddressInputs = document.querySelectorAll('input[name="billing-address-area"]');
    const otherBillingArea = document.querySelector('.additional-billing-address-fields');
    let isOtherSelected = false;

    const errorMsg = document.querySelector('.error-msg-last');
    const streetInput = document.querySelector('input[name="billing-street-other"');
    const submitBtn = document.querySelector('#payment-button');

    // billingAddressInputs.forEach(input => {
    //     input.addEventListener('change', (e) =>{
    //         if(input.checked && input.getAttribute('id') == "other-billing-address"){
    //             otherBillingArea.classList.remove('hidden');
    //             isOtherSelected = true;
    //         } else {
    //             otherBillingArea.classList.add('hidden');
    //             isOtherSelected = false;
    //         }
    //     })
    // })

    // function checkOtherBillingInputs(){
    //     if(streetInput.value == ""){
    //         streetInput.classList.add('error');
    //         errorMsg.textContent = "Enter your address";
    //     }
    // }

    // function validateInputs() {
    //     if(isOtherSelected){
    //         checkOtherBillingInputs();
    //     }
    // }

    // submitBtn.addEventListener('click', (e) =>{
    //     if(!validateInputs()){
    //         e.preventDefault();
    //     }
    // })

    // streetInput.addEventListener('input', () => {
    //     errorMsg.textContent = "";
    //     streetInput.classList.remove('error');
    // })









    const removeActiveClassFromTabs = () => {
        tabBtns.forEach(tab => {
            tab.classList.remove('active');
        });
    };

    const hideTabCells = () => {
        tabCells.forEach(tabCell => {
            tabCell.classList.add('hidden');
        });
    };

    // Function to show the specified tabcell and set the corresponding tab as active
    const showTabCell = (index) => {
        tabBtns[index].classList.add('active');
        tabCells[index].classList.remove('hidden');

       
    };

    // Initial setup on page load
    hideTabCells();
    
    // Check if there's any tab marked as 'active' on page load
    let activeTabIndex = Array.from(tabBtns).findIndex((tab) => tab.classList.contains('active'));
    if (activeTabIndex === -1) {
        // If no tab is marked as 'active', show the first tabcell and set the first tab as active
        showTabCell(0);
    } else {
        // If there's an active tab, show its corresponding tabcell
        showTabCell(activeTabIndex);
    }

    tabBtns.forEach((tab, index) => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            removeActiveClassFromTabs();
            tab.classList.add('active');
            hideTabCells();
            tabCells[index].classList.remove('hidden');
            if(tab.classList.contains('paypal')){
                attentionWrapper.classList.add('hidden');
                creditAdditional.classList.add('hidden');
            } else {
                attentionWrapper.classList.remove('hidden');
                creditAdditional.classList.remove('hidden');
            }
           
        });
    });
};

export default CheckoutTabs;