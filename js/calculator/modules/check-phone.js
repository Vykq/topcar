import isEmpty from "./is-empty";
import validatePhoneNumber from "./validate-phone";

const checkPhone = (phoneInput, phoneMsg) => {
    if (phoneInput.classList.contains('error')) {
        return false;
    }
    if (isEmpty(phoneInput)) {
        phoneInput.classList.add('error');
        phoneMsg.textContent = "Phone field is empty";
        return false;
    };
    if (!validatePhoneNumber(phoneInput.value)) {
        phoneInput.classList.add('error');
        phoneMsg.textContent = "Re-enter your phone number";
        return false;
    }
    return true
}

export default checkPhone;
