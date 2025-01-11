function isValid(pForm) {
    console.log('isValid or JS Validation function is called');
    const email = pForm.email.value;
    const password = pForm.password.value;

    const emailErrMsg = document.getElementById('emailErrMsg');
    const passwordErrMsg = document.getElementById('passwordErrMsg');

    emailErrMsg.innerHTML = '';
    passwordErrMsg.innerHTML = '';

    let flag = true;

    if (email === '') {
        emailErrMsg.innerHTML = 'Please fill in the email';
        emailErrMsg.style.color = '#880808';
        flag = false;
    }

    if (password === '') {
        passwordErrMsg.innerHTML = 'Please fill in the password';
        passwordErrMsg.style.color = '#880808';
        flag = false;
    }

    return flag;
}
