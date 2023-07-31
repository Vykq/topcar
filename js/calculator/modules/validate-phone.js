function validatePhoneNumber(value) {
    let pattern = /^(\+)?([ 0-9()-]){8,16}$/;
    if (pattern.test(value)) {
        return true;
    }
    return false;
}

export default validatePhoneNumber;

