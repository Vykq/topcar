import Cleave from "../../../assets/cleave.min.js";

const validateCredit = () => {
    

    var cleave = new Cleave('.phone-field-add', {
        phone: true,
        phoneRegionCode: 'US'
    });


    var cleave = new Cleave('.phone-field', {
        phone: true,
        phoneRegionCode: 'US'
    });

    var cleave = new Cleave('.add-phone-field', {
        phone: true,
        phoneRegionCode: 'US'
    });

    var cleave = new Cleave('.phone-add-field', {
        phone: true,
        phoneRegionCode: 'US'
    });

}
export default validateCredit;