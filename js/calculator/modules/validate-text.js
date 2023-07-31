import hasNumber from "./has-number";

function validateTextField(value) {
    let containsNumber = hasNumber(value);
    if (!containsNumber) {
        return true;
    }
    return false;
}

export default validateTextField;
