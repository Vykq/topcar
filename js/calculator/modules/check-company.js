import isEmpty from "./is-empty";

const checkCompany = (nameInput, nameMsg) => {
    if (nameInput.classList.contains('error')) {
        return false;
    }
    if (isEmpty(nameInput)) {
        nameInput.classList.add('error');
        nameMsg.textContent = 'Company input is empty';
        return false;
    };
    return true;
}

export default checkCompany;
