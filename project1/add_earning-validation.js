function isValidEarningForm() {
    console.log('JS Validation function is called');
    const amount = document.getElementById('amount').value;
    const date = document.getElementById('date').value;

    const errorElement = document.getElementById('error-message');
    errorElement.innerHTML = ''; 

    let isValid = true;

    if (amount.trim() === '' || date.trim() === '') {
        errorElement.innerHTML = 'plz fill all required fields.';
        errorElement.style.color = '#880808';
        isValid = false;
    }

    return isValid;
}
