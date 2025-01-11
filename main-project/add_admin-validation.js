function isValid() {
    console.log('JS Validation function is called');
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const role = document.getElementById('role').value;

    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const usernameError = document.getElementById('usernameError');
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    const roleError = document.getElementById('roleError');

    nameError.innerHTML = '';
    emailError.innerHTML = '';
    usernameError.innerHTML = '';
    passwordError.innerHTML = '';
    confirmPasswordError.innerHTML = '';
    roleError.innerHTML = '';

    nameError.style.color = '#880808';
    emailError.style.color = '#880808';
    usernameError.style.color = '#880808';
    passwordError.style.color = '#880808';
    confirmPasswordError.style.color = '#880808';
    roleError.style.color = '#880808';

    let isValid = true;

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

    if (username.trim() === '') {
        usernameError.innerHTML = 'Username is required';
        isValid = false;
    }

    if (password.trim() === '') {
        passwordError.innerHTML = 'Password is required';
        isValid = false;
    } else if (password !== confirmPassword) {
        confirmPasswordError.innerHTML = 'Passwords do not match';
        isValid = false;
    }

    if (role.trim() === '') {
        roleError.innerHTML = 'Role is required';
        isValid = false;
    }

    return isValid;
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
