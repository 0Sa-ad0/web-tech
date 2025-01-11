function isValidForm() {
    console.log('isValid or JS Validation function is called');
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const license = document.getElementById('license').value;

    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const licenseError = document.getElementById('licenseError');
    const errorElement = document.getElementById('errorElement');

    nameError.innerHTML = '';
    emailError.innerHTML = '';
    licenseError.innerHTML = '';
    errorElement.innerHTML = '';
    errorElement.style.color = '#880808';

    let isValid = true;

    if (name.trim() === '' || email.trim() === '' || license.trim() === '') {
        errorElement.innerHTML = 'Please fill out all fields.';
        isValid = false;
    } else {
        if (name.trim() === '') {
            nameError.innerHTML = 'Name is required';
            isValid = false;
        }

        if (email.trim() === '') {
            emailError.innerHTML = 'Email is required';
            isValid = false;
        } else if (!isValidEmail(email)) {
            emailError.innerHTML = 'Invalid email format';
            isValid = false;
        }

        if (license.trim() === '') {
            licenseError.innerHTML = 'License Number is required';
            isValid = false;
        }
    }

    return isValid;
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
