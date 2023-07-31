import CalculatorSteps from "./modules/calculator-steps";
import PaypalNew from "./paypal/new-paypal";
import CheckoutTabs from "./modules/checkout-tabs"
import validateCredit from "./modules/validate-credit";
window.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#calculated-cost-form')) {
        CalculatorSteps();
        PaypalNew();
        CheckoutTabs();
        validateCredit();

     }
  
});