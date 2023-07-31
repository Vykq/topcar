import Cleave from "../../../assets/cleave.min.js";

const validateCredit = () => {
    
    var cleave = new Cleave('.cc-nr-field', {
        blocks: [4, 3, 3, 4],
        uppercase: true
    });

    var cleave = new Cleave('.cc-year-field', {
        date: true,
        datePattern: ['m', 'y']
    });

    const cvvField = document.querySelector('.cc-cvv-field');

    cvvField.addEventListener('input', () =>{
        const maxLength = 3;
        if (cvvField.value.length > maxLength) {
            cvvField.value = cvvField.value.slice(0, maxLength);
        }
    })
    
    var cleave = new Cleave('.cc-cvv-field', {
        numeral: true,
        blocks: [3],
        uppercase: true
    });

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