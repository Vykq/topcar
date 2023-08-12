import CalculatorSteps from "./modules/calculator-steps";
import CheckoutTabs from "./modules/checkout-tabs-n-validate"
import validateCredit from "./modules/validate-credit";
import sendSecondStepInfo from "./modules/send-second-step-info";
import sendThirdStepInfo from "./modules/send-third-step-info";
import sendFourthStepInfo from "./modules/send-fourth-step-info";
import sendPaymentInfo from "./modules/send-payment-info";
window.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#calculated-cost-form')) {
        CalculatorSteps();
        CheckoutTabs();
        validateCredit();
        document.getElementById("to-step-3").addEventListener("click", () => {
            sendSecondStepInfo();
        });

        document.getElementById("to-step-4").addEventListener("click", () => {
            sendThirdStepInfo();
        });

        document.getElementById("to-step-5").addEventListener("click", () => {
            sendFourthStepInfo();
        });
        sendPaymentInfo();
     }
  
});