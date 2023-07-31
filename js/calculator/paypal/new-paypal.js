

const PaypalNew = () => {

    const form = document.querySelector('#calculated-cost-form');
    const price = document.querySelector('#actual-price').textContent;
    const payBtn = document.querySelector('#pay-with-paypal');


    const postData = async (url, data) => {
        let res = await fetch(url, {
            method: 'POST',
            body: data,
        });
        return await res.text();
    }

    function createSpinner() {
        const blurDiv = document.createElement('div');
        blurDiv.className = 'blur';
        const loadingDiv = document.createElement('div');
        loadingDiv.className = 'lds-facebook';
        loadingDiv.innerHTML = '<div></div><div></div><div></div>';
        blurDiv.appendChild(loadingDiv);
        document.body.appendChild(blurDiv);
    }


    form.addEventListener('submit' , (e) =>{
        
        e.preventDefault();
        let formData = new FormData(form);

        postData(ajax_object.themeUrl + '/paypal/create-paypal-order.php', formData)
            .then((res) => {
                createSpinner();
                console.log(JSON.parse(res));
                const data = JSON.parse(res);

                const approvalLinkObj = data.links.find((link) => link.rel === 'approval_url');
                
                // Get the approval_url from the object
                const approvalurl = approvalLinkObj.href;
                
                if (approvalurl) {
                    // If the approval link exists, you can use it in your JavaScript code
                    // For example, you might want to redirect the user to the PayPal approval URL
                    window.location.href = approvalurl;
                } else if (data.error) {
                    // Handle any errors returned by the server
                    console.error(data.error);
                }
            })
            .catch(() => {
                
            })
            .finally(() => {

        
                setTimeout(() => {
    
                }, 8000);
            });

    })
};

export default PaypalNew;