function isValidForm() {
    console.log('isValid or JS Validation function is called');
    const username = document.getElementById('Username').value;
    const securityQuestion = document.getElementById('securityQuestion').value;
    const securityAnswer = document.getElementById('securityAnswer').value;

    const errorElement = document.getElementById('error');
    errorElement.innerHTML = ''; 

    let isValid = true;

    if (username.trim() === '' || securityQuestion.trim() === '' || securityAnswer.trim() === '') {
        errorElement.innerHTML = 'Please fill out all fields.';
        errorElement.style.color = '#880808';
        isValid = false;
    }

    return isValid;
}
